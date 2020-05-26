@extends('template.table')

@section('judul', 'Customer')

@section('halaman', 'Customer')

@section('thead')
<tr>
    <th>Kode Customer</th>
    <th>Nama Customer</th>
    <th>Telp</th>
    <th style="column-width: 80px">Aksi</th>
</tr>
@endsection

@section('tbody')
@foreach ($customers as $customer)
<tr>
    <td>{{ $customer->kode_customer }}</td>
    <td>{{ $customer->nama_customer }}</td>
    <td>{{ $customer->telp_customer }}</td>
    <td class="d-flex justify-content-between">
        <a id="details" data-toggle="modal" data-target="#modal" data-id="{{ $customer->id }}">
            <i onmouseover="tulisan()" style="cursor: pointer;" class="fas fa-info-circle" title="Details">
                <span></span>
            </i>
        </a>
        <a id="edit" data-toggle="modal" data-target="#modal" data-id="{{ $customer->id }}">
            <i onmouseover="tulisan()" style="cursor: pointer;" class="fas fa-edit" title="Edit">
                <span></span>
            </i>
        </a>
        <a id="delete" data-toggle="modal" data-target="#modal" data-id="{{ $customer->id }}">
            <i onmouseover="tulisan()" style="cursor: pointer;" class="fas fa-trash" title="Delete">
                <span></span>
            </i>
        </a>
    </td>
</tr>
@endforeach

<!-- <script>
    $("a").click(function() {
        var ini = $(this).data("id");
        console.log(ini);
        $.get("/customers/"+ini, function(data) {
            // console.log(data);
            $('#nama_customer').html("HELLO HELLO");
        });
    })
</script> -->

<script>
    $("a").click(function() {
        var id = $(this).attr("id");
        console.log(id);
        var ini = $(this).data("id");
        console.log(ini);
        $.get("/customers/" + ini, function(datanya) {
            //     console.log(datanya[0].nama_customer);
            //     $('#nama_customer').html("Customer" + datanya[0].nama_customer);
            // });
            if (id == "details") {
                $('#lebarmodal').removeClass('modal-xl');
                $('#footermodal').addClass('modal-footer');
                $('#judulmodal').html(
                    '<i class="fas fa-user-circle mr-4" style="font-size:50px;color:#00BFA6;"></i> ' +
                    '<h5 id = "nama_customer" class = "align-self-center"> Customer ' + datanya[0].nama_customer + '</h5>'
                );
                $('#bodymodal').html(
                    '<form>' +
                    '<fieldset class="detail-modal" disabled>' +
                    '<div class="form-group">' +
                    '<label for="telp_customer">Telp</label>' +
                    '<input type="number" class="form-control" id="telp_customer" name="telp_customer" placeholder="' + datanya[0].telp_customer + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="email_customer">Email</label>' +
                    '<input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="' + datanya[0].email_customer + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="alamat_customer">Alamat</label>' +
                    '<input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="' + datanya[0].alamat_customer + '">' +
                    '</div>' +
                    '</fieldset>' +
                    '</form>'
                );
                $('#footermodal').html(
                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>'
                );
            } else if (id == "edit") {
                $('#lebarmodal').removeClass('modal-xl');
                $('#footermodal').empty();
                $('#judulmodal').html(
                    '<h5 class="align-self-center">Edit Customer ' + datanya[0].nama_customer + '</h5>'
                );
                $('#bodymodal').html(
                    '<form method="POST" action="/customers/' + datanya[0].id + '">' +
                    '@method("patch")' +
                    '@csrf' +
                    '<div class="form-group">' +
                    '<label for="nama_customer">Nama</label>' +
                    '<input type="text" class="form-control" id="nama_customer" value="' + datanya[0].nama_customer + '" name="nama_customer">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="telp_customer">Telp</label>' +
                    '<input type="number" class="form-control" id="telp_customer" value="' + datanya[0].telp_customer + '" name="telp_customer">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="email_customer">Email</label>' +
                    '<input type="email" class="form-control" id="email_customer" value="' + datanya[0].email_customer + '" name="email_customer">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="alamat_customer">Alamat</label>' +
                    '<input type="text" class="form-control" id="alamat_customer" value="' + datanya[0].alamat_customer + '" name="alamat_customer">' +
                    '</div>' +
                    '<div class="form-group modal-footer">' +
                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>' +
                    '<button type="submit" class="btn btn-primary">Simpan</button>' + 
                    '</div>' +
                    '</form>'
                );
            } else if (id == "delete") {
                $('#lebarmodal').removeClass('modal-xl');
                $('#footermodal').addClass('modal-footer');
                $('#judulmodal').html(
                    '<h5 class="align-self-center">Hapus Customer</h5>'
                );
                $('#bodymodal').html(
                    '<p>Apakah kamu yakin ingin menghapus Customer ' + datanya[0].nama_customer + ' ?</p>'
                );
                $('#footermodal').html(
                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>' +
                    '<form method="POST" action="/customers/' + datanya[0].id + '">' +
                    '@method("delete")' +
                    '@csrf' +
                    '<button type="submit" class="btn btn-danger">Hapus</button>' +
                    '</form>'
                );
            }
        });
    })
</script>
@endsection

<!-- Tambah -->
@section('tambah')
<a data-toggle="modal" data-target="#modaltambah">
    <i id="tambah" onmouseover="tulisan()" class="fas fa-plus mr-4" style="font-size:30px;color:#00BFA6; cursor: pointer;">
        <span></span>
    </i>
</a>
@endsection

@section('judulTambah')
<h5 class="align-self-center">Tambah Customer</h5>
@endsection

@section('bodyTambah')

<form method="POST" action="/customers">
    @csrf
    <div class="form-group d-inline-flex">
        <i class="fas fa-user-circle mr-4" style="font-size:50px;color:#00BFA6;"></i>
        <input type="file" class="form-control-file align-self-center" id="foto">
    </div>
    <input type="hidden" id="kode_customer" name="kode_customer" placeholder="" value="CUS">
    <div class="form-group">
        <label for="nama_customer">Nama Customer</label>
        <input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="">
    </div>
    <div class="form-group">
        <label for="telp_customer">Telp</label>
        <input type="number" class="form-control" id="telp_customer" name="telp_customer" placeholder="">
    </div>
    <div class="form-group">
        <label for="email_customer">Email</label>
        <input type="email" class="form-control" id="email_customer" name="email_customer" placeholder="">
    </div>
    <div class="form-group">
        <label for="alamat_customer">Alamat</label>
        <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="">
    </div>

    @endsection