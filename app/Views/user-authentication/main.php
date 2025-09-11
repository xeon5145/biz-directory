<!-- Header -->
<nav class="sticky absolute top-4 flex flex-row justify-between gap-4 ml-5 mr-5">
    <div class="w-1/3 flex justify-start">
        <p class="text-3xl self-center" title="Biz Dir">BD</p>
    </div>

    <div class="w-1/3 flex justify-center backdrop-blur-xs grayscale bg-slate-400/20 rounded-lg px-4 py-4">
        <p>Navigations</p>
    </div>

    <div class="w-1/3 flex justify-end">
        <a href="/" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Site Home
        </a>
    </div>
</nav>
<!-- Header -->

<!-- Main Page -->
<div class="flex min-h-screen item-center justify-center w-full">
    <div class="flex justify-center">
       <!-- Card -->
       <div class="card_frame border border-gray-200 rounded-lg p-4 h-1/3 w-1/3 self-center">
           <p>Login</p>
           <label for="username">Username</label>
           <input type="text" name="username" id="username" placeholder="Username">
           <label for="password">Password</label>
           <input type="password" name="password" id="password" placeholder="Password">
           <button class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" type="submit" onclick="login(this)">Login</button><br>

           <span>Don't have an account?</span> <a href="/register">Register</a>
       </div>
       <!-- Card -->
    </div>
</div>
<!-- Main Page -->

<!-- Footer -->
<footer class="text-center px-2">
    <p>
        &copy; 2025 <a href="#" target="_blank" rel="noopener noreferrer" class="text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline">Almighty</a>. All rights reserved.
    </p>
</footer>
<!-- Footer -->

<script>

    function login(element) {
        $(element).html(spinner);
        // let key = '<?= getenv('FRONT_KEY') ?>';
        let username = $('#username').val();
        let password = $('#password').val();

        $.ajax({
            url: '/login',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function (response) {
                console.log(response);

                $(element).html('Login');
                if (response == 'false') {
                    alert('Invalid credentials');
                } else {
                    redirect('/dashboard');
                }
            }
        });
    }
</script>