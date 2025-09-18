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

<div class="flex justify-center w-full mt-40">
    <!-- Card -->
    <div class="card flex flex-col border border-gray-200 rounded-lg p-8 w-1/6 h-1/2">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <div class="flex items-center gap-2">
                    <input type="password" name="password" id="password" placeholder="Password" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                    <i id="password-icon" onclick="togglePassword(this , 'password')" class="btn-icon fa-solid fa-eye-slash"></i>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" onclick="login(this)" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Login</button>
                <button onclick="slideAlert('error', 'Title', 'Description')">Alert</button>
            </div>
        
        <div class="mt-4">
            <span class="text-gray-500">Don't have an account?</span> 
            <a href="<?= base_url('register') ?>" class="text-blue-600 hover:underline">Register</a>
        </div>
    </div>
    <!-- Card -->

</div>

<script>
    function login(element) {
        $(element).html(spinner);
        $(element).prop('disabled', true);
        let username = $('#username').val();
        let password = $('#password').val();

        $.ajax({
            url: '<?= base_url('login') ?>',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(response) {
                $(element).html('Login');
                $(element).prop('disabled', false);
                if (response == 'false') {
                    slideAlert('error', 'Invalid credentials', 'Please check your username and password');
                } else {
                    slideAlert('success', 'Login successful');
                    window.location.href = '<?= base_url('dashboard') ?>';
                }
            }
        });
    }
</script>