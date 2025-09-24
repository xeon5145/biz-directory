<nav class="">
    <div class="flex flex-row">

        <!-- Logo -->
        <div class="flex w-1/6 justify-start items-center gap-4">
            <p class="text-3xl self-center" title="Biz Dir">BD</p>
        </div>
        <!-- Logo -->

        <!-- Search and text section -->
        <div class="flex w-3/6 justify-start items-center gap-4">
            <p class="text-3xl self-center" title="Biz Dir"></p>
        </div>
        <!-- Search and text section -->

        <!-- Notifications and user menu section -->
        <div class="flex w-2/6 justify-end items-center gap-4">
            <!-- <i class="fa-solid fa-sun fa-lg btn-icon" id="theme-mode"></i> -->
            <i class="fa-regular fa-bell btn-icon" id="notifications"></i>

            <div class="btn flex flex-row gap-2 dropdown-btn" data-id="userMenu">
                <div class="">
                    <img class="circle-2" src="https://images.unsplash.com/photo-1546443046-ed1ce6ffd1ab?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                </div>
                <div class="flex flex-col">
                    <p class="text-base">Username</p>
                    <p class="text-xs">User Role</p>
                </div>

                <div class="">
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

            </div>

            <!-- Menu -->
            <div id="userMenu" class="dropdown-menu hidden">
                <a class="dropdown-item" href="/">
                    <i class="fa-solid fa-house mr-1"></i>
                     Go Home
                </a>
                <hr class="hr-1 hr-primary">
                <div class="dropdown-item-btn">
                    <button class="btn-icon btn-danger" id="logout-button"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </div>

            </div>
            <!-- Menu -->
        </div>
        <!-- Notifications and user menu section -->

    </div>

</nav>

<script>

</script>