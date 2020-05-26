@extends('template.table')

@section('judul', 'Penawaran Harga')

@section('halaman', 'Penawaran Harga')

@section('thead')
<tr>
    <th>Kode Penawaran</th>
    <th>Supplier</th>
    <th>Tanggal</th>
    <th>Total</th>
    <th style="column-width: 80px">Aksi</th>
</tr>
@endsection

@section('tbody')
@foreach ($penawarans as $penawaran)
<tr>
    <td>{{ $penawaran->kode_penawaran }}</td>
    <td>{{ $penawaran->customer->nama_customer }}</td>
    <td>{{ $penawaran->tanggal }}</td>
    <td>{{ $penawaran->total_harga }}</td>
    <td class="d-flex justify-content-between">
        <a id="details" href="/penawarans/create">
            <i style="cursor: pointer; " class="fas fa-info-circle">
                <span></span>
            </i>
        </a>
        <a id="edit" href="/penawarans/{{$penawaran->id}}/edit">
            <i style="cursor: pointer;" class="fas fa-edit">
                <span></span>
            </i>
        </a>
        <a id="delete" data-toggle="modal" data-target="#delete-{{$penawaran->id }}">
            <i style="cursor: pointer;" class="fas fa-trash">
                <span></span>
            </i>
        </a>
    </td>
</tr>

@php
$delete = "delete-".$penawaran->id
@endphp

<x-modal :id="$delete">
    <x-slot name="title">
        <h5 class="align-self-center">Hapus penawaran {{$penawaran->kode_penawaran}}</h5>
    </x-slot>
    <x-slot name="body">
        <x-penawaran-delete :id="$penawaran->id" />
    </x-slot>
</x-modal>

@endforeach
@endsection

@section('tambah')
<a href="/penawarans/create">
    <i class="fas fa-plus mr-4" style="font-size:30px;color:#00BFA6; cursor: pointer;">
        <span></span>
    </i>
</a>
@endsection