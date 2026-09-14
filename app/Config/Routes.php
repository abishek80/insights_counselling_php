<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Frontend Routes
$routes->get('/', 'Home::index');
$routes->get('about', 'Home::about');
$routes->get('contact', 'Home::contact');
$routes->get('services', 'Home::services');
$routes->get('services/(:segment)', 'Home::serviceDetail/$1');
$routes->get('team', 'Home::team');
$routes->get('faq', 'Home::faq');
$routes->get('testimonials', 'Home::testimonials');
$routes->get('privacy-policy', 'Home::privacy');
$routes->get('refund-policy', 'Home::refund');
$routes->get('our-values', 'Home::ourValues');
$routes->get('helpline-details', 'Home::helplines');
$routes->get('helplines', 'Home::helplines');
$routes->get('error-404', 'Home::notFound');
$routes->get('thank-you', 'Home::thankyou');
$routes->get('sitemap.xml', 'Home::sitemap');
$routes->get('llms.txt', 'Home::llmsTxt');
$routes->get('llms-full.txt', 'Home::llmsFullTxt');
$routes->post('contact/submit', 'Home::submitEnquiry');

// Admin Auth Routes
$routes->get('admin/login', 'Admin\Auth::login');
$routes->post('admin/login', 'Admin\Auth::loginSubmit');
$routes->get('admin/logout', 'Admin\Auth::logout');

// Protected Admin Panel Routes
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    // Dashboard Homepage
    $routes->get('/', 'Admin\Dashboard::index');

    // Team Management
    $routes->get('team', 'Admin\Team::index');
    $routes->get('team/create', 'Admin\Team::create');
    $routes->post('team/store', 'Admin\Team::store');
    $routes->get('team/edit/(:num)', 'Admin\Team::edit/$1');
    $routes->post('team/update/(:num)', 'Admin\Team::update/$1');
    $routes->get('team/delete/(:num)', 'Admin\Team::delete/$1');
    $routes->get('team/toggle-status/(:num)', 'Admin\Team::toggleStatus/$1');

    // Testimonials Management
    $routes->get('testimonials', 'Admin\Testimonials::index');
    $routes->get('testimonials/create', 'Admin\Testimonials::create');
    $routes->post('testimonials/store', 'Admin\Testimonials::store');
    $routes->get('testimonials/edit/(:num)', 'Admin\Testimonials::edit/$1');
    $routes->post('testimonials/update/(:num)', 'Admin\Testimonials::update/$1');
    $routes->get('testimonials/delete/(:num)', 'Admin\Testimonials::delete/$1');
    $routes->get('testimonials/toggle-status/(:num)', 'Admin\Testimonials::toggleStatus/$1');

    // FAQ Management
    $routes->get('faq', 'Admin\Faq::index');
    $routes->get('faq/create', 'Admin\Faq::create');
    $routes->post('faq/store', 'Admin\Faq::store');
    $routes->get('faq/edit/(:num)', 'Admin\Faq::edit/$1');
    $routes->post('faq/update/(:num)', 'Admin\Faq::update/$1');
    $routes->get('faq/delete/(:num)', 'Admin\Faq::delete/$1');
    $routes->get('faq/toggle-status/(:num)', 'Admin\Faq::toggleStatus/$1');

    // Service Management
    $routes->get('services', 'Admin\Services::index');
    $routes->get('services/create', 'Admin\Services::create');
    $routes->post('services/store', 'Admin\Services::store');
    $routes->get('services/edit/(:num)', 'Admin\Services::edit/$1');
    $routes->post('services/update/(:num)', 'Admin\Services::update/$1');
    $routes->get('services/delete/(:num)', 'Admin\Services::delete/$1');
    $routes->get('services/toggle-status/(:num)', 'Admin\Services::toggleStatus/$1');

    // Branch Locations
    $routes->get('branches', 'Admin\Branches::index');
    $routes->get('branches/create', 'Admin\Branches::create');
    $routes->post('branches/store', 'Admin\Branches::store');
    $routes->get('branches/edit/(:num)', 'Admin\Branches::edit/$1');
    $routes->post('branches/update/(:num)', 'Admin\Branches::update/$1');
    $routes->get('branches/delete/(:num)', 'Admin\Branches::delete/$1');
    $routes->get('branches/toggle-status/(:num)', 'Admin\Branches::toggleStatus/$1');

    // Enquiries Management
    $routes->get('enquiries', 'Admin\Enquiries::index');
    $routes->get('enquiries/delete/(:num)', 'Admin\Enquiries::delete/$1');

    // General Settings
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
});

// 404 Override Handler
$routes->set404Override('App\Controllers\Home::notFound');
