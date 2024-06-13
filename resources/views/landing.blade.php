<!DOCTYPE html>
<html>

<head>
    <title>Acme map</title>
</head>

<body>

    @include('acmeMap', ['index' => 0])
    <script>
        const params = new URLSearchParams(window.location.search);
        const mapsContainer = document.getElementById('maps');
        let index = 0;
            AcmeMap.create(document.getElementById(`acmemap-map-0`), {
                textarea:true,
                AllowDrawItemsEdit: true,
                index,
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
                layerGroups: [
                            {
                                label: "Markers",
                                type: "marker",
                                data: [
                                    { position: [30.0444, 31.2357], options: { color: "red" }, popupData: "cairo" },
                                    { position: [30.0326, 31.2268], options: { color: "red" }, popupData: null }
                                ]
                            },
                            {
                                label: "Polygon",
                                type: "polygon",
                                data: [
                                    {
                                        position: [
                                            [30.045055872848327,31.2360754609108],
                                            [30.045007114914142,31.235941350460056],
                                            [30.04497925322669,31.23581260442734],
                                            [30.044930495254796,31.23568117618561],
                                            [30.044916564401273,31.23556047677994],
                                            [30.044879415448957,31.235407590866092],
                                            [30.044877093639002,31.23532980680466],
                                            [30.044849231914956,31.235260069370273],
                                            [30.044791186631414,31.23519837856293],
                                            [30.04474010675377,31.235160827636722],
                                            [30.04470063592117,31.235152781009678]
                                                      ],
                                        options: { color: "red" },
                                        popupData: null
                                    }
                                ]
                            }
                ],
            });





            // AcmeMap.create(document.getElementById(`acmemap-map-1`), {
            //     mapmode: false,
            //     AllowDrawItemsEdit: true,
            //     drawItems: {
            //         polygon: {
            //             display: true,
            //             drawOnce: false,
            //         },
            //         polyline: {
            //             display: true,
            //             drawOnce: false,
            //         },
            //         circle: {
            //             display: true,
            //             drawOnce: false,
            //         },
            //         marker: {
            //             display: true,
            //             drawOnce: false,
            //         },
            //         circlemarker: {
            //             display: true,
            //             drawOnce: false,
            //         },
            //         rectangle: {
            //             display: true,
            //             drawOnce: false,
            //         }
            //     },
            //     index,
            // });







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
