AcmeMap = {
    create(elem, options = {}, custom_configs = {}) {
        var mapObj = new AcmeMapClass(elem, options, custom_configs);
        mapObj.create();
        return mapObj;
    }
}

class AcmeMapClass {
    constructor(elem, options = {}, custom_configs = {}) {
        this.elem = elem;
        this.options = options;
        this.configs = { ...ACME_MAP_CONFIGS, ...custom_configs };
        this.map_elem = elem;
        this.map_zoom_level_elem = document.getElementById(`acmemap-zoom-level-${this.options.index}`);
        this.map_inputs_elem = document.getElementById(`acmemap-inputs-${this.options.index}`);
    }

    create() {
        this.map = L.map(this.elem).setView(this.configs.center_point.split(','), this.configs.zoom_level);
        this.addTiles();
        this.addMiniMap();
        this.updateZoomLevel();
        this.setDrawItemsControls();
        this.drawitems();
        // this.showInputs();
        if (this.options.layerGroups) this.addlayerGroups(this.options.layerGroups);
        if (this.options.layerGroupsAPI) this.addLayerGroupsAPI(this.options.layerGroupsAPI.apiURL, this.options.layerGroupsAPI.apiMethod);
    }

    addTiles() {
        this.tilesLayers = {};
        for (const [tileName, tileConfig] of Object.entries(this.configs.tiles)) {
            const tileLayer = L.tileLayer(tileConfig.url, {
                maxZoom: this.configs.max_zoom_level,
                minZoom: this.configs.min_zoom_level,
                attribution: `${this.configs.attribution}`
            });
            this.tilesLayers[tileConfig.label] = tileLayer;
            if (tileName === this.configs.default_tiles) {
                tileLayer.addTo(this.map);
            }
        }
    }

    addlayerGroups(layerGroups) {
        this.overlays = {};
        layerGroups.forEach(group => {
            this.overlays[group.label] = L.layerGroup();
            group.data.forEach(elem => {
                const layer = L[group.type](elem.position, elem.options).addTo(this.overlays[group.label]);
                if (elem.popupData) {
                    layer.bindPopup(elem.popupData);
                }
            });
        });
        this.controlLayer = L.control.layers(this.tilesLayers, this.overlays).addTo(this.map);
    }

    addLayerGroupsAPI(apiURL, apiMethod) {
        var self = this;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var data = JSON.parse(this.responseText).data;
                self.options.layerGroups.push(...data);
                self.controlLayer.remove();
                self.addlayerGroups(self.options.layerGroups);
            }
        };
        xhttp.open(apiMethod, apiURL, true);
        xhttp.send();
    }

    addMiniMap() {
        if (!this.configs.minimap.display)
            return;
        var miniMapLayer = L.tileLayer(this.configs.tiles.openstreetmap.url, {});
        new L.Control.MiniMap(miniMapLayer, {
            toggleDisplay: this.configs.minimap.toggle,
            minimized: this.configs.minimap.minimized,
            zoomLevelOffset: this.configs.minimap.zoom_level_offset,
            position: this.configs.minimap.position,
        }).addTo(this.map);
    }

    updateZoomLevel() {
        const updateZoomLevelFun = () => {
            const zoomLevel = this.map.getZoom();
            this.map_zoom_level_elem.innerText = 'Zoom level: ' + zoomLevel;
        };
        updateZoomLevelFun();
        this.map.on('zoomend', updateZoomLevelFun);
    }
    setDrawItemsControls() {
        this.drawnItemsFeatureGroup = new L.FeatureGroup();
        this.map.addLayer(this.drawnItemsFeatureGroup);
        var mode = this.options.mode;
        var drawOptions = { draw: {} };
        if (this.options.AllowDrawItemsEdit)
            drawOptions.edit = {
                featureGroup: this.drawnItemsFeatureGroup
            };
        // console.log(this.options, this.options.drawItems);
        for (const [item, options] of Object.entries(this.options.drawItems)) {
            // console.log([item, options]);
            if (options.display) {
                drawOptions.draw[item] = true;
            }
            else {
                drawOptions.draw[item] = false;
            }
        }
        const drawControl = new L.Control.Draw(drawOptions);

        this.map.addControl(drawControl);
        this.initializeDrawControls();
    }
    drawitems() {
        var data = this.map_inputs_elem.innerHTML;
        if (!data)
            data = "[]";
        data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
            var layer = L[data[i].type](data[i].coords, data[i].options);
            layer._leaflet_id = data[i].id;
            this.drawnItemsFeatureGroup.addLayer(layer);
        }
    }


    drawItemAction(layer) {
        this.drawnItemsFeatureGroup.addLayer(layer);
        var latLngs = null;
        if (layer instanceof L.Marker) {
            latLngs = {
                id: '' + layer._leaflet_id,
                type: 'marker',
                coords: [layer.getLatLng().lat, layer.getLatLng().lng],
                // options: layer.options

            };
            console.log('Marker coordinates:', latLngs, layer);
        }

        else if (layer instanceof L.CircleMarker) {
            latLngs = {
                id: layer._leaflet_id,
                type: 'circle',
                coords: [layer.getLatLng().lat, layer.getLatLng().lng],
                options: layer.options,
            };
            console.log('Circle data:', latLngs);
        }

        else if (layer instanceof L.Rectangle) {
            latLngs = {
                id: layer._leaflet_id,
                type: 'rectangle',
                coords: layer.getLatLngs()[0].map(latlng => [latlng.lat, latlng.lng]),
                options: layer.options
            };
            console.log('Rectangle coordinates:', latLngs, layer);
        } else if (layer instanceof L.Polygon) {
            latLngs = {
                id: layer._leaflet_id,
                type: 'polygon',
                coords: layer.getLatLngs()[0].map(latlng => [latlng.lat, latlng.lng]),
                options: layer.options,
            };
            console.log('Polygon data:', latLngs);
        }
        else if (layer instanceof L.Polyline) {
            latLngs = {
                id: layer._leaflet_id,
                type: 'polyline',
                coords: layer.getLatLngs().map(latlng => [latlng.lat, latlng.lng]),
                options: layer.options
            };
            console.log('Polyline coordinates:', latLngs, layer);
        }
        else if (layer instanceof L.Polygon) {
            latLngs = {
                id: layer._leaflet_id,
                type: 'polygon',
                coords: layer.getLatLngs().map(latlngArray => latlngArray.map(latlng => [latlng.lat, latlng.lng])),
                options: layer.options

            };
            console.log('Polygon coordinates:', latLngs, layer);
        }
        this.updateInputsElement(latLngs);
    }
    updateInputsElement(latLngs, remove = false) {
        var data = this.map_inputs_elem.innerHTML;
        if (!data)
            data = "[]";
        data = JSON.parse(data);
        for (var i = 0; i < data.length; i++) {
            if (data[i].id == latLngs.id) {
                data.splice(i, 1);
                break;
            }
        }
        if (!remove)
            data.push(latLngs);
        this.map_inputs_elem.innerHTML = JSON.stringify(data);
    }
    initializeDrawControls() {
        this.map.on('draw:created', (e) => {
            console.log('Drawing completed');
            this.drawItemAction(e.layer);
        });

        this.map.on('draw:edited', (e) => {
            console.log('Drawing edited');
            e.layers.eachLayer((layer) => {
                this.drawItemAction(layer);
            });
        });

        this.map.on('draw:deleted', (e) => {
            console.log('Drawing deleted');
            e.layers.eachLayer((layer) => {
                this.updateInputsElement({ id: layer._leaflet_id }, true);
            });
        });
    }
    showInputs() {
        document.getElementById(`add_${this.options.mode}_${this.options.index} `).style.display = 'block';
    }
}