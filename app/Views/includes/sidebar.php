<div id="sidebar" class="sidebar-fixed position-fixed">

    <a href="javascript:void(0)" class="sidebar-close-icon" onclick="closeSidebar()">
        <i class="fa-solid fa-xmark"></i>
    </a>

    <div class="sidebar-content">
        <div class="list-group list-group-flush">
            <a href="#" class="list-group-item list-group-item-action" onclick="toggleCollapse('dashboard')">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </a>
            <div id="dashboard" class="collapse">
                <a href="/dashboard" class="list-group-item list-group-item-action">
                    <i class="fa-solid fa-chart-line"></i> Overview
                </a>
            </div>
        </div>
    </div>

</div>

<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('active');
    }

    function closeSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.classList.remove('active');
    }

    function toggleCollapse(elementId) {
        var element = document.getElementById(elementId);
        element.classList.toggle('show');
    }
</script>
