<nav class="top-navbar">
    <!-- Left -->
    <div class="d-flex align-items-center gap-3">
        <!-- Search -->
        <form class="search-box">
            <i class="bi bi-search"></i>
            <input type="search" placeholder="Search...">
        </form>
    </div>

    <!-- Right -->
    <div class="navbar-right">
        <span class="user-name">Hi, <?= session('user_name') ?></span>
        <a href="/auth/logout" class="btn btn-logout">Logout</a>
    </div>
</nav>