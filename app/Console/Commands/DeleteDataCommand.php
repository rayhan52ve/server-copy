<?php

namespace App\Console\Commands;

use App\Models\BiometricInfo;
use App\Models\IdCardOrder;
use App\Models\ServerCopyOrder;
use App\Models\SignCopyOrder;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ago = Carbon::now()->subDays(1);

        // Delete SignCopyOrders and associated files
        $signCopyOrders = SignCopyOrder::where('created_at', '<', $ago)->get();
        foreach ($signCopyOrders as $order) {
            $filePath = public_path($order->file); // Assuming the file is in the public directory
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        SignCopyOrder::where('created_at', '<', $ago)->delete();

        $serverCopyOrders = ServerCopyOrder::where('created_at', '<', $ago)->get();
        foreach ($serverCopyOrders as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        ServerCopyOrder::where('created_at', '<', $ago)->delete();

        $idCards = IdCardOrder::where('created_at', '<', $ago)->get();
        foreach ($idCards as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        IdCardOrder::where('created_at', '<', $ago)->delete();

        $biometric = BiometricInfo::where('created_at', '<', $ago)->get();
        foreach ($biometric as $order) {
            $filePath = public_path($order->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }
        BiometricInfo::where('created_at', '<', $ago)->delete();

        $this->info('Old data and associated files deleted successfully.');
    }
}
