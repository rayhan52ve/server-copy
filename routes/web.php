<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminBiometricInfoController;
use App\Http\Controllers\Admin\AdminBirthOrderController;
use App\Http\Controllers\Admin\AdminIdCardController;
use App\Http\Controllers\Admin\AdminLostNidFormController;
use App\Http\Controllers\Admin\AdminNameAddressIdController;
use App\Http\Controllers\Admin\AdminRechargeController;
use App\Http\Controllers\Admin\AdminServerCopyOrderController;
use App\Http\Controllers\Admin\AdminSignCopyOrderController;
use App\Http\Controllers\Admin\AdminUserpassNidController;
use App\Http\Controllers\Admin\BiometricTypeController;
use App\Http\Controllers\Admin\HideUnhideController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ModeratorAccessController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SubmitStatusController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\BannerAndTitleController;
use App\Http\Controllers\BkashPaymentController;
use App\Http\Controllers\NidAutoController;
use App\Http\Controllers\PopupMessageController;
use App\Http\Controllers\PopupNoticeController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\ServerCopyUnofficialController;
use App\Http\Controllers\User\BiometricInfoController;
use App\Http\Controllers\User\BirthOrderController;
use App\Http\Controllers\User\IdCardOrderController;
use App\Http\Controllers\User\NameAddressIdController;
use App\Http\Controllers\User\NewNidController;
use App\Http\Controllers\User\NewRegistrationController;
use App\Http\Controllers\User\NidMakeController;
use App\Http\Controllers\User\OldNidController;
use App\Http\Controllers\User\ServerCopyOrderController;
use App\Http\Controllers\User\SignCopyOrderController;
use App\Http\Controllers\User\SignToServerCopyController;
use App\Http\Controllers\User\UserdashboardController;
use App\Http\Controllers\User\UserPassNidController;
use App\Http\Controllers\User\VoterInfoController;
use App\Http\Controllers\User\NidLostFormController;
use App\Http\Controllers\VaccinController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WebsiteSettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/

// Route::get('/fhggfh', [WebsiteController::class, 'home'])->name('front.page');

// Route::get('/pusher', function () {
//     return view('admin.pusher');
// });


Auth::routes();


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'adminHome'])->name('admin.home')->middleware(['auth', 'is_moderator']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/new-nid-sign-copy-upload', [NewNidController::class, 'signCopyUpload'])->name('newNidSignCopyUpload');
Route::post('/old-nid-sign-copy-upload', [NewNidController::class, 'signCopyUploadOld'])->name('signCopyUploadOld');
Route::post('/sign-to-server-copy-upload', [SignToServerCopyController::class, 'signCopyUpload'])->name('serverCopy.signCopyUpload');


/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::prefix('user')->name('user.')->middleware(['auth', 'is_user','is_active'])->group(function () {

    Route::get('/home', [UserdashboardController::class, 'userDashboard'])->name('home');
    Route::get('/about/admin', [UserdashboardController::class, 'about_admin'])->name('about_admin');
    Route::get('/video', [UserdashboardController::class, 'video'])->name('video.index');
    Route::get('/server-copy-file-list/{id}', [UserdashboardController::class, 'serverCopyUnofficialList'])->name('serverCopyUnofficialList');
    Route::get('/nid-file-list/{id}', [UserdashboardController::class, 'nidList'])->name('nidList');
    Route::get('/birth-file-list/{id}', [UserdashboardController::class, 'birthList'])->name('birthList');
    Route::get('/vaccine-file-list/{id}', [UserdashboardController::class, 'vaccineList'])->name('vaccineList');
    Route::get('/tin-file-list/{id}', [UserdashboardController::class, 'tinList'])->name('tinList');
    Route::resource('sign-copy', SignCopyOrderController::class)->only('index', 'store');
    Route::resource('server-copy', ServerCopyOrderController::class)->only('index', 'store');
    Route::resource('id-card', IdCardOrderController::class)->only('index', 'store','update');
    Route::resource('biometric-info', BiometricInfoController::class)->only('index', 'store');
    Route::resource('name-address-id', NameAddressIdController::class)->only('index', 'store');
    Route::resource('user-pass-nid', UserPassNidController::class)->only('index', 'store');
    Route::resource('nid-lost-form', NidLostFormController::class)->only('index', 'store');
    Route::resource('birth-order', BirthOrderController::class)->only('index', 'store');
    Route::resource('new-nid', NewNidController::class)->only('index', 'store');
    Route::resource('sign-to-server', SignToServerCopyController::class)->only('index', 'store');

    Route::resource('old-nid', OldNidController::class)->only('index', 'store');
    Route::resource('nid-make', NidMakeController::class)->only('index', 'store');
    Route::post('nid-make-with-signcopy', [NidMakeController::class,'signCopyUpload'])->name('signCopyNidApi');
    Route::resource('nid-auto', NidAutoController::class)->only('index', 'store');
    Route::post('nid-auto-search', [NidAutoController::class,'nidAutoSearch'])->name('nidAutoSearch');
    Route::resource('vaccin', VaccinController::class)->only('index', 'store');
    Route::resource('new-registration', NewRegistrationController::class)->only('index', 'store');
    Route::resource('voter-info', VoterInfoController::class)->only('index', 'store');

    Route::resource('recharge', RechargeController::class);

    Route::get('premium', [PremiumController::class, 'userIndex'])->name('premium.index');
    Route::post('premium-request', [PremiumController::class, 'userPremiumRequest'])->name('userPremiumRequest');

    Route::get('/user-notification-list', [UserdashboardController::class, 'userNotification'])->name('userNotification');
    Route::get('/clear-notification-list', [UserdashboardController::class, 'clearAllUserNotification'])->name('clearAllUserNotification');
    Route::delete('/delete-notification/{id}', [UserdashboardController::class, 'destroy'])->name('notification.destroy');

});

Route::get('print-saved-nid/{id}', [NidMakeController::class,'printSavedNid'])->name('print.savedNid')->middleware('auth');
Route::get('print-saved-vaccin/{id}', [VaccinController::class,'printSavedVaccin'])->name('print.savedVaccin')->middleware('auth');
Route::get('certificate-verify/{token}', [VaccinController::class,'certificate_verify'])->name('certificate_verify')->middleware('auth');
Route::get('print-saved-birth/{id}', [NewRegistrationController::class,'printSavedBirth'])->name('print.savedBirth')->middleware('auth');
Route::get('/print-saved-tin/{id}',[SignToServerCopyController::class,'print_saved_tin'])->name('print.print_saved_tin')->middleware('auth');


Route::controller(ServerCopyUnofficialController::class)->middleware(['auth'])->group(function () {
    Route::get('/nid-server-copy', 'tech_web_nid_server_copy')->name('nid.server.copy');
    Route::post('/print-nid-server-copy', 'tech_web_print_nid_server_copy')->name('print.nid.server.copy');
    Route::get('/print-saved-server-copy/{id}', 'print_saved_server_copy')->name('print.saved_server_copy');
});

/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/
//file upload and download
Route::get('/file/download/{id}', [AdminSignCopyOrderController::class, 'download'])->name('file.download');
Route::get('/server-copy-file/download/{id}', [AdminServerCopyOrderController::class, 'download'])->name('server-file.download');
Route::get('/id-card-file/download/{id}', [AdminIdCardController::class, 'download'])->name('idCard-file.download');
Route::get('/id-card-user-file/download/{id}', [AdminIdCardController::class, 'UserFileDownload'])->name('idCard-user-file.download');
Route::get('/id-card-user-file/delete/{id}', [AdminIdCardController::class, 'UserFileDelete'])->name('idCard-user-file.delete');
Route::get('/biometric-info-file/download/{id}', [AdminBiometricInfoController::class, 'download'])->name('biometric-file.download');
Route::get('/name-address-id-file/download/{id}', [AdminNameAddressIdController::class, 'download'])->name('name-address-id-file.download');
Route::get('/name-address-id-image/download/{id}', [AdminNameAddressIdController::class, 'imageDownload'])->name('name-address-id-image.download');
Route::get('/user-pass-nid-image/download/{id}', [AdminUserpassNidController::class, 'imageDownload'])->name('user-pass-nid-image.download');
Route::get('/lost-nid-form-file/download/{id}', [AdminLostNidFormController::class, 'download'])->name('lost-nid-form-file.download');

Route::get('/birth-order-file/download/{id}', [AdminBirthOrderController::class, 'download'])->name('birth-order-file.download');
Route::get('/birth-order-nid/download/{id}', [AdminBirthOrderController::class, 'nidDownload'])->name('nidDownload.download');
Route::get('/birth-order-school-cirtificate/download/{id}', [AdminBirthOrderController::class, 'schoolCirtificateDownload'])->name('schoolCirtificateDownload.download');
Route::get('/birth-order-tica-card/download/{id}', [AdminBirthOrderController::class, 'ticaCardDownload'])->name('ticaCardDownload.download');
Route::get('/birth-order-mother-nid/download/{id}', [AdminBirthOrderController::class, 'mothersNidDownload'])->name('mothersNidDownload.download');
Route::get('/birth-order-father-nid/download/{id}', [AdminBirthOrderController::class, 'fathersNidDownload'])->name('fathersNidDownload.download');
//file upload and download


Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_moderator'])->group(function () {

    Route::resource('manage-user', ManageUserController::class);
    Route::get('/inactive-user-list', [ManageUserController::class, 'inactiveUser'])->name('inactiveUser');
    Route::get('/user-active-status/{id}', [ManageUserController::class, 'activeStatus'])->name('activeStatus');
    Route::get('/moderator-list', [ManageUserController::class, 'moderatorList'])->name('moderatorList')->middleware('is_admin');
    Route::get('/premium-request', [ManageUserController::class, 'premiumRequest'])->name('premiumRequest');
    Route::get('/premium-user-list', [ManageUserController::class, 'premiumUser'])->name('premiumUser');
    Route::put('/user-multiple-delete', [ManageUserController::class, 'multipleDelete'])->name('multipleDelete');
    Route::put('/user-multiple-status', [ManageUserController::class, 'multipleStatus'])->name('multipleStatus');
    Route::post('/user-popup-message', [ManageUserController::class, 'popupMessage'])->name('popupMessage');  

    Route::resource('sign-copy', AdminSignCopyOrderController::class)->only('index', 'destroy');
    Route::get('sign-copy-completed', [AdminSignCopyOrderController::class, 'completed'])->name('sign-copy.completed');
    Route::get('sign-copy-disabled', [AdminSignCopyOrderController::class, 'disabled'])->name('sign-copy.disabled');
    Route::put('/sign-copy-status/{id}', [AdminSignCopyOrderController::class, 'updateStatus'])->name('updateSignCopyStatus');
    Route::post('/path-to-update-handler', [AdminSignCopyOrderController::class, 'fileUpload'])->name('file.upload');

    Route::put('/sign-copy-refund/{id}', [AdminSignCopyOrderController::class, 'refund'])->name('refund.signcopy');


    Route::resource('server-copy', AdminServerCopyOrderController::class)->only('index', 'destroy');
    Route::get('server-copy-completed', [AdminServerCopyOrderController::class, 'completed'])->name('server-copy.completed');
    Route::get('server-copy-disabled', [AdminServerCopyOrderController::class, 'disabled'])->name('server-copy.disabled');

    Route::put('/server-copy-status/{id}', [AdminServerCopyOrderController::class, 'updateStatus'])->name('updateServerCopyStatus');
    Route::post('/server-copy-file-upload', [AdminServerCopyOrderController::class, 'fileUpload'])->name('server-file.upload');

    Route::put('/server-copy-refund/{id}', [AdminServerCopyOrderController::class, 'refund'])->name('refund.serverCopy');


    Route::resource('id-card', AdminIdCardController::class)->only('index', 'destroy');
    Route::get('id-card-completed', [AdminIdCardController::class, 'completed'])->name('id-card.completed');
    Route::get('id-card-disabled', [AdminIdCardController::class, 'disabled'])->name('id-card.disabled');

    Route::put('/id-card-status/{id}', [AdminIdCardController::class, 'updateStatus'])->name('updateidCardStatus');
    Route::post('/id-card-file-upload', [AdminIdCardController::class, 'fileUpload'])->name('idCard-file.upload');

    Route::put('/id-card-refund/{id}', [AdminIdCardController::class, 'refund'])->name('refund.idCard');


    Route::resource('biometric-info', AdminBiometricInfoController::class)->only('index', 'destroy');
    Route::get('biometric-info-completed', [AdminBiometricInfoController::class, 'completed'])->name('biometric-info.completed');
    Route::get('biometric-info-disabled', [AdminBiometricInfoController::class, 'disabled'])->name('biometric-info.disabled');

    Route::put('/biometric-info-status/{id}', [AdminBiometricInfoController::class, 'updateStatus'])->name('updateBiometricStatus');
    Route::post('/biometric-info-file-upload', [AdminBiometricInfoController::class, 'fileUpload'])->name('biometric-file.upload');

    Route::put('/biometric-refund/{id}', [AdminBiometricInfoController::class, 'refund'])->name('refund.biometric');


    Route::resource('biometric-type', BiometricTypeController::class)->except('create', 'show', 'edit');

    
    Route::resource('name-address-id', AdminNameAddressIdController::class)->only('index', 'destroy');
    Route::get('name-address-id-completed', [AdminNameAddressIdController::class, 'completed'])->name('name-address-id.completed');
    Route::get('name-address-id-disabled', [AdminNameAddressIdController::class, 'disabled'])->name('name-address-id.disabled');
    Route::put('/name-address-id-status/{id}', [AdminNameAddressIdController::class, 'updateStatus'])->name('updateNameAddressId');
    Route::post('/name-address-id-update-handler', [AdminNameAddressIdController::class, 'fileUpload'])->name('name-address-id-file.upload');
    Route::put('/name-address-id-refund/{id}', [AdminNameAddressIdController::class, 'refund'])->name('refund.name-address-id');
    
    Route::resource('lost-nid-form', AdminLostNidFormController::class)->only('index', 'destroy');
    Route::get('lost-nid-form-completed', [AdminLostNidFormController::class, 'completed'])->name('lost-nid-form.completed');
    Route::get('lost-nid-form-disabled', [AdminLostNidFormController::class, 'disabled'])->name('lost-nid-form.disabled');
    Route::put('/lost-nid-form-status/{id}', [AdminLostNidFormController::class, 'updateStatus'])->name('updateNidLostForms');
    Route::post('/lost-nid-form-update-handler', [AdminLostNidFormController::class, 'fileUpload'])->name('lost-nid-form-file.upload');
    Route::put('/lost-nid-form-refund/{id}', [AdminLostNidFormController::class, 'refund'])->name('refund.lost-nid-form');
    
    Route::resource('user-pass-nid', AdminUserpassNidController::class)->only('index', 'destroy');
    Route::get('user-pass-nid-completed', [AdminUserpassNidController::class, 'completed'])->name('user-pass-nid.completed');
    Route::get('user-pass-nid-disabled', [AdminUserpassNidController::class, 'disabled'])->name('user-pass-nid.disabled');
    Route::put('/user-pass-nid-status/{id}', [AdminUserpassNidController::class, 'updateStatus'])->name('updateUserPassNid');
    Route::post('/user-pass-nid-update-handler', [AdminUserpassNidController::class, 'fileUpload'])->name('user-pass-nid-file.upload');
    Route::put('/user-pass-nid-refund/{id}', [AdminUserpassNidController::class, 'refund'])->name('refund.user-pass-nid');

    Route::resource('birth-order', AdminBirthOrderController::class)->only('index', 'destroy');
    Route::get('birth-order-completed', [AdminBirthOrderController::class, 'completed'])->name('birth-order.completed');
    Route::get('birth-order-disabled', [AdminBirthOrderController::class, 'disabled'])->name('birth-order.disabled');
    Route::put('/birth-order-status/{id}', [AdminBirthOrderController::class, 'updateStatus'])->name('updateBirthOrder');
    Route::post('/birth-order-id-update-handler', [AdminBirthOrderController::class, 'fileUpload'])->name('birth-order-file.upload');

    Route::put('/birth-order-refund/{id}', [AdminBirthOrderController::class, 'refund'])->name('refund.birth-order');



    Route::resource('notice', NoticeController::class)->only('index', 'store');
    Route::resource('message', MessageController::class)->only('index', 'store');
    Route::resource('submit_status', SubmitStatusController::class)->only('index', 'store');
    Route::resource('hide-unhide', HideUnhideController::class)->only('index', 'store');
    Route::resource('premium', PremiumController::class)->only('index', 'store');

    Route::get('premium-request-accept/{id}', [PremiumController::class, 'userPremiumRequestAccept'])->name('userPremiumRequestAccept');
    Route::put('premium-status/{id}', [PremiumController::class, 'userPremiumStatus'])->name('userPremiumStatus');


    Route::get('recharge', [AdminRechargeController::class, 'index'])->name('recharge');

    Route::put('/recharge-status/{id}', [AdminRechargeController::class, 'updateRechargeStatus'])->name('rechargeStatus');

    Route::resource('video', VideoController::class);
    Route::post('button-create', [VideoController::class,'buttonStore'])->name('buttonStore');

    Route::resource('moderator-access', ModeratorAccessController::class)->middleware('is_admin');

    Route::get('/clear-recharge-data', [AdminRechargeController::class, 'clearAllRecharge'])->name('clearAllRecharge');

    Route::get('/server-copy-unofficial-list', [HomeController::class, 'serverCopyUnofficialList'])->name('serverCopyUnofficialList');
    Route::get('/clear-server-copy-unofficial-list', [HomeController::class, 'clearServerCopyUnofficial'])->name('clearAll');

    Route::get('/nid-file-list', [HomeController::class, 'nidList'])->name('nidList');
    Route::get('/clear-nid-file-list', [HomeController::class, 'clearAllNid'])->name('clearAllNid');

    Route::get('/birth-file-list', [HomeController::class, 'birthList'])->name('birthList');
    Route::get('/clear-birth-file-list', [HomeController::class, 'clearAllbirth'])->name('clearAllbirth');

    Route::get('/vaccine-file-list', [HomeController::class, 'vaccineList'])->name('vaccineList');
    Route::get('/clear-vaccine-file-list', [HomeController::class, 'clearAllVaccine'])->name('clearAllVaccine');

    Route::get('/tin-file-list', [HomeController::class, 'tinList'])->name('tinList');
    Route::get('/clear-tin-file-list', [HomeController::class, 'clearAllTin'])->name('clearAllTin');


    Route::get('/admin-notification-list', [HomeController::class, 'adminNotification'])->name('adminNotification');
    Route::get('/clear-admin-notification-list', [HomeController::class, 'clearAllAdminNotification'])->name('clearAllAdminNotification')->middleware('is_admin');
    Route::delete('/delete-notification/{id}', [HomeController::class, 'destroy'])->name('notification.destroy');

    Route::get('/clear-admin-all-old-orders', [HomeController::class, 'clearOldOrders'])->name('clearOldOrders')->middleware('is_admin');
    Route::get('/clear-admin-all-file-list-data', [HomeController::class, 'clearFileListData'])->name('clearFileListData')->middleware('is_admin');
    Route::get('/clear-admin-all-permanently', [HomeController::class, 'clearAllPermanently'])->name('clearAllPermanently')->middleware('is_admin');


    Route::resource('report',ReportController::class)->middleware('is_admin');

});





//Banner and Tile
Route::post('/store-banner-title', [BannerAndTitleController::class, 'tech_web_store_banner_tile'])->name('store.banner.title')->middleware('is_moderator');
Route::get('/edit-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_edit_banner_tile'])->name('edit.banner.title')->middleware('is_moderator');
Route::post('/update-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_update_banner_tile'])->name('update.banner.title')->middleware('is_moderator');
//Banner and title

//Logo start
Route::post('/store-logo', [WebsiteSettingsController::class, 'tech_web_store_logo'])->name('store.logo')->middleware('is_moderator');
//Logo end

//links start
Route::post('/store-links', [WebsiteSettingsController::class, 'tech_web_store_links'])->name('store.links')->middleware('is_moderator');
//Links end

//counter start
Route::post('/store-counter', [WebsiteSettingsController::class, 'tech_web_store_counter'])->name('store.counter')->middleware('is_moderator');
//counter end

//footer start
Route::post('/store-footer', [WebsiteSettingsController::class, 'tech_web_store_footer'])->name('store.footer')->middleware('is_moderator');

//footer end

//banner start
Route::post('/store-main-banner', [WebsiteSettingsController::class, 'tech_web_store_main_banner'])->name('store.main.banner')->middleware('is_moderator');
Route::get('/edit-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_edit_main_banner'])->name('edit.main.banner')->middleware('is_moderator');
Route::post('/update-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_update_main_banner'])->name('update.main.banner')->middleware('is_moderator');
//banner end




//general settings start
Route::get('/general-settings', [GeneralController::class, 'tech_web_general_settings'])->name('general.settings')->middleware('is_moderator');
//general settings end

//profile settings start
Route::get('/profile-settings', [GeneralController::class, 'tech_web_profile_settings'])->name('profile.settings')->middleware('is_moderator');
Route::post('/update-profile', [GeneralController::class, 'tech_web_update_profile'])->name('update.profile')->middleware('is_moderator');
Route::get('/user-profile-settings', [GeneralController::class, 'user_profile_settings'])->name('user.profile.settings')->middleware('auth');
Route::post('/update-user-profile', [GeneralController::class, 'user_update_profile'])->name('update.userProfile')->middleware('auth');
//profile settings end

Route::resource('popup-message',PopupMessageController::class)->middleware('auth');
Route::get('/clear-all-popup', [PopupMessageController::class, 'clearAllPopup'])->name('clearAllPopup')->middleware('is_admin');

Route::resource('popup-notice',PopupNoticeController::class)->middleware('auth');
Route::get('/pop-notice/draft',[PopupNoticeController::class,'draft'])->name('popup-notice.draft')->middleware('auth');
Route::put('/pop-notice/update-published/{id}',[PopupNoticeController::class,'updatePublished'])->name('popup-notice.updatePublished')->middleware('auth');
Route::get('/clear-all-popup-notice', [PopupNoticeController::class, 'clearAllPopup'])->name('clearAllPopupNotice')->middleware('is_admin');
Route::get('/republish-popup-notice/{id}', [PopupNoticeController::class, 'publish'])->name('notice.publish')->middleware('is_admin');
// Route::post('/user-popup-notice', [PopupNoticeController::class, 'popupNotice'])->name('popupNotice')->middleware('is_admin');  




Route::group(['middleware' => ['auth']], function () {

    // Payment Routes for bKash
    Route::get('/bkash/payment', [BkashPaymentController::class, 'index'])->name('bkash.index');
    Route::post('/bkash/get-token', [BkashPaymentController::class, 'getToken'])->name('bkash.get-token');
    Route::post('/bkash/create-payment', [BkashPaymentController::class, 'create_payment'])->name('bkash.create-payment');
    Route::post('/bkash/execute-payment', [BkashPaymentController::class, 'execute'])->name('bkash.execute-payment');
    Route::get('/bkash/query-payment', [BkashPaymentController::class, 'query'])->name('bkash.query-payment');
    Route::post('/bkash/success', [BkashPaymentController::class, 'success'])->name('bkash.success');

    // Refund Routes for bKash
    // Route::get('/bkash/refund', [BkashPaymentController::class, 'refundPage'])->name('bkash.refund');
    // Route::post('/bkash/refund', [BkashPaymentController::class, 'refund'])->name('bkash.refund');

    // Callback Route for bKash
    Route::match(['get', 'post'], '/bkash/callback', [BkashPaymentController::class, 'callback'])->name('bkash.callback');

    // Success and Failure routes
    Route::view('/bkash/success', 'User.modules.bkash_msg.success')->name('bkash.success');
    // Route::view('/bkash/fail', 'frontend.bkash.fail')->name('bkash.fail');
});
