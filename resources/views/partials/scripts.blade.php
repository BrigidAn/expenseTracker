<script>
    function showError(message) {
        const errorBox = document.getElementById('error-box');
        const errorMsg = document.getElementById('error-msg');
        errorMsg.textContent = message;
        errorBox.classList.remove('hidden');
    }

    function showSuccess(message){
        const successBox = document.getElementById('success-box');
        const successMsg = document.getElementById('success-msg');
        successMsg.textContent = message;
        successBox.classList.remove('hidden');
    }

    function hideError() {
        document.getElementById('error-box').classList.add('hidden');
    }

    function getToken() {
        return localStorage.getItem('token');
    }

    function saveToken(token) {
        localStorage.setItem('token', token);
    }

    async function register() {
        hideError();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const password_confirmation = document.getElementById('password_confirmation').value;

        const res = await fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ name, email, password, password_confirmation })
        });

        const data = await res.json();

        if (!res.ok) {
            const firstError = Object.values(data.errors || {})[0]?.[0] || data.message;
            showError(firstError);
            return;
        }

        saveToken(data.token);
        showSuccess('Account created successfully! Redirecting....')
        setTimeout(() => {window.location.href = '/dashboard'}, 3000);
    }

    async function login() {
        hideError();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        const res = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ email, password })
        });

        const data = await res.json();
        if (!res.ok) {
            showError(data.message || 'Login failed');
            return;
        }

        saveToken(data.token);
        showSuccess('LoggedIn successfully! Redirecting....')
        setTimeout(() => {window.location.href = '/dashboard'}, 3000);
    }

    // Expenses

     if (!getToken()) window.location.href = '/login';

        async function loadExpenses() {
            const res = await fetch('/api/expenses', {
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + getToken()
                }
            });

            if (res.status === 401) {
                window.location.href = '/login';
                return;
            }

            const expenses = await res.json();
            renderExpenses(expenses);
        }

        function renderExpenses(expenses) {
            const list = document.getElementById('expense-list');
            const emptyMsg = document.getElementById('empty-msg');
            const totalEl = document.getElementById('total');

            list.innerHTML = '';

            if (expenses.length === 0) {
                list.innerHTML = '<p class="text-base-content/50 text-sm">No expenses yet.</p>';
                totalEl.textContent = 'R 0.00';
                return;
            }

            const total = expenses.reduce((sum, e) => sum + parseFloat(e.amount), 0);
            totalEl.textContent = 'R ' + total.toFixed(2);

            expenses.forEach(e => {
                list.innerHTML += `
                    <div class="flex items-center justify-between bg-base-200 rounded-lg px-4 py-3">
                        <div>
                            <p class="font-medium">${e.title}</p>
                            <p class="text-sm text-base-content/60">${e.category} · ${e.date}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="font-semibold text-primary">R ${parseFloat(e.amount).toFixed(2)}</span>
                            <button onclick="deleteExpense(${e.id})" class="btn btn-ghost btn-xs text-error">✕</button>
                        </div>
                    </div>
                `;
            });
        }

        async function addExpense() {
            hideError();
            const title    = document.getElementById('title').value;
            const amount   = document.getElementById('amount').value;
            const category = document.getElementById('category').value;
            const date     = document.getElementById('date').value;

            const res = await fetch('/api/expenses', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + getToken()
                },
                body: JSON.stringify({ title, amount, category, date })
            });

            const data = await res.json();

            if (!res.ok) {
                const firstError = Object.values(data.errors || {})[0]?.[0] || data.message;
                showError(firstError);
                return;
            }

            // Clear form
            document.getElementById('title').value = '';
            document.getElementById('amount').value = '';
            document.getElementById('category').value = '';
            document.getElementById('date').value = '';

            loadExpenses();
        }

        async function deleteExpense(id) {
            const res = await fetch(`/api/expenses/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + getToken()
                }
            });

            if (res.ok) loadExpenses();
        }

        // async function logout() {
        //     await fetch('/api/logout', {
        //         method: 'POST',
        //         headers: {
        //             'Accept': 'application/json',
        //             'Authorization': 'Bearer ' + getToken()
        //         }
        //     });
        //     localStorage.removeItem('token');
        //     window.location.href = '/login';
        // }

        loadExpenses();

</script>
