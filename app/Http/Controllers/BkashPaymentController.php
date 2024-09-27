<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Recharge;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BkashPaymentController extends Controller
{
    public function index()
    {
        $recharges = Recharge::where('user_id', auth()->user()->id)->latest()->get();
        return view('User.modules.recharge.payment_form', compact('recharges'));
    }

    private $base_url;
    public function __construct()
    {
        // if (get_setting('bkash_sandbox', 1)) {
        // $this->base_url = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/";
        // } else {
        $this->base_url = "https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/";
        // }
    }

    // public function pay()
    // {
    //     dd('pay');
    //     $amount = 0;
    //     if (Session::has('payment_type')) {
    //         if (Session::get('payment_type') == 'cart_payment') {
    //             $combined_order = CombinedOrder::findOrFail(Session::get('combined_order_id'));
    //             $amount = round($combined_order->grand_total);
    //         } elseif (Session::get('payment_type') == 'wallet_payment') {
    //             $amount = round(Session::get('payment_data')['amount']);
    //         } elseif (Session::get('payment_type') == 'customer_package_payment') {
    //             $customer_package = CustomerPackage::findOrFail(Session::get('payment_data')['customer_package_id']);
    //             $amount = round($customer_package->amount);
    //         } elseif (Session::get('payment_type') == 'seller_package_payment') {
    //             $seller_package = SellerPackage::findOrFail(Session::get('payment_data')['seller_package_id']);
    //             $amount = round($seller_package->amount);
    //         }
    //     }

    //     Session::forget('bkash_token');
    //     Session::put('bkash_token', $this->getToken());
    //     Session::put('amount', $amount);
    //     return redirect()->route('bkash.create_payment');
    // }

    public function create_payment(Request $request)
    {
        $amount = $request->amount;

        // Ensure token is retrieved before making the payment
        // if (!Session::has('bkash_token')) {
        $this->getToken();
        // }

        $requestbody = array(
            'mode' => '0011',
            'payerReference' => ' ',
            'callbackURL' => route('bkash.callback'),
            'amount' => $amount,
            'currency' => 'BDT',
            'intent' => 'sale',
            'merchantInvoiceNumber' => "Inv" . date('YmdH') . rand(1000, 10000)
        );
        $requestbodyJson = json_encode($requestbody);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . Session::get('bkash_token'),
            'X-APP-Key:' . env('BKASH_APP_KEY')
        );

        $url = curl_init($this->base_url . 'checkout/create');
        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);

        // Check for cURL errors
        if (curl_errno($url)) {
            $error_msg = curl_error($url);
            curl_close($url);
            return response()->json(['error' => $error_msg], 500);
        }

        curl_close($url);

        $result = json_decode($resultdata);

        // Check if the response contains bkashURL
        if (isset($result->bkashURL)) {
            return redirect($result->bkashURL);
        } else {
            // Handle error response
            if (isset($result->message)) {
                return response()->json(['error' => $result->message], 500);
            } else {
                return response()->json(['error' => 'Unknown error occurred'], 500);
            }
        }
    }

    public function getToken()
    {
        $request_data = array(
            'app_key' => env('BKASH_APP_KEY'),
            'app_secret' => env('BKASH_APP_SECRET')
        );
        $request_data_json = json_encode($request_data);

        $header = array(
            'Content-Type:application/json',
            'username:' . env('BKASH_USERNAME'),
            'password:' . env('BKASH_PASSWORD')
        );

        $url = curl_init($this->base_url . 'checkout/token/grant');
        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $request_data_json);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $resultdata = curl_exec($url);

        if (curl_errno($url)) {
            $error_msg = curl_error($url);
            curl_close($url);
            return response()->json(['error' => $error_msg], 500);
        }

        curl_close($url);

        $result = json_decode($resultdata);

        // Ensure the token is stored in session
        if (isset($result->id_token)) {
            Session::put('bkash_token', $result->id_token);
        } else {
            return response()->json(['error' => 'Token retrieval failed'], 500);
        }

        return $result->id_token;
    }





    public function callback(Request $request)
    {
        $allRequest = $request->all();

        if (isset($allRequest['status']) && $allRequest['status'] == 'failure') {
            return view('User.modules.bkash_msg.fail')->with([
                'errorMessage' => 'Payment Failure'
            ]);
        } elseif (isset($allRequest['status']) && $allRequest['status'] == 'cancel') {
            return view('User.modules.bkash_msg.fail')->with([
                'errorMessage' => 'Payment Cancelled'
            ]);
        } else {
            $resultdata = $this->execute($allRequest['paymentID']);
            Session::forget('payment_details');
            Session::put('payment_details', $resultdata);

            $result_data = json_decode($resultdata);

            if (isset($result_data->statusCode) && $result_data->statusCode != '0000') {
                return view('User.modules.bkash_msg.fail')->with([
                    'errorMessage' => $result_data->statusMessage,
                ]);
            } elseif (isset($result_data->statusCode) && $result_data->statusCode == '2033') {
                // Handle case where transaction is not found
                return view('User.modules.bkash_msg.fail')->with([
                    'errorMessage' => $result_data->statusMessage,
                ]);
            } elseif (isset($result_data->statusMessage)) {
                // If execute API failed to respond
                sleep(1);
                $resultdata = json_decode($this->query($allRequest['paymentID']));

                if (isset($resultdata->transactionStatus) && $resultdata->transactionStatus == 'Initiated') {
                    return redirect()->route('bkash.create-payment');
                }
            }

            $submitStatus = \App\Models\SubmitStatus::first();
            $activeAccountPrice = Message::first()->active_status_price;
            $user = User::find(Auth::user()->id);
            // Active Account
            if ($user->status == 0 && $submitStatus->active_status == 1) {
                $user->status = 1;
                $user->balance += 0;
            } else {
                $user->balance += $result_data->amount;
            }
            $user->save();

            // Create a new Recharge record
            $recharge = new Recharge();
            $recharge->user_id = $user->id;
            $recharge->method = 'Bkash Gateway';
            $recharge->payment_number = $result_data->customerMsisdn;
            $recharge->amount = $result_data->amount;
            $recharge->transaction_id = $result_data->trxID;
            $recharge->status = 1;
            $recharge->save();

            //  report
            $todaysReport = Report::whereDate('created_at', Carbon::today())->first();
            if ($todaysReport) {
                $todaysReport->auto_recharge += $result_data->amount;
                $todaysReport->income = $todaysReport->manual_recharge + $todaysReport->auto_recharge;
                $todaysReport->profit = $todaysReport->income - $todaysReport->expense;
                $todaysReport->save();
            } else {
                Report::create([
                    'auto_recharge' => $result_data->amount,
                    'income' => $result_data->amount,
                    'profit' => $result_data->amount,
                ]);
            }


            return redirect()->route('bkash.success');
        }
    }




    public function execute($paymentID)
    {

        $auth = Session::get('bkash_token');

        $requestbody = array(
            'paymentID' => $paymentID
        );
        $requestbodyJson = json_encode($requestbody);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:' . env('BKASH_APP_KEY')
        );

        $url = curl_init($this->base_url . 'checkout/execute');
        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);

        return $resultdata;
    }

    public function query($paymentID)
    {

        $auth = Session::get('bkash_token');

        $requestbody = array(
            'paymentID' => $paymentID
        );
        $requestbodyJson = json_encode($requestbody);

        $header = array(
            'Content-Type:application/json',
            'Authorization:' . $auth,
            'X-APP-Key:' . env('BKASH_APP_KEY')
        );

        $url = curl_init($this->base_url . 'checkout/payment/status');
        curl_setopt($url, CURLOPT_HTTPHEADER, $header);
        curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($url, CURLOPT_POSTFIELDS, $requestbodyJson);
        curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $resultdata = curl_exec($url);
        curl_close($url);

        return $resultdata;
    }

    // public function success(Request $request)
    // {
    //     dd('success');
    //     $payment_type = Session::get('payment_type');

    //     if ($payment_type == 'cart_payment') {
    //         return (new CheckoutController)->checkout_done(Session::get('combined_order_id'), $request->payment_details);
    //     }
    //     if ($payment_type == 'wallet_payment') {
    //         return (new WalletController)->wallet_payment_done(Session::get('payment_data'), $request->payment_details);
    //     }
    //     if ($payment_type == 'customer_package_payment') {
    //         return (new CustomerPackageController)->purchase_payment_done(Session::get('payment_data'), $request->payment_details);
    //     }
    //     if ($payment_type == 'seller_package_payment') {
    //         return (new SellerPackageController)->purchase_payment_done(Session::get('payment_data'), $request->payment_details);
    //     }
    // }
}
