<?php

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2024 Theradata Indonesia <theradata.indonesia@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->group('admin', ['filter' => 'group:admin,superadmin'], function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::index', ['as' => 'dashboard']);
    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Profile::index', ['as' => 'profile']);
        $routes->get('edit', 'Profile::edit', ['as' => 'profile.edit']);
        $routes->post('edit', 'Profile::update', ['as' => 'profile.update']);
    });

    $routes->group('company', function ($routes) {
        $routes->group('stores', function ($routes) {
            $routes->add('/', 'Company::store', ['as' => 'company.store']);
            // $routes->post('save', 'Company::storeSave', ['as' => 'company.store.save']);
        });
    });

    $routes->group('setting', function ($routes) {
        $routes->get('/', 'Setting::index', ['as' => 'setting']);
    });
});
