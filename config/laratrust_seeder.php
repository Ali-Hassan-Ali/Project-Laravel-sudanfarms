<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [

        'super_admin' => [
            'dashboard'        => 'r',
            'users'            => 'c,r,u,d',
            'clients'          => 'c,r,u,d',
            'admins'           => 'c,r,u,d',
            'categoreys'       => 'c,r,u,d',
            'sub_categoreys'   => 'c,r,u,d',
            'products'         => 'c,r,u,d,s',
            'category_dealers' => 'c,r,u,d',
            'promoted_dealers' => 'c,r,u,d,s',
        ],
        
        'admin' => [
            'dashboard'  => 'r',
        ],
        
        'clients' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
        's' => 'show',
    ]
];
