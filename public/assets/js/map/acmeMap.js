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
    }

    create() {
        this.map = L.map(this.elem).setView(this.configs.center_point.split(','), this.configs.zoom_level);
        this.addTiles();
        this.addMiniMap();
        this.updateZoomLevel();
        this.drawitems();
        // this.showInputs();
        this.addlayerGroups(this.options.layerGroups);
        this.addLayerGroupsAPI(this.options.layerGroupsAPI.apiURL, this.options.layerGroupsAPI.apiMethod);
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
            document.getElementById(`zoom-level-${this.options.index}`).innerText = 'Zoom level: ' + zoomLevel;
        };
        updateZoomLevelFun();
        this.map.on('zoomend', updateZoomLevelFun);
    }

    drawitems() {
        var drawnItems = new L.FeatureGroup();
        this.map.addLayer(drawnItems);

        var mode = this.options.mode;
        console.log('internal',mode)
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems
            },
            draw: {
                polygon: mode.includes('polygon'),
                polyline: mode.includes('polyline'),
                circle: mode.includes('circle'),
                marker: mode.includes('marker'),
                circlemarker: mode.includes('circlemarker'),
                rectangle: mode.includes('rectangle')
            }
        });

        this.map.addControl(drawControl);
        this.drawcreate(drawnItems);
        this.drawedit(drawnItems);
        this.drawdelete(drawnItems);

    }

    drawaction(layer) {
        var index = this.options.index;
        var mode = this.options.mode;

        if (mode === 'marker') {
            var latlng = layer.getLatLng();
            document.getElementById(`lat_${index}`).value = latlng.lat;
            document.getElementById(`lng_${index}`).value = latlng.lng;
        } else {
            var latLngs;
            if (mode === 'polyline' || mode === 'rectangle') {
                latLngs = JSON.stringify(layer.getLatLngs());
            }
            if (mode === 'polygon') {
                latLngs = JSON.stringify(layer.getLatLngs()[0]);
            }
            if (mode === 'circle') {
                var circleData = {
                    center: [layer.getLatLng().lat, layer.getLatLng().lng],
                    radius: layer.getRadius()
                };
                latLngs = JSON.stringify(circleData);
            }
            document.getElementById(`${mode}_${index}`).value = latLngs;
        }
    }
    drawcreate(drawnItems) {
        this.map.on('draw:created', (e) => {
            var layer = e.layer;
            drawnItems.addLayer(layer);
            this.drawaction(layer);
            const element = document.querySelector(`.leaflet-draw-draw-${this.options.mode}`);
            element.style.display = 'none';


        });
    }

    drawedit(drawnItems) {
        this.map.on('draw:edited', (e) => {
            e.layers.eachLayer((layer) => {
                this.drawaction(layer);
            });
        });

    }
    drawdelete(drawnItems) {
        var mode = this.options.mode;
        var index = this.options.index;
        this.map.on('draw:deleted', function (e) {
            if (mode == 'marker') {
                document.getElementById(`lat_${index}`).value = "";
                document.getElementById(`lng_${index}`).value = "";
            }
            if (mode != 'marker')
                document.getElementById(`${mode}_${index}`).value = "";
            const element = document.querySelector(`.leaflet-draw-draw-${mode}`);
            element.style.display = 'block';

        });
    }

    showInputs() {
        document.getElementById(`add_${this.options.mode}_${this.options.index}`).style.display = 'block';
    }
    addLayerGroup() {
        var littleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.'),
            denver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.'),
            aurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.'),
            golden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.');
        var cities = L.layerGroup([littleton, denver, aurora, golden]);

    }

}