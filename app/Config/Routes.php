<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/trylangmagsend', 'SignupController::trylangmagsend');
 
 $routes->get('/profile', 'UserController::Admin');
 $routes->post('/updateProfile/(:any)', 'UserController::updateProfile/$1');
 $routes->get('/signup', 'SignupController::index', ['filter'  => 'guestFilter']);
 $routes->match(['get', 'post'], 'store', 'SignupController::store');
 $routes->match(['get', 'post'], 'UserController/loginAuth', 'UserController::loginAuth');
 $routes->get('/signin', 'UserController::index', ['filter' => 'guestFilter']);
 $routes->get('GoogleLoginAuth', 'UserController::GoogleAuthLogin');
 $routes->get('/contact', 'ViewController::contact');
 $routes->get('/eligibility', 'ViewController::eligability');
 $routes->get('/about', 'ViewController::about');
 $routes->get('/rules', 'ViewController::rules');
 $routes->get('/services', 'ViewController::service');
 $routes->match(['get', 'post'], 'viewAdminRegister', 'SignupController::Register');
 $routes->match(['get', 'post'], 'adminRegister', 'SignupController::AdminRegister');
 $routes->match(['get', 'post'], 'viewUsers', 'SignupController::viewUsers');
 $routes->match(['get', 'post'], 'deleteUser/(:any)', 'SignupController::deleteUser/$1');

 $routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
 $routes->get('/logout', 'UserController::logout',['filter'  => 'authGuard']);

 $routes->get('verify/(:any)', 'SignupController::verify/$1');
 $routes->get('/verify-email', 'SignupController::verifyEmailReminder');

// $routes->get('/signin', 'Home::try');
$routes->get('/', 'ViewController::home', ['filter' => 'guestFilter']);
$routes->get('/contact', 'ViewController::contact', ['filter' => 'guestFilter']);
$routes->get('/userbooking', 'ViewController::userbooking');
$routes->match(['GET', 'POST'],'ContactController/contact', 'ContactController::submit');
$routes->get('/donation', 'ViewController::donation');
$routes->get('/about', 'ViewController::about', ['filter'  => 'guestFilter']);
$routes->get('/rules', 'ViewController::rules', ['filter'  => 'guestFilter']);
$routes->get('/services', 'ViewController::service', ['filter'  => 'authGuard']);
$routes->get('/products', 'ViewController::products', ['filter'  => 'guestFilter']);
$routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/register', 'UserController::register');
$routes->get('/product', 'ProductsController::products', ['filter'  => 'authGuard']);

$routes->get('/search', 'ViewController::search');
$routes->get('/searchs', 'ViewController::searchs');
$routes->get('/rule', 'ViewController::rule');
$routes->get('/eligibility', 'ViewController::eligibility', ['filter'  => 'uFilter'], ['filter'  => 'guestFilter']);
$routes->get('/aboutus', 'ViewController::aboutus');
$routes->get('/contactus', 'ViewController::contactus');
$routes->get('/news', 'ViewController::news');
$routes->get('/reps', 'ViewController::reports');
$routes->get('/list', 'HomeController::index');
$routes->get('/create', 'ViewController::create');
$routes->post('/submit', 'ViewController::store');


$routes->get('/unreadq', 'ViewController::unreadq');
$routes->get('/readenq', 'ViewController::readenq');
$routes->get('/manageproduct', 'ViewController::manageproduct');
$routes->get('/addproduct', 'ViewController::addproduct');
$routes->get('/mysearchproducts', 'ProductsController::searchproduct');
$routes->get('/editscdetails', 'ViewController::editscdetails');
$routes->get('/editproduct', 'ViewController::editproduct');
// $routes->get('/usersignin', 'ViewController::usersignin');
// $routes->get('/usersignup', 'ViewController::usersignup');
$routes->post('/save', 'NewController::save');
$routes->get('/test', 'NewController::test');
$routes->get('searchdets', 'NewController::searchsc');
$routes->get('/archives', 'NewController::archives');
$routes->get('/deleteleftElder/(:any)', 'NewController::deleteleftElder/$1');
$routes->get('/archivesdeceased', 'NewController::archivesdeceased');
$routes->get('/deletedeceasedElder/(:any)', 'NewController::deletedeceasedElder/$1');
$routes->post('/update/(:any)', 'NewController::update/$1');
$routes->post('/submit', 'NewController::submit');
$routes->post('/update/(:num)', 'NewController::updates/$1');
$routes->get('/edit/(:num)', 'NewController::edit/$1');
$routes->get('/show', 'NewController::show');
$routes->post('/saved', 'NewController::saved');

if(session()->get('role') == 'Admin' || session()->get('role') == 'MainAdmin'){
$routes->get('/delete/(:num)', 'HomeController::delete/$1');
$routes->get('/withDeleted', 'NewController::withDeleted');
$routes->get('/adddetails', 'ViewController::adddetails');

$routes->get('/details', 'HomeController::details');
$routes->post('/submit', 'HomeController::store');
$routes->get('/manageservices', 'ViewController::manageservices');
$routes->get('/managescdetails', 'ViewController::managescdetails');
$routes->post('/Archive', 'NewController::Archive');

$routes->get('gettoAccept/(:any)', 'UserbookingController::getNotifAccept/$1');

$routes->get('eventfeedback', 'FeedbackController::viewfeedbackevent');

$routes->get('/deleteFeedEvents/(:any)', 'FeedbackController::deleteFeedEvents/$1');



$routes->get('/dashboard', 'ViewController::dash', ['filter'  => 'authGuard']);
$routes->get('searchproduct', 'ProductsController::searchproduct');
$routes->get('/searchpdets', 'ProductsController::searchprod');
$routes->get('/calendar', 'UserbookingController::bookinge');
$routes->get('/ADbooking', 'UserbookingController::bookingAD');
$routes->get('/deleteAcceptedEvent/(:any)', 'UserbookingController::deleteAcceptedEvent/$1');
$routes->get('/Dbooking', 'UserbookingController::bookingD');
$routes->get('/deleteDeclinedEvent/(:any)', 'UserbookingController::deleteDeclinedEvent/$1');

$routes->group('Main', ['filter'=>'authGuard'], static function($routes){
    $routes->get('', 'Main::index');
    $routes->get('(:segment)', 'Main::$1');
    $routes->get('(:segment)/(:any)', 'Main::$1/$2');
    $routes->match(['post'], 'user_add', 'Main::user_add');
    $routes->match(['post'], 'user_edit/(:num)', 'Main::user_edit/$1');
    $routes->match(['post'], 'product_edit/(:num)', 'Main::product_edit/$1');
    $routes->match(['post'], 'product_add', 'Main::product_add/$1');
    $routes->match(['post'], 'save_transaction', 'Main::save_transaction');
});


$routes->get('tableindkind','UserIdonateController::viewDonateInkind');
$routes->post('PostponedInkind','UserIdonateController::PostponedInkind');
$routes->post('ReceivedInkind','UserIdonateController::ReceivedInkind');
$routes->get('deleteinkind/(:any)','UserIdonateController::dltInkinddonation/$1');
$routes->post('ReceivedMonetary','UserIdonateController::ReceivedMonetary');
$routes->post('PosponedMonetary','UserIdonateController::PosponedMonetary');


$routes->get('viewReceiveMonetary','UserIdonateController::viewReceiveMonetary');
$routes->get('deleteReceiveMonetary/(:any)', 'UserIdonateController::deleteReceiveMonetary/$1');
$routes->get('viewPostponedMonetary','UserIdonateController::viewPostponedMonetary');
$routes->get('deletePostponedMonetary/(:any)', 'UserIdonateController::deletePostponedMonetary/$1');
$routes->get('viewReceiveInkind','UserIdonateController::viewReceiveInkind');
$routes->get('deleteReceivedInkind/(:any)', 'UserIdonateController::deleteReceivedInkind/$1');
$routes->get('viewPostponedInkind','UserIdonateController::viewPostponedInkind');
$routes->get('deletePostponedInkind/(:any)', 'UserIdonateController::deletePostponedInkind/$1');
$routes->post('/updatetoAccept', 'FeedbackController::updatetoAccept');
$routes->post('updatetoAcceptAnn', 'FeedbackController::updatetoAcceptAnn');

}
$routes->get('/deleteproduct/(:any)', 'ProductsController::delete/$1');
$routes->get('/editproduct/(:num)', 'ProductsController::editprod/$1');
$routes->post('/updateprod/(:num)', 'ProductsController::updateprod/$1');

//updatetoread
$routes->get('/contactu', 'ContactController::contactu');
$routes->post('/check', 'ContactController::check');
$routes->post('/checked', 'ContactController::checked');
$routes->post('updateToRead', 'ContactController::updateRead');
$routes->post('updateToUnread', 'ContactController::updateUnread');
$routes->get('/deletereadInq/(:any)', 'ContactController::deletereadInq/$1');


//calendar to`
if(session()->get('role') == 'Booker' && session()->get('is_verified') == 1){
    // Routes for a logged-in and verified Booker user

    // Route to submit in-kind donation
    $routes->match(['get', 'post'], 'UserIdonateController/sbmtInkindDonation', 'UserIdonateController::sbmtInkindDonation');

    // Route to view in-kind donation page
    $routes->get('donate-items', 'UserIdonateController::inKind');

    // Route to view bookings
    $routes->get('/booking', 'UserbookingController::bookchecked');

    // Route to view user products
    $routes->get('userproduct', 'UserProductController::userproduct');

    // Route to view user donations
    $routes->get('userdonation', 'UserDonationController::userdonation');

    // Route to view donation page
    $routes->get('donate-money', 'UserIdonateController::userIdonate');
    $routes->post('/sbmtDonation', 'UserIdonateController::sbmtDonation');

    // Route to view user's event posts
    $routes->get('userViewpost', 'UserViewPostController::userViewpost');

    // Route to view and post events
    $routes->get('usereventpost', 'UserEvntPostController::userEventpost');
    $routes->post('/usersavepost', 'UserEvntPostController::usersavepost');
}

$routes->get('/announcement', 'ViewController::announcement');

$routes->post('/checkbooks', 'UserbookingController::checkbook');
$routes->post('/bookcheck', 'UserbookingController::bookcheck');
// $routes->post('reservationeventdate', 'UserbookingController::reserveEventDate');

// $routes->get('usersignin','UsersigninController::usersignin');
$routes->get('/usersign', 'UsersigninController::indexes');
$routes->post('/UsersigninController/Auth', 'UsersigninController::UserLogin');
// $routes->post('usersignup', 'UsersigninController::usersignup');

$routes->match(['post', 'get'], 'fundamental/accept', 'Fullcalendar::Accept');
$routes->match(['post', 'get'], 'fullcalendar/decline', 'Fullcalendar::Decline');

$routes->get('/reportdetails', 'ViewController::viewreports');
$routes->get('searchreps', 'Fullcalendar::searchRes');
$routes->get('reports', 'Fullcalendar::try');

$routes->get('userprofile', 'UsersigninController::userProfile');
$routes->match(['get', 'post'], 'updateUserProfile/(:any)', 'UserController::updateuserProfile/$1');
$routes->get('userloguot', 'USersigninController::logout');

$routes->match(['post', 'get'], 'updateRecords/(:any)', 'ReportController::eventupdate/$1');
$routes->match(['post', 'get'], 'viewEvent/(:any)', 'ReportController::ViewReports/$1');
$routes->post('insertDonation', 'ReportController::donationreportadd');
$routes->get('donationReps', 'ReportController::donation');
$routes->get('viewDonation', 'ReportController::viewdonrep');
$routes->get('/deletedonreport/(:any)', 'ReportController::delete/$1');

//edit left elder
$routes->match(['post', 'get'], 'vieweditleft/(:any)', 'NewController::ViewEditLeft/$1');
$routes->match(['post', 'get'], 'saveEditleft/(:any)', 'NewController::saveEditleft/$1');
//edit deceased elder
$routes->match(['post', 'get'], 'vieweditdeceased/(:any)', 'NewController::ViewEditDeceased/$1');
$routes->match(['post', 'get'], 'saveEditdeceased/(:any)', 'NewController::saveEditdeceased/$1');

$routes->post('Archivestat', 'Fullcalendar::Archive');

//news and events sa admin side
$routes->get('adnews', 'NewsController::adminnews');
$routes->post('savenews', 'NewsController::savenews');
$routes->get('/updatenews', 'NewsController::updatenews');

$routes->get('/updatenews/(:any)', 'NewsController::update/$1');
$routes->post('editnews/(:any)', 'NewsController::EditNews/$1');
$routes->post('NewsArchive', 'NewsController::Archive');
$routes->get('searchnews', 'NewsController::searchnews');
$routes->get('/newsarchive', 'NewsController::newsarchived');
$routes->get('/deleteArchivedNews/(:any)', 'NewsController::deleteArchivedNews/$1');
$routes->get('/newspublished', 'NewsController::published');
$routes->post('/PubArchive', 'NewsController::PubArchive');
$routes->get('newsvents/(:any)', 'ViewController::eventnews/$1');
$routes->get('eventForUsers/(:any)', 'ViewController::eventForUsers/$1');
$routes->get('viewAnnounce/(:any)', 'AnnouncementController::viewAnnouncement/$1');

$routes->get('/adevents', 'EventsController::adminevents');
$routes->post('saveEvents', 'EventsController::saveEvents');
$routes->get('Viewevents', 'EventsController::Viewevents');
$routes->get('updateevents/(:any)', 'EventsController::update/$1');
$routes->post('editEvents/(:any)', 'EventsController::EditEvents/$1');
$routes->post('ArchiveEvents', 'EventsController::Archive');
$routes->get('searchevents', 'EventsController::searchevents');
$routes->get('/publishedevents', 'EventsController::initialpublishedevent');
$routes->get('/eventsarchive', 'EventsController::eventsarchived');
$routes->get('/deleteEventArch/(:any)', 'EventsController::deleteEventArch/$1');
$routes->post('/EventPubArc', 'EventsController::EventPubArc');

//visualization
$routes->get('bookings/by-month', 'UserbookingController::index');
$routes->get('products/quantities', 'ProductsController::index');
$routes->get('/dash', 'ViewController::dashboard'); 

//announcements
$routes->get('Adannouncement', 'AnnouncementController::Adannnouncement');
$routes->post('saveannounce', 'AnnouncementController::saveAnnouncement');
$routes->get('/updateannounce', 'AnnouncementController::viewannounce');
$routes->post('editAnnounce/(:any)', 'AnnouncementController::EditAnnounce/$1');
$routes->get('/updateannouncement/(:any)', 'AnnouncementController::updateannouncement/$1');
$routes->get('/publishedannounce', 'AnnouncementController::publishedann');
$routes->post('/archiveannounce', 'AnnouncementController::AnnouncePubArc');
$routes->get('/announceArchived', 'AnnouncementController::announceArchived');
$routes->get('/deleteAnnounceArch/(:any)', 'AnnouncementController::deleteAnnounceArch/$1');
$routes->post('myAnnouncePubArch', 'AnnouncementController::AnnouncePubArch');
$routes->get('searchannounce', 'AnnouncementController::searchannouncement');

//user donation site
//user products

//menu what elders need
$routes->get('menu', 'MenuController::seemenu');


//admin userdonatedtable
$routes->get('userdonatedtable', 'UserIdonateController::admdonatedtable');
$routes->get('deleteReceivedInkind/(:any)', 'UserIdonateController::deletedonation/$1');

//feedback for user event posting 
$routes->post('feedback', 'EventsController::savefeedbackevent');

//feedback for announcement
$routes->post('feedbackannounce', 'AnnouncementController::savefeedbackannounce');
$routes->get('announcefeedback', 'FeedbackController::viewfeedbackannounce');
$routes->get('/deleteFeedannounced/(:any)', 'FeedbackController::deleteFeedannounced/$1');
$routes->get('pdf', 'AnnouncementController::pdf');
$routes->get('hello', 'AnnouncementController::hello');
//elderneed sa admin side
$routes->get('viewelderneed', 'ElderneedController::viewelderneed');
$routes->post('saveneed', 'ElderneedController::saveneed');
$routes->get('manageneed', 'ElderneedController::displayelderneed');
$routes->get('editNeed/(:any)', 'ElderneedController::viewToupdate/$1');
$routes->post('updateElneed/(:any)', 'ElderneedController::editelderneed/$1');
$routes->get('deleteneed/(:any)', 'ElderneedController::deleteneed/$1');

$routes->get('reportElder/(:any)', 'ReportController::eldersreps/$1');
//piechart
$routes->get('/gender/distribution', 'UserbookingController::index2');

//report generation of event
$routes->get('reportevent', 'Fullcalendar::viewrepEvent');
$routes->get('eventpermonth', 'Fullcalendar::searchRevent');
$routes->get('/getNotif/(:any)', 'UserViewPostController::getNotif/$1');

$routes->get('generateElderlyReport/(:any)', 'Fullcalendar::generateElderlyReport/$1');
$routes->get('generateEventReport/(:any)/(:any)', 'Fullcalendar::generateEventReport/$1/$2');
$routes->get('generateElderlyLeft', 'NewController::generateElderlyLeft');
$routes->get('generateElderlyDeceased', 'NewController::generateElderlyDeceased');

$routes->match(['get', 'post'], 'sample', 'UserIdonateController::retrieve');
$routes->match(['get', 'post'],'uploads/image', 'UserIdonateController::show');


$routes->get('viewreportleft', 'NewController::viewreportleft');
$routes->get('viewSearchLeft', 'NewController::viewSearchLeft');
$routes->match(['get', 'post'],'getReportsLeft/(:any)/(:any)', 'NewController::getReportsLeft/$1/$2');

$routes->get('viewreportdeath', 'NewController::viewreportdeath');
$routes->get('viewSearchDeath', 'NewController::viewSearchDeath');
$routes->match(['get', 'post'],'getReportsDeath/(:any)/(:any)', 'NewController::getReportsDeath/$1/$2');

$routes->match(['get', 'post'], 'getToeditMonetary/(:any)', 'UserIdonateController::getToeditMonetary/$1');
$routes->match(['get', 'post'], 'EditMonetary/(:any)', 'UserIdonateController::EditMonetary/$1');

$routes->get('reportMonetary', 'UserIdonateController::viewReportMonetary');
$routes->get('searchmonetary','UserIdonateController::searchMonetary');
$routes->match(['get', 'post'], 'getReportsMonatary/(:any)/(:any)', 'NewController::getReportsMonatary/$1/$2');
