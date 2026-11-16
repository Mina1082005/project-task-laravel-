@extends('layouts.app')
@section('content')
<h2>Students
</h2>
<a class="btn" href="{{ route('students.create') }}">Add Student
</a>
<form method="GET" action="{{ route('students.index') }}">
<label>Search by name
</label>
<input name="search" value="{{ request('search') }}" placeholder="Student name">
<label>Filter by course
</label>
<select name="course_id">
<option value="">All courses
</option>
@foreach($courses as $course)
<option value="{{ $course->id }}" @selected(request('course_id') == $course->id)>{{ $course->title }}
</option>
@endforeach
</select>
<button type="submit">Filter
</button>
<a href="{{ route('students.index') }}">Clear
</a>
</form>
<table>
<thead>
<tr>
<th>Name
</th>
<th>Email
</th>
<th>Phone
</th>
<th>Course
</th>
<th>Actions
</th>
</tr>
</thead>
<tbody>
@forelse($students as $student)
<tr>
<td>{{ $student->name }}
</td>
<td>{{ $student->email }}
</td>
<td>{{ $student->phone ?? '—' }}
</td>
<td>{{ $student->course->title }}
</td>
<td>
<a href="{{ route('students.edit',$student) }}">Edit
</a>
<form class="inline" method="POST" action="{{ route('students.destroy',$student) }}" onsubmit="return confirm('Delete student?')">
@csrf 
@method('DELETE')
<button class="danger" type="submit">Delete
</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="5">No students found.
</td>
</tr>
@endforelse
</tbody>
</table>
<div class="pagination">{{ $students->links() }}
</div>
@endsection
