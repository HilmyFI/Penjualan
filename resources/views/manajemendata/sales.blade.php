@extends('template.table')

@section('judul', 'Sales')

@section('halaman', 'Sales')

<!-- section('isi')
<a href="/sales/create">Tambah Sales</a>
endsection -->

@section('thead')
<tr>
    <th>Kode Sales</th>
    <th>Supplier</th>
    <th>Nama Sales</th>
    <th>Telp</th>
    <th style="column-width: 80px">Aksi</th>
</tr>
@endsection

@section('tbody')
@foreach ($sales as $sales)
<tr>
    <td>{{ $sales->kode_sales }}</td>
    <td>{{ $sales->customer->nama_customer }}</td>
    <td>{{ $sales->nama_sales }}</td>
    <td>{{ $sales->telp_sales }}</td>
    <td class="d-flex justify-content-between">
        <a id="details" data-toggle="modal" data-target="#modal" data-id="{{ $sales->id }}" data-cus="{{ $sales->customer->nama_customer }}">
            <i style="cursor: pointer;" class="fas fa-info-circle">
                <span></span>
            </i>
        </a>
        <a id="edit" data-toggle="modal" data-target="#modal" data-id="{{ $sales->id }}" data-cus="{{ $sales->customer->nama_customer }}">
            <i style="cursor: pointer;" class="fas fa-edit">
                <span></span>
            </i>
        </a>
        <a id="delete" data-toggle="modal" data-target="#modal" data-id="{{ $sales->id }}">
            <i style="cursor: pointer;" class="fas fa-trash">
                <span></span>
            </i>
        </a>
    </td>
</tr>
@endforeach


<script>
    $("a").click(function() {
        var id = $(this).attr("id");
        // console.log(id);
        var cus = $(this).data('cus')
        var ini = $(this).data("id");
        console.log(cus);
        $.get("/sales/" + ini, function(datanya) {
            console.log(datanya);
            if (datanya.length == 2) {
                var kecil = datanya[0].id
                var gede = datanya[1].id
                if (ini == kecil) {
                    var index = 0
                } else if (ini == gede) {
                    index = 1
                }
            } else {
                index = 0
            }
            var cus_id = datanya[index].customer_id
            // var supson = JSON.parse(sup_id)
            console.log(cus_id.toString())
            if (id == "details") {
                $('#lebarmodal').removeClass('modal-xl');
                $('#footermodal').addClass('modal-footer');
                $('#judulmodal').html(
                    '<i class="fas fa-user-circle mr-4" style="font-size:50px;color:#00BFA6;"></i> ' +
                    '<h5 id = "nama_sales" class = "align-self-center">' + datanya[index].nama_sales + '</h5>'
                );
                $('#bodymodal').html(
                    '<form>' +
                    '<fieldset class="detail-modal" disabled>' +
                    '<div class="form-group">' +
                    '<label for="telp_sales">Telp</label>' +
                    '<input type="number" class="form-control" id="telp_sales" name="telp_sales" placeholder="' + datanya[index].telp_sales + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="email_sales">Email</label>' +
                    '<input type="email" class="form-control" id="email_sales" name="email_sales" placeholder="' + datanya[index].email_sales + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="nama_customer">Supplier</label>' +
                    '<input type="text" class="form-control" id="nama_customer" name="nama_customer" placeholder="' + cus + '">' +
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
                    '<h5 class="align-self-center">Edit Sales ' + datanya[index].nama_sales + '</h5>'
                );
                $('#bodymodal').html(
                    '<form method="POST" action="/sales/' + datanya[index].id + '">' +
                    '@method("patch")' +
                    '@csrf' +
                    '<div class="form-group">' +
                    '<label for="nama_sales">Nama</label>' +
                    '<input type="text" class="form-control" id="nama_sales" name="nama_sales" value="' + datanya[index].nama_sales + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="telp_sales">Telp</label>' +
                    '<input type="number" class="form-control" id="telp_sales" name="telp_sales" value="' + datanya[index].telp_sales + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="email_sales">Email</label>' +
                    '<input type="email" class="form-control" id="email_sales" name="email_sales" value="' + datanya[index].email_sales + '">' +
                    '</div>' +
                    '<div class="form-group">' +
                    '<label for="nama_customer">Supplier</label>' +
                    '<select class="form-control" id="nama_customer"  name="customer_id">' +
                    '<option value="">--- Pilih Supplier ---</option>' +
                    '@foreach ($customers as $customer)' +
                    '<option value="{{$customer->id}}" {{$customer->id == "'+cus_id.toString()+'" ? "selected" : ""}} >{{$customer->nama_customer}}</option>' +
                    '@endforeach' +
                    '</select>' +
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
                    '<h5 class="align-self-center">Hapus Sales</h5>'
                );
                $('#bodymodal').html(
                    '<p>Apakah kamu yakin ingin menghapus Sales ' + datanya[index].nama_sales + ' ?</p>'
                );

                $('#footermodal').html(
                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>' +
                    '<form method="POST" action="/sales/' + datanya[index].id + '">' +
                    '@method("delete")' +
                    '@csrf' +
                    '<button type="submit" class="btn btn-danger">Hapus</button>' +
                    '</form>'
                );
            }
        })
    })
</script>
@endsection



<!-- Tambah -->
@section('tambah')
<a data-toggle="modal" data-target="#modaltambah">
    <i id="tambah" class="fas fa-plus mr-4" style="font-size:30px;color:#00BFA6; cursor: pointer;">
        <span></span>
    </i>
</a>
@endsection

@section('judulTambah')
<h5 class="align-self-center">Tambah Sales</h5>
@endsection

@section('bodyTambah')

<form method="POST" action="/sales">
    @csrf
    <div class="form-group d-inline-flex">
        <i class="fas fa-user-circle mr-4" style="font-size:50px;color:#00BFA6;"></i>
        <input type="file" class="form-control-file align-self-center" id="foto">
    </div>
    <input type="hidden" id="kode_sales" name="kode_sales" placeholder="" value="SAL">
    <div class="form-group">
        <label for="nama_sales">Nama sales</label>
        <input type="text" class="form-control" id="nama_sales" name="nama_sales" placeholder="">
    </div>
    <div class="form-group">
        <label for="telp_sales">Telp</label>
        <input type="number" class="form-control" id="telp_sales" name="telp_sales" placeholder="">
    </div>
    <div class="form-group">
        <label for="email_sales">Email</label>
        <input type="email" class="form-control" id="email_sales" name="email_sales" placeholder="">
    </div>
    <div class="form-group">
        <label for="nama_customer">Supplier</label>
        <select class="form-control" id="nama_customer" name="customer_id">
            <option value="">--- Pilih Supplier ---</option>
            @foreach ($customers as $customer)
            <option value="{{$customer->id}}">{{ $customer->nama_customer }}</option>
            @endforeach
        </select>
    </div>

    @endsection