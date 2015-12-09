<?php

return [
    'title' => [
        'ticket' => [
            'latest'  => 'Solicitudes Recientes',
            'popular' => 'Solicitudes Populares',
            'open'    => 'Solicitudes Abiertas',
            'closed'  => 'Tutoriales',
        ],
    ],

    'total' => [
        'ticket' => [
            'latest'  => '{0} No existen solicitudes recientes'
                        . '|{1} Solo existe una solicitud reciente'
                        . '|[2,Inf] Existen :count solicitudes recientes',
            'popular' => '{0} No existen solicitudes populares'
                        . '|{1} Solo existe una solicitud popular'
                        . '|[2,Inf] Existen :count solicitudes populares',
            'open'    => '{0} No existen solicitudes abiertas'
                        . '|{1} Solo existe una solicitud abierta'
                        . '|[2,Inf] Existen :count solicitudes abiertas',
            'closed'  => '{0} No existen tutoriales'
                        . '|{1} Solo existe un tutorial'
                        . '|[2,Inf] Existen :count tutoriales',
        ],
    ],

    'status' => [
        'open'   => 'Abierta',
        'closed' => 'Finalizada',
    ]
];