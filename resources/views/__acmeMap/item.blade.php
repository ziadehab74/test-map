<div id="acmemap-div-{{$index}}" class="input-section" style="display:block;">
    <h3>Add items</h3>
    <label for="coords">Coordinates (lat,lng pairs separated by semicolons): </label>
    <textarea id="acmemap-inputs-{{$index}}" name="acmemap-inputs-{{$index}}" wire:model="acmemap_inputs" ></textarea>
    <button id="btn_add_items">Add items</button>
</div>
@include('acmeMap/map')