<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Titles for routes names
    |--------------------------------------------------------------------------
    |
    | Set Titles for each admin routes names
    */

    'admin' => 'dashboard',
    
    'employees' => [
        'index' => 'employeesGestion',
        'create' => 'employeeCreate',
        'edit' => 'employeeEdit',
    ],
    'task' => [
        'index' => 'taskGestion',
        'create' => 'taskCreate',
        'edit' => 'taskEdit',
    ],
    'employee_task' => [
        'index' => 'employee_taskGestion',
        'create' => 'employee_taskCreate',
        'edit' => 'employee_taskEdit',
    ],
    'report' => [
        'index' => 'reportGestion',
    ],
    'users' => [
        'index' => 'usersGestion',
        'edit' => 'userEdit',
    ],
    'contacts' => [
        'index' => 'contactsGestion',
    ],
    'posts' => [
        'index' => 'postsGestion',
        'edit' => 'postEdit',
        'create' => 'postCreate',
        'show' => 'postShow',
    ],
    'notifications' => [
        'index' => 'notificationsGestion',
    ],
    'comments' => [
        'index' => 'commentsGestion',
    ],
    'medias' => [
        'index' => 'mediasGestion',
    ],
    'settings' => [
        'edit' => 'settings',
    ],
    'categories' => [
        'index' => 'categoriesGestion',
        'create' => 'categoryCreate',
        'edit' => 'categoryEdit',
    ],
    
];