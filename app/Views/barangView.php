<?= $this->extend('layouts/app') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="d-flex gap-2 align-items-center mb-2">
    <h3 class="page-title">List Barang</h3>
    <button class="btn btn-success btn-sm" onclick="addData()"><i class="bi bi-plus"></i> Add Data</button>
</div>
<div class="card">
    <div class="card-body">
        <table id="barangTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori Barang</th>
                    <th>Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="addForm">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div id="add-alert"></div>

                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="NamaBarang" id="add-nama-barang" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="IDKategori" id="add-id-kategori" class="form-control" style="width: 100%"></select>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="Harga" id="add-Harga" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Pembelian</label>
                        <input type="date" name="TanggalPembelian" id="add-date" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end add model -->

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editForm">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div id="edit-alert"></div>
                    <input type="hidden" name="id" id="edit-id">

                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="NamaBarang" id="edit-nama-barang" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="IDKategori" id="edit-id-kategori" class="form-control" style="width: 100%"></select>
                    </div>

                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="Harga" id="edit-Harga" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Pembelian</label>
                        <input type="date" name="TanggalPembelian" id="edit-date" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end add model -->

<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/barang.js') ?>"></script>
<?= $this->endSection() ?>