<?= $this->extend('layouts/app') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h3>Dashboard</h3>
<p>Welcome to admin dashboard</p>

<!-- card total kategori -->
<div class="d-flex mb-3 text-center gap-2">
    <div class="card col-2">
        <div class="card-header">
            Total Kategori
        </div>
        <div class="card-body">
            <h3 id="total-kategori">0</h3>
        </div>
    </div>
    <div class="card col-2">
        <div class="card-header">
            Total Barang
        </div>
        <div class="card-body">
            <h3 id="total-barang">0</h3>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="page-title pt-2">Summary Barang</h3>
    </div>
    <div class="card-body">
        <table id="dashboardTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori Barang</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
<?= $this->endSection() ?>