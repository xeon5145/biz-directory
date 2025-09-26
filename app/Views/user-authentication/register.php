<!-- Header -->
<nav class="sticky absolute top-4 flex flex-row justify-between gap-4 ml-5 mr-5">
    <div class="w-1/3 flex justify-start">
        <p class="text-3xl self-center text-blue-600" title="Biz Grow">BG</p>
    </div>

    <div class="w-1/3 flex justify-center backdrop-blur-xs grayscale bg-slate-400/20 rounded-lg px-4 py-4">
        <p>Navigations</p>
    </div>

    <div class="w-1/3 flex justify-end">
        <a href="<?= base_url() ?>" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Site Home
        </a>
    </div>
</nav>
<!-- Header -->

<!-- Card -->
<div class="flex justify-center w-full mt-40">
    <div class="card flex flex-col border border-gray-200 rounded-lg p-8 w-1/6 h-1/2">
        <h2 class="text-2xl font-bold mb-4">Create Account</h2>
    
        <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                <div class="flex items-center gap-2">
                    <input type="password" name="password" id="password" placeholder="Password" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                    <i id="password-icon" onclick="togglePassword(this , 'password')" class="btn-icon fa-solid fa-eye-slash"></i>
                </div>
            </div>
            <div class="mb-4">
                <label for="confirm-password" class="block text-gray-700 font-bold mb-2">Confirm Password</label>
                <div class="flex items-center gap-2">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                    <i id="confirm-password-icon" onclick="togglePassword(this , 'confirm-password')" class="btn-icon fa-solid fa-eye-slash"></i>
                </div>
            </div>
            <div class="flex justify-center">
                <button type="submit" onClick="createUserAccount()" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Create Account</button>
            </div>
            <div class="mt-4">
                <span class="text-gray-500">Already have an account?</span>
                <a href="<?= base_url('auth') ?>" class="text-blue-600 hover:underline">Login</a>
            </div>
        
    </div>

    <script>
        function createUserAccount() {
            let email = $("#email").val();
            let password = $("#password").val();
            let confirmPassword = $("#confirm-password").val();
            let name = $("#name").val();

            if(password != confirmPassword) {
                slideAlert("error", "Error", "Passwords do not match");
                return;
            }

            if(email.length == 0 || password.length == 0 || confirmPassword.length == 0 || name.length == 0) {
                slideAlert("error", "Error", "All fields are required");
                return;
            }

            $.ajax({
                url: "<?= base_url('/registerAccount') ?>",
                type: "POST",
                data: {
                    email: email,
                    password: password,
                    name: name
                },
                success: function (response) {
                    let data = JSON.parse(response);
                    slideAlert("success", "Success", data.message);
                },
                error: function (response) {
                    slideAlert("error", "Error", "Failed to create account");
                }
            });
        }    </script>
