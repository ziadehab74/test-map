<script>
    const ACME_MAP_CONFIGS = {!! json_encode(config('acmemap')) !!};
</script>

<link rel="stylesheet" href="/assets/css/map/leaflet.css" />
<link rel="stylesheet" href="/assets/css/map/leafletDraw.css" />
<link rel="stylesheet" href="/assets/css/map/minimap.css" />
<link rel="stylesheet" href="/assets/css/map/fullscreen.css" />
<link rel="stylesheet" href="/assets/css/map/main.css" />

<div id="acmemap-div-{{ $index }}" class="input-section" style="display:block;">
    <h3>Add items</h3>
    <label for="coords">Coordinates (lat,lng pairs separated by semicolons): </label>
    <div id="acmemap-map-{{ $index }}" class="acmemap-map-container">
        <textarea class="acmemap-input" id="acmemap-inputs-{{ $index }}" name="acmemap-inputs-{{ $index }}" cols=50 style="display: none;"
            rows="15" wire:model="acmemap_inputs" readonly>
           []
    </textarea>
        @if (config('leaflet.show_zoom_level'))
        <div class="acmemap-zoom-level" id="acmemap-zoom-level-{{ $index }}"
            style="display:{{ config('leaflet.show_zoom_level') }}">Zoom level:
            {{ config('leaflet.zoom_level') }}</div>
        @endif
    </div>
</div>

<script src="/assets/js/map/leaflet.js"></script>
<script src="/assets/js/map/leafletDraw.js"></script>
<script src="/assets/js/map/minimap.js"></script>
<script src="/assets/js/map/fullscreen.js"></script>
<script src="/assets/js/map/acmeMap.js"></script>
<script src="/assets/js/map/MovingMarker.js"></script>

