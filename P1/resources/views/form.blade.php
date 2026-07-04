<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,#4F46E5,#06B6D4);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-5">

<div class="bg-white shadow-2xl rounded-3xl w-full max-w-md p-8">

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Student Registration
        </h1>

        <p class="text-gray-500 mt-2">
            Fill your details to create your account
        </p>
    </div>

    <form action="\student" method="POST" class="space-y-5">
        @csrf

        <!-- Name -->
       <div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Full Name
    </label>

    <input
        type="text"
        name="name"
        value="{{ old('name') }}"
        placeholder="Enter your name"
        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">

        @error('name')
            <span class="text-red-500 text-sm">
                {{ $message }}
            </span>
        @enderror
</div>

        <!-- Email -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                @error('email')
            <span class="text-red-500 text-sm">
                {{ $message }}
            </span>
        @enderror
        </div>

        <!-- Mobile -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Mobile Number
            </label>

            <input
                type="text"
                name="mobile"
                value="{{old('mobile')}}"
                 maxlength="10"
                 oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                placeholder="Enter mobile number"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                @error('email')
            <span class="text-red-500 text-sm">
                {{ $message }}
            </span>
        @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Password
            </label>

            <input
                type="password"
                name="password"
                 maxlength="8"  
                value="{{old('password')}}"
                placeholder="Enter password"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-4 focus:ring-indigo-200 focus:border-indigo-500 outline-none transition">
                @error('password')
                <span class="text-red-500 text-sm">
                {{$message}}
                </span>
                @enderror
        </div>

        <!-- Button -->
        <button
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition duration-300 shadow-lg hover:shadow-xl">
            Register Now
        </button>

    </form>

    <div class="text-center mt-6 text-gray-500">
        Already have an account?
        <a href="/login" class="text-indigo-600 font-semibold hover:underline">
            Login
        </a>
    </div>

</div>

</body>
</html>
