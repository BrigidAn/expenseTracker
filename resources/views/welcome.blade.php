<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen bg-base-200 flex flex-col items-center justify-center">
    <div class="hero min-h-screen bg-gray-900">
        <div class="hero-content text-center">
            <div class="card-body">
                <h1 class="text-5xl font-bold text-primary">Expense Tracker</h1>
                <p class="py-6 text-base-content text-lg text-white">Take Control and Manage your expenses</p>

                <div class="flex gap-4 justify-center">
                    <a href="/register"
                        class="inline-block cursor-pointer rounded-md bg-gray-800 px-4 py-3 text-center text-sm font-semibold uppercase text-white transition duration-200 ease-in-out hover:bg-blue-800">Get
                        Started</a>
                    <a href="/login"
                        class="btn btn-outline-white btn-lg rounded-md text-center text-sm font-semibold uppercase">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
