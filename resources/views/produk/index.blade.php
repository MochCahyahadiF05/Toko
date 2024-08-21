@extends('admin')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header d-flex justify-content-between ">
                <h3>{{ __('Produk') }}</h3>
                <div class="ml-auto">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addDataProduct">Tambah Data</button>
                    @include('produk.create')
                    
                </div>
            </div>
            <div class="card-body">
                <input id="searchInput" type="text" class="form-control mb-3" placeholder="Cari produk...">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Jenis Satuan</th>
                            <th scope="col">Harga Beli</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="dataTable">
                        @php
                        $no = 1;
                        @endphp
                        @foreach($product as $item)

                        <tr>
                            <th scope="row">{{$no++}}</th>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->stok}}</td>
                            <td>{{$item->jenis_satuan}}</td>
                            <td>{{$item->harga_jual}}</td>
                            <td>{{$item->harga_beli}}</td>
                            <td>
                                <form action="{{route('product.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editDataProduct-{{$item->id}}"><i class="fa-solid fa-pen-to-square"></i></button> |
                                    {{-- <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa-solid fa-trash-can"></i></button> --}}
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'> 
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @include('produk.edit')
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
@endsection
