@extends('layouts.app')
@section('content')

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand fw-bold">
🎓 Student Management
</a>

<a href="/logout" class="btn btn-light">
Logout
</a>

</div>

</nav>

<div class="container mt-5">

<h2>
Welcome {{ session('user') }} 👋
</h2>

<p class="text-muted">
Laravel Student Management Dashboard
</p>

<div class="row mt-4">

<div class="col-md-4">

<div class="card shadow border-0 rounded-4">

<div class="card-body text-center">

<h1 class="text-primary">
120
</h1>

Students

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow border-0 rounded-4">

<div class="card-body text-center">

<h1 class="text-success">
15
</h1>

Courses

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow border-0 rounded-4">

<div class="card-body text-center">

<h1 class="text-danger">
20
</h1>

Teachers

</div>

</div>

</div>

</div>

</div>

@endsection
