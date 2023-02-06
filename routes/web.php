<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

/* Grupo de rotas autenticadas */
/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
