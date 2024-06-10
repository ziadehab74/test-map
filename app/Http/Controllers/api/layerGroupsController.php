<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class layerGroupsController extends Controller
{
    public function index()
    {
        $layerGroups = [
                 [
                "label" => "Markers 3",
                "type" => "marker",
                "data" => [
                    [
                        "position" => [
                            30.0444,
                            31.2357
                        ],
                        "options" => [
                            "color" => "red"
                        ],
                        "popupData" => "cairo"
                    ]
                ]
            ],
            [
                "label" => "Markers 4",
                "type" => "marker",
                "data" => [
                    [
                        "position" => [
                            30.0326,
                            31.2268
                        ],
                        "options" => [
                            "color" => "red"
                        ],
                        "popupData" => null
                    ]
                ]
            ],
            [
                "label" => "polygon 5",
                "type" => "polygon",
                "data" => [
                    [
                        "position" => [
                            [30.0326, 31.2268],
                            [30.0336, 31.2278],
                            [30.0346, 31.2288],
                            [30.0326, 31.2268] // Closing the polygon
                        ],
                        "options" => [
                            "color" => "red"
                        ],
                        "popupData" => null
                    ]
                ]
            ]
        ];
        return response()->json([
            'success' => true,
            'data' => $layerGroups
        ]);
    }
}
