<!DOCTYPE html>
<html>

<head>
    <title>Leaflet Map with Shape Drawing</title>
    <link rel="stylesheet" href="/assets/css/map/leaflet.css" />
    <link rel="stylesheet" href="/assets/css/map/leafletDraw.css" />
    <link rel="stylesheet" href="/assets/css/map/minimap.css" />
    <link rel="stylesheet" href="/assets/css/map/fullscreen.css" />
    <link rel="stylesheet" href="/assets/css/map/main.css" />

    <script>
        const ACME_MAP_CONFIGS = {!! json_encode(config('leaflet')) !!};
    </script>
</head>

<body>
    <div id="maps">
    </div>
    @include('acmeMap/map', ['index' => 0])
    @include('acmeMap/map', ['index' => 1])
    {{-- @include('acmeMap/map', ['index' => 0]) --}}

    {{-- @include('acmeMap/map', ['index' => 1]) --}}

    {{-- @include('acmeMap/map', ['index' => 1]) --}}

    {{-- @include('acmeMap/map', ['index' => 1]) --}}

    <script src="/assets/js/map/leaflet.js"></script>
    <script src="/assets/js/map/leafletDraw.js"></script>
    <script src="/assets/js/map/minimap.js"></script>
    <script src="/assets/js/map/fullscreen.js"></script>
    <script src="/assets/js/map/acmeMap.js"></script>

    <script>
        const params = new URLSearchParams(window.location.search);
        const mapsContainer = document.getElementById('maps');
        let index = 0;
            AcmeMap.create(document.getElementById(`acmemap-map-0`), {
                mapmode: false,
                AllowDrawItemsEdit: true,
                drawItems: {
                    polygon: {
                        display: true,
                        drawOnce: false,
                    },
                    polyline: {
                        display: true,
                        drawOnce: false,
                    },
                    circle: {
                        display: true,
                        drawOnce: false,
                    },
                    marker: {
                        display: true,
                        drawOnce: false,
                    },
                    circlemarker: {
                        display: true,
                        drawOnce: false,
                    },
                    rectangle: {
                        display: true,
                        drawOnce: false,
                    }
                },
                index,
            });
            AcmeMap.create(document.getElementById(`acmemap-map-1`), {
                mapmode: false,
                AllowDrawItemsEdit: true,
                drawItems: {
                    polygon: {
                        display: true,
                        drawOnce: false,
                    },
                    polyline: {
                        display: true,
                        drawOnce: false,
                    },
                    circle: {
                        display: true,
                        drawOnce: false,
                    },
                    marker: {
                        display: true,
                        drawOnce: false,
                    },
                    circlemarker: {
                        display: true,
                        drawOnce: false,
                    },
                    rectangle: {
                        display: true,
                        drawOnce: false,
                    }
                },
                index,
            });
        // if (!params.get('mapMode')) {
  
        // } else if (params.get('mapMode')) {
        //     for (const mode of params.get('mapMode').split(',')) {
        //         const modes = [];
        //         if (mode.includes('-')) {
        //             modes.push(mode.split('-'));
        //             AcmeMap.create(document.getElementById(`acmemap-map-${index}`), {
        //                 mapmode: true,
        //                 drawItems: modes[0],
        //                 index,
        //             });
        //             index++;
        //         } else {console.log(mode{
        //             display: true,
        //             drawOnce: false,
        //         });
        //             AcmeMap.create(document.getElementById(`acmemap-map-${index}`), {
                        
        //                 mapmode: true,
        //                 drawItems: mode,
        //                 index,
        //                 layerGroupsAPI: {
        //                     apiURL: "/api/layer-groups",
        //                     apiMethod: "GET"
        //                 },
        //                 layerGroups: [{
        //                         label: "Markers",
        //                         type: "marker",
        //                         data: [{
        //                                 position: [
        //                                     30.0444, 31.2357
        //                                 ],
        //                                 options: {
        //                                     color: "red"
        //                                 },
        //                                 popupData: "cairo"
        //                             },
        //                             {
        //                                 position: [
        //                                     30.0326, 31.2268
        //                                 ],
        //                                 options: {
        //                                     color: "red"
        //                                 },
        //                                 popupData: null
        //                             },
        //                         ]
        //                     },
        //                     {
        //                         label: "polygon",
        //                         type: "polygon",
        //                         data: [{
        //                             position: [
        //                                 [
        //                                     30.045058057591433,
        //                                     31.23608757413919
        //                                 ],
        //                                 [
        //                                     30.04475134291806,
        //                                     31.234975541783513
        //                                 ],
        //                                 [
        //                                     30.044180379227967,
        //                                     31.235046406590413
        //                                 ],
        //                                 [
        //                                     30.043897255516626,
        //                                     31.235820468327574
        //                                 ],
        //                                 [
        //                                     30.044232285154436,
        //                                     31.236545469815354
        //                                 ],
        //                                 [
        //                                     30.044855154144926,
        //                                     31.23667629715044
        //                                 ],
        //                                 [
        //                                     30.045058057591433,
        //                                     31.23608757413919
        //                                 ]
        //                             ],
        //                             options: {
        //                                 color: "red"
        //                             },
        //                             popupData: null
        //                         }, ]
        //                     }
        //                 ]
        //             });
        //             index++;
        //         }
        //     }
        // }
    </script>
</body>

</html>
