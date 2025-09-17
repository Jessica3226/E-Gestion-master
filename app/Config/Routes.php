<?php

namespace Config;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Routes par défaut
$routes->get('/', 'Home::accueil');
$routes->get('/login', 'Auth::login');
$routes->post('/login','Auth::doLogin');
$routes->get('/inscrit', 'Auth::inscrit');
$routes->post('/inscrit', 'Auth::doInscription');

$routes->get('/profil','Dashboard::admin');
// $routes->get('situation', 'Dashboard::situation');
$routes->get('/situation', 'SituationController::situationAdministrative');


$routes->get('certificat', 'CertificatController::imprimer');

$routes->get('/admin/dashboard', 'Dashboard::admin');
$routes->get('/dashboard', 'Dashboard::user');
$routes->get('/logout', 'Auth::logout');

$routes->get('/auth/check-info', 'Auth::checkInfo');
$routes->get('/completer-info', 'Auth::completerInfo');
$routes->post('/auth/save-info', 'Auth::saveInfo');

$routes->get('/update-statut/(:segment)/(:segment)', 'Dashboard::updateStatut/$1/$2');
$routes->get('imprimer/(:num)', 'Dashboard::imprimer/$1');

$routes->get('/contrats', 'SituationController::index');
$routes->post('/situation-admin/enregistrer', 'SituationController::enregistrer');


$routes->get('/ajoutAgent', 'AgentController::create');
$routes->get('/listesAgent', 'CrudController::listesAgent');
$routes->get('/grouped', 'AgentController::index');
$routes->get('/agents/delete/(:num)', 'AgentController::delete/$1');
$routes->get('agents/edit/(:num)', 'AgentController::edit/$1');
$routes->post('agents/update/(:num)', 'AgentController::update/$1');
// $routes->get('agents/ajaxSearch', 'AgentController::ajaxSearch');
$routes->get('/agents/searchLive', 'AgentController::searchLive');

$routes->post('agent/addAgent', 'AgentController::addAgent');
$routes->get('/agents', 'AgentController::index');

$routes->post('ajoutphoto/store', 'AjoutPhoto::store');
$routes->post('ajoutphoto/deletePhoto/(:num)', 'AjoutPhoto::deletePhoto/$1');

$routes->get('agentcontroller/testinsert', 'AgentController::testInsert');

//base de donnees phpmyadmin
    $routes->post('agent/addAgent', 'AgentController::addAgent');
    $routes->post('agents/store', 'AgentController::store');
    $routes->post('familles/create','FamilleController::create');

//base de donnees json
    // $routes->get('listesAgent', 'AjoutController::index');
    // $routes->get('ajoutAgent', 'AjoutController::create');
    // $routes->post('agents/store', 'AjoutController::store');
    // $routes->post('agent/addAgent', 'AjoutController::store');

$routes->match(['get', 'post'],'/familleAgent', 'FamilleController::cre');
$routes->get('famille/create', 'FamilleController::create');
$routes->post('/familleAgent/store', 'FamilleController::store');
$routes->post('/famille/auth', 'FamilleController::auth');
$routes->get('/famille/dashboard', 'FamilleController::dashboard');
$routes->get('famille/logout', 'FamilleController::logout');

$routes->get('/famille/ajouter', 'FamilleController::index');
$routes->get('/familles/edit/(:num)', 'FamilleController::edit/$1');
$routes->post('/familles/update/(:num)', 'FamilleController::update/$1');
$routes->get('/familles/delete/(:num)', 'FamilleController::delete/$1');

// Routes pour les archives 
$routes->get('/archivesAgent', 'ArchiveController::index');
$routes->get('/archives', 'ArchiveController::index');
$routes->get('/archives/create', 'ArchiveController::create');
$routes->post('/archives/store', 'ArchiveController::store');
$routes->get('/archives/edit/(:num)', 'ArchiveController::edit/$1');
$routes->post('/archives/update/(:num)', 'ArchiveController::update/$1');
$routes->get('/archives/delete/(:num)', 'ArchiveController::delete/$1');
$routes->post('items/deleteAll', 'ArchiveController::deleteAll');


