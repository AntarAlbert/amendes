<?php

namespace Config;

use App\Controllers\TypeInfractionController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// CRUD RESTful Routes
$routes->match(['get', 'post'], 'types-infractions', 'TypeInfractionController::get_types_infactions');

$routes->get('users-list', 'UserCrud::index');
$routes->get('agents-list', 'AgentBeneficiaireController::index');
$routes->get('infractions-list', 'TypeInfractionController::index');
$routes->get('verbalisateurs-list', 'VerbalisateurInfractionController::index');
$routes->get('penalites-list', 'SigocPenalitesTypeController::index');

$routes->get('user-form', 'UserCrud::create');
$routes->get('agent-form', 'AgentBeneficiaireController::create');
$routes->post('submit-form', 'UserCrud::store');
$routes->get('edit-view/(:num)', 'UserCrud::singleUser/$1');

$routes->get('amendes-list', 'AmendeController::index');
$routes->get('add-amende', 'AmendeController::create');
$routes->post('add-agent', 'AgentBeneficiaireController::create');
$routes->get('edit-agent/(:num)', 'AgentBeneficiaireController::singleAgent/$1');
$routes->get('edit-amende/(:num)', 'AmendeController::singleAmende/$1');
$routes->get('edit-penalite/(:num)', 'PartPenaliteController::singlePenalite/$1');

$routes->post('update', 'UserCrud::update');
$routes->post('update-agent', 'AgentBeneficiaireController::update');
$routes->get('delete/(:num)', 'UserCrud::delete/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}