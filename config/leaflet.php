<?php
return [
    'zoom_level'           => env('ZOOM_LEVEL', 19),
    'detail_zoom_level'    => env('DETAIL_ZOOM_LEVEL', 16),
    'min_zoom_level'       => env('MIN_ZOOM_LEVEL', 8),
    'max_zoom_level'       => env('MAX_ZOOM_LEVEL', 19),
    'center_point'         => env('MAP_CENTER_POINT', '30.0444,31.2357'),
    'attribution'          => env('MAP_ATTRIBUTION', 'AcmeSaico'),

    //mini map options 
    'minimap' => [
        'display'        => env('SHOW_MINI_MAP', true),
        'toggle'      => env('MINI_MAP_TOGGLE', true),
        'minimized'   => env('MINI_MAP_MINIMIZED', true),
        'position'    => env('MINI_MAP_POSITION', 'bottomright'),
        'zoom_level_offset'    => env('ZOOM_LEVEL_OFFSET', -3),
    ],

    'show_zoom_level'      => env('SHOW_ZOOM_LEVEL', true),
    'show_full_screen'     => env('SHOW_FULL_SCREEN', true),
    'default_tiles'        => env('DEFAULT_TILES', 'arcgisonline_satellite'),

    'tiles' => [
        'arcgisonline_satellite' => [
            'label'=>"arcgisonline satellite" ,
            'url' => env('MAP_URL', 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}')
        ],
        'openstreetmap' => [
            'label'=>"openstreetmap" ,
            'url' => env('MAP_URL', 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        ],
    ]
];
