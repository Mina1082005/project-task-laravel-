@extends('layouts.app')
@section('content')
<h2>{{ $course->title }}
</h2>
<p>{{ $course->description }}
</p>
<p>Price: {{ number_format($course->price,2) }} | Duration: {{ $course->duration }} hours
</p>
<h3>Registered Students ({{ $course->students->count() }})
</h3>
<ul>
@forelse($course->students as $student)
<li>{{ $student->name }} — {{ $student->email }}
</li>
@empty
<li>No students registered.
</li>
@endforelse
</ul>
<a href="{{ route('courses.index') }}">Back
</a>
@endsection
