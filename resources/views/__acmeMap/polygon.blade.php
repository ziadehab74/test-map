<div id="add_polygon_{{$index}}" class="input-section" style="display:none;">
    <h3>Add a New Polygon</h3>
    <label for="coords">Coordinates (lat,lng pairs separated by semicolons): </label>
    <textarea type="text" id="polygon_{{$index}}" name="polygon_{{$index}}" placeholder="list of lat , lng"></textarea>
    <button id="btn_polygon_{{$index}}" >Add Polygon</button>
</div>
@include('acmeMap/map')
