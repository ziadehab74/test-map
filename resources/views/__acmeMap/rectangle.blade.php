<div id="add_rectangle_{{$index}}" class="input-section" style="display:none;">
    <h3>Add a New rectangle</h3>
    <label for="coords">Center and Radius: </label>
    <textarea type="text" id="rectangle_{{$index}}" name="rectangle_{{$index}}" placeholder="Center coordinates and radius"></textarea>
    <button  id="btn_rectangle_{{$index}}" >Add rectangle</button>
</div>
@include('acmeMap/map')
