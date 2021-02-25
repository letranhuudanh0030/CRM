<?php

return [
    'device_type' => [
        0 => "Không xác định",
        1 => "Máy Game",
        2 => "Máy Phiếu",
        3 => "Máy Thú",
        4 => 'Video Game',
        5 => 'Redemption',
        6 => 'Bowling'
    ],

    'menus' => [
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