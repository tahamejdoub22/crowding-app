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
        'admin' => [
            'users' => 'c,r,u,d',
            'payments' => 'c,r,u,d',
            'reward' => 'c,r,u,d',
            'comment' => 'c,r,u,d',
            'updates' => 'c,r,u,d',

            'team' => 'c,r,u,d',
            'testimonials' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'projectresponsable' => [
            'project' => 'c',
            'comment' => 'r',
            'reward' => 'c,r,u',
            'team' => 'r',
            'testimonials' => 'r',
            'updates' => 'c,r,u',

        ],
        'projectinvestor' => [
            'payments' => 'c',
            'project' => 'r',
            'comment' => 'c,r,u',
            'team' => 'r',
            'testimonials' => 'r',
            'updates' => 'r',

        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
