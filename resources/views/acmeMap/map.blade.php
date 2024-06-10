<div id="map-{{$index}}" class="map-container" >
    @if (config('leaflet.show_zoom_level'))
        <div class="zoom-level" id="zoom-level-{{$index}}" style="display:{{ config('leaflet.show_zoom_level') }}">Zoom level:
            {{ config('leaflet.zoom_level') }}</div>
    @endif
</div>
