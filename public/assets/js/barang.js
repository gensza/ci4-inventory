const BASE_URL = document
    .querySelector('meta[name="base-url"]')
    .content;

$('#barangTable').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: BASE_URL + 'barang/list',
        type: 'POST'
    },
    columns: [
        { data: 'no', orderable: false },
        { data: 'nama', orderable: false },
        { data: 'kategori', orderable: false },
        { data: 'harga', orderable: false },
        { data: 'tglPembelian', orderable: false },
        { data: 'action', orderable: false }
    ]
});

function addData() {

    kategoriList();

    $('#addModal').modal('show');
}

function kategoriList(id) {
    $.post(BASE_URL + 'kategori/list', function (res) {

        console.log(id);
        if (id) {
            $('#edit-id-kategori').empty();

            res.forEach(item => {
                let option = `<option value="${item.ID}" ${item.ID == id ? 'selected' : ''}>${item.Nama}</option>`;
                $('#edit-id-kategori').append(option);
            });
        } else {
            $('#add-id-kategori').empty();

            let option = `<option value="" disabled selected>--select kategori--</option>`
            $('#add-id-kategori').append(option);

            res.forEach(item => {
                let option = `<option value="${item.ID}">${item.Nama}</option>`;
                $('#add-id-kategori').append(option);
            });
        }

    }, 'json');
}

$('#addForm').submit(function (e) {
    e.preventDefault();

    $.post(BASE_URL + 'barang/insert', $(this).serialize(), function (res) {

        if (res.status) {
            $('#addModal').modal('hide');
            $('#barangTable').DataTable().ajax.reload(null, false);

            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: res.message
            });
        } else {
            let errors = Object.values(res.message).join('<br>');

            $('#add-alert').html(
                `<div class="alert alert-danger">${errors}</div>`
            );
        }

    }, 'json');
});

$(document).on('click', '.btn-edit', function () {

    datas = {
        id: $(this).data('id')
    };

    $.post(BASE_URL + 'barang/edit', datas, function (res) {

        console.log(res);
        $('#edit-id').val(res.ID);
        $('#edit-nama-barang').val(res.NamaBarang);
        $('#edit-Harga').val(res.Harga);
        $('#edit-date').val(res.TanggalPembelian);

        kategoriList(res.IDKategori);

        $('#editModal').modal('show');

    }, 'json');
});

$('#editForm').submit(function (e) {
    e.preventDefault();

    $.post(BASE_URL + 'barang/update', $(this).serialize(), function (res) {

        if (res) {
            $('#editModal').modal('hide');
            $('#barangTable').DataTable().ajax.reload(null, false);

            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Update data success'
            });
        } else {
            Swal.fire({
                icon: 'failed',
                title: 'Failed!',
                text: 'Update data failed'
            });
        }

    }, 'json');
});

$(document).on('click', '.btn-delete', function () {

    datas = {
        id: $(this).data('id')
    };

    // sweetalert confirm
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.post(BASE_URL + 'barang/delete', datas, function (res) {

                if (res) {
                    $('#barangTable').DataTable().ajax.reload(null, false);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Delete data success'
                    });
                }

            }, 'json');

        }
    })
});