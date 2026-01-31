const BASE_URL = document
    .querySelector('meta[name="base-url"]')
    .content;

getCountData();

$('#dashboardTable').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: {
        url: BASE_URL + 'dashboard/totalKategori',
        type: 'POST'
    },
    columns: [
        { data: 'no', orderable: false },
        { data: 'kategori', orderable: false },
        { data: 'totalharga', orderable: false },
    ]
});

function getCountData() {

    $.post(BASE_URL + 'dashboard/totalData', $(this).serialize(), function (res) {

        $('#total-kategori').html(res.countKategori);
        $('#total-barang').html(res.countBarang);
    }, 'json');

}