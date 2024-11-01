<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="bg-secondary text-gray-200 flex items-center justify-center min-h-screen">
        <div class="w-3/12 p-8 rounded-xl mr-40">
            <h1 class="text-primary text-4xl font-semibold font-poppins mb-24 mt-16">Welcome Back</h1>
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block sm:inline font-poppins">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                        </svg>
                    </span>
                </div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <ul class="mt-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="font-poppins">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="relative mb-4">
                    <input type="text" name="username" placeholder="Username" class="w-full py-3 pl-3 pr-10 rounded-md border border-gray-700 bg-quaternary text-sm font-poppins text-secondary placeholder-secondary placeholder:font-poppins outline-none focus:border-primary focus:ring-2 focus:ring-primary transition duration-300">
                    <i class="fas fa-user absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none"></i>
                </div>
                <div class="relative mb-16">
                    <input type="password" name="password" placeholder="Password" class="w-full py-3 pl-3 pr-10 rounded-md border border-gray-700 bg-quaternary text-sm font-poppins text-secondary placeholder-secondary placeholder:font-poppins outline-none focus:border-primary focus:ring-2 focus:ring-primary transition duration-300">
                    <i class="fas fa-lock absolute right-3 top-1/2 transform -translate-y-1/2 text-primary pointer-events-none"></i>
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-md bg-primary text-sm font-poppins text-secondary font-semibold outline-none hover:text-white focus:ring-2 focus:ring-primary transition duration-300">Login</button>
            </form>

            <p class="text-gray-500 text-sm font-poppins text-center mt-28">
                belum punya akun? <a href="#" class="text-primary hover:underline">Register</a>
            </p>
        </div>
        <div class="">
            <img src="{{ asset('assets/gambar.svg') }}" alt="Login" class="w-full h-full object-cover">
        </div>
    </div>
</body>

</html>
