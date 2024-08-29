@extends('admin')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h3>{{ __('Customer') }}</h3>
                <div class="ml-auto">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addDataCustemer">Tambah Data</button>
                    @include('custemer.create')

                </div>
            </div>
            <div class="card-body">
                <input id="searchInput" type="text" class="form-control mb-3" placeholder="Cari Customer...">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Custemer</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="dataTable">
                        @php
                        $no = 1;
                        @endphp
                        @foreach($custemer as $item)

                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->nama_customer}}</td>
                            <td>{{$item->no_telp}}</td>
                            <td>{{$item->alamat}}</td>
                            <td>
                                <form id="deleteForm{{ $item->id }}" action="{{ route('custemer.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDataCustamer-{{$item->id}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button> |
                                    <button type="button" class="deleteButton btn btn-danger" data-id="{{ $item->id }}" data-toggle="tooltip" title='Delete'>
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @include('custemer.edit')
                        @endforeach
                        <tr id="noDataRow" style="display: none;">
                            <td colspan="7" class="text-center">Data yang Anda cari tidak ada</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.template.sweatalert')
@endsection
