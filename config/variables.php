<?php

return [
    'role' => [
        0 => "User",
        1 => "Manager",
        2 => "Super Admin",
        3 => "CEO"
    ],

    'menus' => [
        'dashboard' => [
            'name' => 'Bảng điều khiển',
            'icon' => 'fas fa-th',
            'url' => '/',
            'submenu' => []
        ],
        'user_manage' => [
            'name' => 'Quản lý người dùng',
            'icon' => 'fas fa-users',
            'url' => '',
            'submenu' => [
                'user' => [
                    'name' => 'Người dùng',
                    'url' => '/user/list',
                    'icon' => '',  
                ],
                'permission' => [
                    'name' => 'Nhóm người dùng',
                    'url' => '/permission/list',
                    'icon' => '',
                ],
            ]
        ],
        'branch_manage' => [
            'name' => 'Quản lý chi nhánh',
            'icon' => 'fas fa-building',
            'url' => '/branch/list',
            'submenu' => []
        ],
        'device_manage' => [
            'name' => 'Quản lý thiết bị',
            'icon' => 'fas fa-gamepad',
            'url' => '',
            'submenu' => [
                'devices' => [
                    'name' => 'Thiết bị',
                    'url' => '/devices/list',
                    'icon' => '',  
                ],
                'device_type' => [
                    'name' => 'Loại thiết bị',
                    'url' => '/device_type/list',
                    'icon' => '',
                ],
            ]
        ],
        'task_manage' => [
            'name' => 'Quản lý công việc',
            'icon' => 'fas fa-tasks',
            'url' => '/task/list',
            'submenu' => []
        ]
    ]
];