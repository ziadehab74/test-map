<div id="acmemap-div-{{ $index }}" class="input-section" style="display:block;">
    <h3>Add items</h3>
    <label for="coords">Coordinates (lat,lng pairs separated by semicolons): </label>
    <div id="acmemap-map-{{ $index }}" class="acmemap-map-container">
        <textarea class="acmemap-input" id="acmemap-inputs-{{ $index }}" name="acmemap-inputs-{{ $index }}" cols=50"
            rows="15" wire:model="acmemap_inputs" readonly>
           [] 
    </textarea >
            @if (config('leaflet.show_zoom_level'))
            <div class="acmemap-zoom-level" id="acmemap-zoom-level-{{ $index }}"
                style="display:{{ config('leaflet.show_zoom_level') }}">Zoom level:
                {{ config('leaflet.zoom_level') }}</div>
        @endif
    </div>
</div>
