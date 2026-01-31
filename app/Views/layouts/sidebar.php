<div class="sidebar">
    <div class="sidebar-header">
        <span class="logo">ADMIN PANEL</span>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="/dashboard"
                class="<?= uri_string() == 'dashboard' ? 'active' : '' ?>">
                <i class="bi bi-speedometer"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li>
            <a href="/barang"
                class="<?= uri_string() == 'barang' ? 'active' : '' ?>">
                <i class="bi bi-list"></i>
                <span>Daftar Barang</span>
            </a>
        </li>

    </ul>
</div>