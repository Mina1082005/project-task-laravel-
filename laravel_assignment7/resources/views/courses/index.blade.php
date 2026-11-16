@extends('layouts.app')
@section('content')
<h2>Courses
</h2>
<a class="btn" href="{{ route('courses.create') }}">Add Course
</a>
<table>
<thead>
<tr>
<th>Title
</th>
<th>Price
</th>
<th>Duration (hours)
</th>
<th>Students
</th>
<th>Actions
</th>
</tr>
</thead>
<tbody>
@forelse($courses as $course)
<tr>
<td>{{ $course->title }}
</td>
<td>{{ number_format($course->price,2) }}
</td>
<td>{{ $course->duration }}
</td>
<td>{{ $course->students_count }}
</td>
<td>
<a href="{{ route('courses.show',$course) }}">Details
</a> | 
<a href="{{ route('courses.edit',$course) }}">Edit
</a>
<form class="inline" method="POST" action="{{ route('courses.destroy',$course) }}" onsubmit="return confirm('Delete course?')">
@csrf 
@method('DELETE')
<button class="danger" type="submit">Delete
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5">No courses yet.
</td>
</tr>
@endforelse
</tbody>
</table>
@endsection
