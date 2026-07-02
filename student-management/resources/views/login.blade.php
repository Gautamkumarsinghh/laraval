@extends('layout')

@section('content')

<div class="container-fluid vh-100 d-flex align-items-center justify-content-center"
style="background:linear-gradient(135deg,#4F46E5,#06B6D4);">

    <div class="card shadow-lg border-0 rounded-4" style="width:420px;">

        <div class="card-body p-5">

            <div class="text-center mb-4">

                <i class="bi bi-mortarboard-fill text-primary" style="font-size:70px;"></i>

                <h2 class="fw-bold mt-3">
                    Student Portal
                </h2>

                <p class="text-muted">
                    Welcome Back 👋
                </p>

            </div>

            @if(session('error'))

            <div class="alert alert-danger">
                {{ session('error') }}
            </div>

            @endif

            <form action="/login" method="POST">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="Enter Email">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Password
                    </label>

                    <div class="input-group">

                        <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control form-control-lg"
                        placeholder="Enter Password">

                        <button
                        type="button"
                        class="btn btn-outline-secondary"
                        onclick="togglePassword()">

                            <i id="eye" class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>

                <div class="d-flex justify-content-between mb-4">

                    <div>

                        <input type="checkbox">

                        Remember Me

                    </div>

                    <a href="#">
                        Forgot Password?
                    </a>

                </div>

                <button class="btn btn-primary w-100 btn-lg">

                    <i class="bi bi-box-arrow-in-right"></i>

                    Login

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function togglePassword(){

let pass=document.getElementById('password');

let eye=document.getElementById('eye');

if(pass.type==="password")
{
pass.type="text";
eye.className="bi bi-eye-slash";
}
else
{
pass.type="password";
eye.className="bi bi-eye";
}

}

</script>

@endsection
