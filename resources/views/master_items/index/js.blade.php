<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table').DataTable({
            searching: false,
            order: [[0, 'desc']],
        });
        getData()
    });

    $('.btn-get-data').click(function () {
        getData()
    })

    function getData() {

        $('#loading-filter').show();
        var dataTableObj = $('#table').DataTable();

        var filter_kode = $('#filter-kode').val()
        var filter_nama = $('#filter-nama').val()
        var filter_harga_min = $('#filter-harga-min').val()
        var filter_harga_max = $('#filter-harga-max').val()

        dataTableObj.clear().draw();

        $.ajax({
            url: '{{url("master-items/search")}}',
            dataType: 'json',
            data: {
                kode: filter_kode,
                nama: filter_nama,
                hargamin: filter_harga_min,
                hargamax: filter_harga_max
            },
            success: function (results) {

                var data = results.data

                $.each(data, function (index, item) {

                    let row = [];

                    /* ===== FOTO ===== */
                    let foto = item.foto
                        ? `<img src="/storage/items/${item.foto}" width="50">`
                        : '-';

                    /* ===== HITUNG HARGA JUAL ===== */
                    let harga_jual = item.harga_beli + (item.harga_beli * item.laba / 100);
                    harga_jual = Math.round(harga_jual);

                    let action = `
                        <a href="{{url('master-items/view/')}}/${item.kode}" 
                           class="btn btn-primary btn-sm">
                           View
                        </a>`;

                    /* ===== URUTAN KOLOM ===== */
                    row.push(item.kode);        // kode
                    row.push(item.nama);        // nama
                    row.push(item.jenis);       // jenis
                    row.push(item.harga_beli);  // harga beli
                    row.push(harga_jual);       // harga jual
                    row.push(item.supplier);    // supplier
                    row.push(foto);             // foto
                    row.push(action);           // aksi

                    dataTableObj.row.add(row).draw(false);
                });

                $('#loading-filter').hide();
            },
            error: function () {
                alert('Terjadi kesalahan server');
                $('#loading-filter').hide();
            }
        })
    }
</script>