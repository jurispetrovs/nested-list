<?php

return FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $namespace = '\App\Controllers\\';

    $r->addRoute('GET', '/', $namespace . 'SectionsController@index');

    $r->addRoute('GET', '/login', $namespace . 'LoginController@index');
    $r->addRoute('POST', '/login', $namespace . 'LoginController@login');
    $r->addRoute('GET', '/logout', $namespace . 'LoginController@logout');
    $r->addRoute('GET', '/register', $namespace . 'RegisterController@index');
    $r->addRoute('POST', '/register', $namespace . 'RegisterController@store');

    $r->addRoute('POST', '/register/email', $namespace . 'RegisterController@emailValidation');

    $r->addRoute('POST', '/login/email', $namespace . 'LoginController@emailValidation');
    $r->addRoute('POST', '/login/password', $namespace . 'LoginController@passwordValidation');

    $r->addRoute('GET', '/section/create', $namespace . 'SectionsController@create');
    $r->addRoute('POST', '/section/create', $namespace . 'SectionsController@store');

    $r->addRoute('GET', '/section/{id}/edit', $namespace . 'SectionsController@edit');
    $r->addRoute('PUT', '/section/{id}/edit', $namespace . 'SectionsController@update');

    $r->addRoute('GET', '/section/{id}', $namespace . 'SectionsController@show');
    $r->addRoute('DELETE', '/section/{id}', $namespace . 'SectionsController@delete');

});