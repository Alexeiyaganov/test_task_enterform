<?php

defined( 'SYSPATH' ) or die( 'No direct script access.' );

return array(
    'vkontakte' => array(
        'APP_ID'        => '',
        'APP_SECRET'    => '',
        'SETTINGS'      => NULL,
        'REDIRECT_URI'  => 'http://codex.dev:8081/auth/vk',
        'GET_CODE_URI'  => 'https://oauth.vk.com/authorize/',
        'GET_TOKEN_URI' => 'https://oauth.vk.com/access_token'
    ),
    'odnoklassniki' => array(
        'APP_ID'        => NULL,
        'APP_SECRET'    => NULL,
        'APP_PUBLIC'    => NULL,
        'SETTINGS'      => NULL,
        'REDIRECT_URI'  => NULL,
        'GET_CODE_URI'  => NULL,
        'GET_TOKEN_URI' => NULL
    ),
    'facebook' => array(
        'APP_ID'        => '',
        'APP_SECRET'    => '',
        'SETTINGS'      => NULL,
        'REDIRECT_URI'  => 'http://'.Arr::get($_SERVER, 'SERVER_NAME').'/auth/fa
cebook',
        'GET_CODE_URI'  => 'https://www.facebook.com/dialog/oauth',
        'GET_TOKEN_URI' => 'https://graph.facebook.com/oauth/access_token'
    ),
    'github' => array(
        'APP_ID'        => '',
        'APP_SECRET'    => '',
        'SETTINGS'      => NULL,
        'REDIRECT_URI'  => 'http://codex.dev:8081/auth/github',
        'GET_CODE_URI'  => 'https://github.com/login/oauth/authorize',
        'GET_TOKEN_URI' => 'https://github.com/login/oauth/access_token'
    ),
);
