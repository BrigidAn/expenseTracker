<!DOCTYPE html>
<html lang="en" data-theme="luxury">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-gray-900 flex items-center justify-center">

    <div class="card w-full max-w-md bg-gray-800 shadow-xl">
        <div class="card-body">

            <h2 class="card-title text-3xl text-primary font-bold justify-center mb-2">
                Create Account
            </h2>
            <p class="text-center text-base-content/60 mb-4 text-white">Start tracking your expenses today</p>
            @include('partials.error')
            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white ">Name</span></div>
                <input id="name" type="text" placeholder="Your name" class="input input-primary w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white">Email</span></div>
                <input id="email" type="email" placeholder="you@example.com" class="input input-primary w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white">Password</span></div>
                <input id="password" type="password" placeholder="Min 6 characters"
                    class="input input-primary w-full" />
            </label>

            <label class="form-control w-full">
                <div class="label"><span class="label-text text-white">Confirm Password</span></div>
                <input id="password_confirmation" type="password" placeholder="Repeat password"
                    class="input input-primary w-full" />
            </label>

            <button onclick="register()" class="btn btn-primary w-full mt-4">
                Register
            </button>

            <p class="text-center text-white text-sm mt-2">
                Already have an account?
                <a href="/login" class="link link-primary">Login</a>
            </p>

        </div>
    </div>
    @include('partials.scripts')
</body>

</html>
