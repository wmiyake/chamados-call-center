<?php

return [
    'title'=> env('APP_NAME'),
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text' => 'Novo Chamado',
            'url' => '/chamados/create',
            'can' => 'chamados.create',
        ],
        [
            'text' => 'Meus Chamados',
            'url' => '/chamados',
            'can' => 'chamados.create',
        ],
        [
            'text' => 'Triagem',
            'url' => '/triagem',
            'can' => 'admin',
        ],
        [
            'text' => 'Atender',
            'url' => '/atender',
            'can' => 'atendente',
        ],
        [
            'text' => 'Todos Chamados',
            'url' => '/todos',
            'can' => 'atendente',
        ],
        [
            'text' => 'Por Id',
            'url' => '/buscaid',
            'can' => 'atendente',
        ],
        [
            'text' => 'Categorias',
            'url'  => '/categorias',
            'can'  => 'admin',
        ],
        [
            'text' => 'Usuários',
            'url' => '/users',
            'can' => 'admin',
        ],
    ],
    'right_menu' => [
        [
            'text' => '<i class="fas fa-cog"></i> Configurações',
            'title' => 'Configurações',
            'submenu' => [
                [
                    'text' => 'Setores',
                    'url' => '/setores',
                    'can' => 'admin',
                ],
                [
                    'text' => 'Filas',
                    'url' => '/filas',
                    'can' => 'admin',
                ],
            ],

        ],
    ],
];
