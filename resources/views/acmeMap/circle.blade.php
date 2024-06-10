<div id="add_circle_{{$index}}" class="input-section" style="display:none;">
    <h3>Add a New Circle</h3>
    <label for="coords">Center and Radius: </label>
    <textarea type="text" id="circle_{{$index}}" name="circle_{{$index}}" placeholder="Center coordinates and radius"></textarea>
    <button id="btn_circle_{{$index}}" >Add Circle</button>
</div>
@include('acmeMap/map')
