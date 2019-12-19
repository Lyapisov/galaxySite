<?php
return array(

    'user/login' => 'user/login',
    'user/register' => 'user/register',
    'user/logout' => 'user/logout',

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'admin/news/create' => 'adminNews/create',
    'admin/news/update/([0-9]+)' => 'adminNews/update/$1',
    'admin/news/delete/([0-9]+)' => 'adminNews/delete/$1',
    'admin/news' => 'adminNews/index',

    'admin/photo' => 'adminPhoto/index',
    'admin/photo/create' => 'adminPhoto/create',

    'admin/category' => 'adminCategory/index',

    'admin' => 'admin/index',

    'index' => 'site/index',
    '' => 'site/index',
);