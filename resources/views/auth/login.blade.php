<!DOCTYPE html>
<html lang="en" data-theme="luxury">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Expense Tracker</title>
   <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="min-h-screen bg-gray-900 flex items-center justify-center">

    <div class="card w-full max-w-md bg-gray-800 shadow-xl">
        <div class="card-body">

            <h2 class="card-title text-primary text-3xl font-bold justify-center mb-2">
                 Welcome
            </h2>
            <p class="text-center text-white text-base-content/60 mb-4">Login to your account</p>

                @include('partials.error')


            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white">Email</span></div>
                <input id="email" type="email" placeholder="you@example.com" class="input input-primary w-full"/>
            </label>

            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white">Password</span></div>
                <input id="password" type="password" placeholder="Your password" class="input input-primary w-full"/>
            </label>

            <button onclick="login()" class="btn btn-primary w-full mt-4">
                Login
            </button>

            <p class="text-center text-white text-sm mt-2">
                Don't have an account?
                <a href="/register" class="link link-primary">Register</a>
            </p>

        </div>
    </div>

    @include('partials.scripts')

</body>
</html>
