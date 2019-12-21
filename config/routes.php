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

    'admin/photo/create' => 'adminPhoto/create',
    'admin/photo/update/([0-9]+)' => 'adminPhoto/update/$1',
    'admin/photo/delete/([0-9]+)' => 'adminPhoto/delete/$1',
    'admin/photo' => 'adminPhoto/index',

    'admin/category/create' => 'adminCategory/create',
    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    'admin/category' => 'adminCategory/index',

    'admin' => 'admin/index',

    'site/contacts' => 'site/contacts',
    'site/aboutUs' => 'site/aboutUs',
    'site/photogalery' => 'site/photogalery',

    'index' => 'site/index',
    '' => 'site/index',
);