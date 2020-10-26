<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'client' => [
        'title' => 'Clients',

        'actions' => [
            'index' => 'Clients',
            'create' => 'New Client',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'ruc' => 'Ruc',
            'name' => 'Name',
            'address' => 'Address',
            'company_phone' => 'Company phone',
            'contact' => 'Contact',
            'contact_phone' => 'Contact phone',
            'contact_email' => 'Contact email',
            
        ],
    ],

    'm-model' => [
        'title' => 'Models',

        'actions' => [
            'index' => 'Models',
            'create' => 'New Model',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            
        ],
    ],

    'm-brand' => [
        'title' => 'Brands',

        'actions' => [
            'index' => 'Brands',
            'create' => 'New Brand',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            
        ],
    ],

    'motor' => [
        'title' => 'Motors',

        'actions' => [
            'index' => 'Motors',
            'create' => 'New Motor',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'code' => 'Code',
            'brand_id' => 'Brand',
            'model_id' => 'Model',
            'power_number' => 'Power Number',
            'power_measurement' => 'Power Measurement',
            'volt' => 'Volt',
            'speed' => 'Speed',
            'status' => 'Status',
            
        ],
    ],

    'status' => [
        'title' => 'Status',

        'actions' => [
            'index' => 'Status',
            'create' => 'New Status',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            
        ],
    ],

    'ot' => [
        'title' => 'OT',

        'actions' => [
            'index' => 'OT',
            'create' => 'New Ot',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'date' => 'Date',
            'seller' => 'Seller',
            'motor_id' => 'Motor ID',
            'status' => 'Status',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];