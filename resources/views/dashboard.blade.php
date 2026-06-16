<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Expense Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="min-h-screen bg-base-200 bg-gray-800">
    <div class="navbar bg-base-100 shadow-md px-6 bg-gray-600">
        <div class="flex-1">
            <span class="text-xl font-bold text-white">
                Expense Tracker
                <span class="text-rotate">
                    <span>
                        <span class="bg-teal-400 text-teal-800 px-2">Organized</span>
                        <span class="bg-violet-400 text-violet-800 px-2">Insightful</span>
                        <span class="bg-blue-400 text-blue-800 px-2">Empowering</span>
                    </span>
                </span>
            </span>
        </div>
        <div class="flex-none">
            <button onclick="logout()" class="btn btn-ghost btn-sm text-white">Logout</button>
        </div>
    </div>

    <div class="max-w-2xl mx-auto p-6 flex flex-col gap-6">
        <div class="stats shadow shadow-white/50 bg-white w-full">
            <div class="stat bg-gray-600">
                <div class="stat-title text-white">
                    Total Spent
                </div>
                <div id="total" class="stat-value text-white">
                    R0.00
                </div>
                <div class="stat-desc text-white">
                    All your recorded expenses
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6">

        {{-- Add expense form --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body bg-gray-600 border border-blue-500 shadow-[0_4px_20px_rgba(59,130,246,0.5)] rounded-xl">
                <h2 class="card-title text-xl">Add Expense</h2>
                @include('partials.error')
                <div class="flex flex-col gap-3">
                    <label class="form-control">
                        <div class="label"><span class="label-text text-white">Title: </span></div>
                        <input id="title" type="text" placeholder="e.g. Groceries" class="input input-bordered" />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text text-white">Amount (R): </span></div>
                        <input id="amount" type="number" placeholder="0.00" class="input input-bordered" />
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text text-white">Category: </span></div>
                        <select id="category" class="select select-bordered">
                            <option disabled selected>Pick one</option>
                            <option>Food</option>
                            <option>Transport</option>
                            <option>Entertainment</option>
                            <option>Shopping</option>
                            <option>Health</option>
                            <option>Other</option>
                        </select>
                    </label>
                    <label class="form-control">
                        <div class="label"><span class="label-text text-white">Date: </span></div>
                        <input id="date" type="date" class="input input-bordered" />
                    </label>
                </div>
                <button onclick="addExpense()" class="btn btn-primary w-full mt-2">Add Expense</button>
            </div>
        </div>

        {{-- Expense list --}}
        <div class="card bg-base-100 shadow">
            <div class="card-body bg-gray-600 border border-blue-500 shadow-[0_4px_20px_rgba(59,130,246,0.5)] rounded-xl">
                <h2 class="card-title text-lg">My Expenses</h2>
                <div id="expense-list" class="flex flex-col gap-2 mt-2">
                    <p class="text-base-content/50 text-sm" id="empty-msg">No expenses yet.</p>
                </div>
            </div>
        </div>

    </div>
    @include('partials.scripts')

    </div>

</body>

</html>
