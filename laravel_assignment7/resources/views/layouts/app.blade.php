<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Training Center</title>
<style>body{font-family:Arial,sans-serif;max-width:1000px;margin:30px auto;padding:0 18px;color:#243047;background:#f6f8fb}nav a,.btn,button{display:inline-block;padding:9px 14px;background:#2155a5;color:white;text-decoration:none;border:0;border-radius:5px;cursor:pointer;margin:3px}nav{margin-bottom:22px}.panel{background:white;padding:20px;border-radius:10px;box-shadow:0 2px 9px #0001}table{border-collapse:collapse;width:100%;background:white}th,td{padding:12px;border-bottom:1px solid #ddd;text-align:left}input,select,textarea{padding:9px;width:100%;box-sizing:border-box;margin:5px 0 14px}label{font-weight:bold}.success{background:#d8f3df;padding:12px}.error{background:#ffe0e0;padding:12px}.inline{display:inline}.danger{background:#bd3333}.muted{color:#677} .pagination{margin-top:20px}
</style></head>
<body>
<h1>Training Center Management
</h1>
<nav>
<a href="{{ route('dashboard') }}">Dashboard
</a>
<a href="{{ route('courses.index') }}">Courses
</a>
<a href="{{ route('students.index') }}">Students
</a>
</nav>
@if(session('success'))
<p class="success">{{ session('success') }}
</p>
@endif
@if(session('error'))
<p class="error">{{ session('error') }}
</p>
@endif
@if($errors->any())
<div class="error"><strong>Please correct the following:</strong>
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}
</li>
@endforeach
</ul>
</div>
@endif
<div class="panel">@yield('content')
</div></body></html>
