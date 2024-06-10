<div id="add_marker_{{$index}}" class="marker-component" style="display:none;">
    <h3>Add a New Marker </h3>
    <label for="lat_{{$index}}">Latitude: </label>
    <input type="text" id="lat_{{$index}}" name="lat_{{$index}}" placeholder="e.g., 30.0444">
    <label for="lng_{{$index}}">Longitude: </label>
    <input type="text" id="lng_{{$index}}" name="lng_{{$index}}" placeholder="e.g., 31.2357">
    <button id="btn_marker_{{$index}}" ">Add Marker</button>
</div>

@include('acmeMap/map')
