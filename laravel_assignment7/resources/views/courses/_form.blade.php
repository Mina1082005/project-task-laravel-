<label>Title
</label>
<input name="title" required value="{{ old('title',$course->title ?? '') }}">
<label>Description
</label><textarea name="description">{{ old('description',$course->description ?? '') }}</textarea>
<label>Price
</label>
<input name="price" type="number" min="0" step="0.01" required value="{{ old('price',$course->price ?? '') }}">
<label>Duration (hours)
</label>
<input name="duration" type="number" min="1" step="1" required value="{{ old('duration',$course->duration ?? '') }}">
<button type="submit">Save
</button>
<a href="{{ route('courses.index') }}">Cancel
</a>
