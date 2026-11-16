<label>Full Name
</label>
<input name="name" required value="{{ old('name',$student->name ?? '') }}">
<label>Email
</label>
<input name="email" type="email" required value="{{ old('email',$student->email ?? '') }}">
<label>Phone (optional)
</label>
<input name="phone" value="{{ old('phone',$student->phone ?? '') }}">
<label>Course
</label>
<select name="course_id" required>
<option value="">Select a course
</option>
@foreach($courses as $course)
<option value="{{ $course->id }}" @selected(old('course_id',$student->course_id ?? '') == $course->id)>{{ $course->title }}
</option>
@endforeach
</select>
<button type="submit">Save
</button>
<a href="{{ route('students.index') }}">Cancel
</a>
