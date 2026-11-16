@extends('layouts.app')
@section('content')
<h2>Edit Course
</h2>
<form method="POST" action="{{ route('courses.update',$course) }}">
@csrf 
@method('PUT') @include('courses._form')
</form>
@endsection
