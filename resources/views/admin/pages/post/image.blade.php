@if($image)
 <img id="preview" src="{{ ('images/posts/'.$image) }}" alt="Preview" class="form-group hidden" width="200" height="100">
@else
 <img id="preview" src="images/400x250.png" alt="Preview" class="form-group hidden"  width="200" height="100">
@endif