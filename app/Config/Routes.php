<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 
 $routes->get('/profile', 'UserController::Admin');
 $routes->post('/updateProfile/(:any)', 'UserController::updateProfile/$1');
 $routes->get('/signup', 'SignupController::index', ['filter'  => 'guestFilter']);
 $routes->match(['get', 'post'], 'store', 'SignupController::store');
 $routes->match(['get', 'post'], 'UserController/loginAuth', 'UserController::loginAuth');
 $routes->get('/signin', 'UserController::index', ['filter' => 'userGuard']);
 $routes->get('/contact', 'ViewController::contact');
 $routes->get('/eligibility', 'ViewController::eligability');
 $routes->get('/about', 'ViewController::about');
 $routes->get('/rules', 'ViewController::rules');
 $routes->get('/services', 'ViewController::service');

 $routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/logout', 'UserController::logout',['filter'  => 'authGuard']);


$routes->get('/signin', 'Home::try');
$routes->get('/', 'ViewController::home', ['filter' => 'userGuard']);
$routes->get('/contact', 'ViewController::contact');
$routes->get('/userbooking', 'ViewController::userbooking');
$routes->match(['GET', 'POST'],'ContactController/contact', 'ContactController::submit');
$routes->get('/donation', 'ViewController::donation');
$routes->get('/about', 'ViewController::about', ['filter'  => 'authGuard']);
$routes->get('/rules', 'ViewController::rules', ['filter'  => 'authGuard']);
$routes->get('/services', 'ViewController::service', ['filter'  => 'authGuard']);
$routes->get('/products', 'ViewController::products', ['filter'  => 'guestFilter']);
$routes->match(['GET', 'POST'],'UserController/register', 'UserController::save');
$routes->get('/register', 'UserController::register');
$routes->get('/product', 'ProductsController::products', ['filter'  => 'authGuard']);
$routes->get('/dashboard', 'ViewController::dash', ['filter'  => 'authGuard']);
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

$routes->get('/delete/(:num)', 'HomeController::delete/$1');
$routes->get('/withDeleted', 'NewController::withDeleted');
$routes->get('/adddetails', 'ViewController::adddetails');
$routes->get('/announcement', 'ViewController::announcement');
$routes->get('/details', 'HomeController::details');
$routes->post('/submit', 'HomeController::store');
$routes->get('/manageservices', 'ViewController::manageservices');
$routes->get('/managescdetails', 'ViewController::managescdetails');
$routes->post('/Archive', 'NewController::Archive');

$routes->get('/unreadq', 'ViewController::unreadq');
$routes->get('/readenq', 'ViewController::readenq');
$routes->get('/manageproduct', 'ViewController::manageproduct');
$routes->get('/addproduct', 'ViewController::addproduct');
$routes->get('/mysearchproducts', 'ProductsController::searchproduct');
$routes->get('/editscdetails', 'ViewController::editscdetails');
$routes->get('/editproduct', 'ViewController::editproduct');
$routes->get('/usersignin', 'ViewController::usersignin');
$routes->get('/usersignup', 'ViewController::usersignup');
$routes->post('/save', 'NewController::save');
$routes->get('/test', 'NewController::test');
$routes->get('searchdets', 'NewController::searchsc');
$routes->get('/archives', 'NewController::archives');
$routes->post('/update/(:any)', 'NewController::update/$1');
$routes->post('/submit', 'NewController::submit');
$routes->post('/update/(:num)', 'NewController::updates/$1');
$routes->get('/edit/(:num)', 'NewController::edit/$1');
$routes->get('/show', 'NewController::show');
$routes->post('/saved', 'NewController::saved');
$routes->get('searchproduct', 'ProductsController::searchproduct');
$routes->get('/searchpdets', 'ProductsController::searchprod');


$routes->get('/deleteproduct/(:any)', 'ProductsController::delete/$1');
$routes->get('/editproduct/(:num)', 'ProductsController::editprod/$1');
$routes->post('/updateprod/(:num)', 'ProductsController::updateprod/$1');

//updatetoread
$routes->get('/contactu', 'ContactController::contactu');
$routes->post('/check', 'ContactController::check');
$routes->post('/checked', 'ContactController::checked');
$routes->post('updateToRead', 'ContactController::updateRead');
$routes->post('updateToUnread', 'ContactController::updateUnread');

//calendar to`
$routes->get('/calendar', 'UserbookingController::bookinge');
$routes->get('/booking', 'UserbookingController::bookchecked');
$routes->post('/checkbooks', 'UserbookingController::checkbook');
$routes->post('/bookcheck', 'UserbookingController::bookcheck');
// $routes->post('reservationeventdate', 'UserbookingController::reserveEventDate');

$routes->get('usersignin','UsersigninController::usersignin');
$routes->get('/usersign', 'UsersigninController::indexes');
$routes->post('/UsersigninController/Auth', 'UsersigninController::UserLogin');
$routes->post('usersignup', 'UsersigninController::usersignup');

$routes->match(['post', 'get'], 'fundamental/accept', 'Fullcalendar::Accept');
$routes->match(['post', 'get'], 'fullcalendar/decline', 'Fullcalendar::Decline');

$routes->get('/ADbooking', 'UserbookingController::bookingAD');
$routes->get('/Dbooking', 'UserbookingController::bookingD');

$routes->get('/reportdetails', 'ViewController::viewreports');
$routes->get('searchreps', 'Fullcalendar::searchRes');
$routes->get('reports', 'Fullcalendar::try');

$routes->get('userprofile', 'UsersigninController::userProfile', ['filter'  => 'userFilter']);
$routes->match(['get', 'post'], 'updateUserProfile/(:any)', 'UsersigninController::updateuserProfile/$1');
$routes->get('userloguot', 'USersigninController::logout');

$routes->match(['post', 'get'], 'updateRecords/(:any)', 'ReportController::eventupdate/$1');
$routes->match(['post', 'get'], 'viewEvent/(:any)', 'ReportController::ViewReports/$1');
$routes->post('insertDonation', 'ReportController::donationreportadd');
$routes->get('donationReps', 'ReportController::donation');
$routes->get('viewDonation', 'ReportController::viewdonrep');

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
$routes->get('/newspublished', 'NewsController::published');
$routes->post('/PubArchive', 'NewsController::PubArchive');
$routes->get('newsvents/(:any)', 'ViewController::eventnews/$1');

$routes->get('/adevents', 'EventsController::adminevents');
$routes->post('saveEvents', 'EventsController::saveEvents');
$routes->get('Viewevents', 'EventsController::Viewevents');
$routes->get('updateevents/(:any)', 'EventsController::update/$1');
$routes->post('editEvents/(:any)', 'EventsController::EditEvents/$1');
$routes->post('ArchiveEvents', 'EventsController::Archive');
$routes->get('searchevents', 'EventsController::searchevents');
$routes->get('/publishedevents', 'EventsController::initialpublishedevent');
$routes->get('/eventsarchive', 'EventsController::eventsarchived');
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

//user event post
$routes->get('usereventpost', 'UserEvntPostController::userEventpost');

//user view event post
$routes->get('userViewpost', 'UserViewPostController::userViewpost');

//user donation site
$routes->get('userdonation', 'UserDonationController::userdonation');

//user products
$routes->get('userproduct', 'UserProductController::userproduct');
