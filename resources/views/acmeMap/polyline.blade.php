<div id="add_polyline_{{$index}}" class="input-section" style="display:none;">
    <h3>Add a New Polyline</h3>
    <label for="coords">Coordinates (lat,lng pairs separated by semicolons): </label>
    <textarea type="text" id="polyline_{{$index}}" name="polyline" placeholder="list of lat , lng"></textarea>
    <button id="btn_polyline_{{$index}}" >Add Polyline</button>
</div>
@include('acmeMap/map')
