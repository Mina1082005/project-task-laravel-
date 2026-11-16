@extends('layouts.app')
@section('content')
<h2>Add Course
</h2>
<form method="POST" action="{{ route('courses.store') }}">
@csrf @include('courses._form')
</form>
@endsection
