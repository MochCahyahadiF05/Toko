<div class="modal fade " id="editDataProduct-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('product.update',$item->id)}}" method="post">
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang" value="{{ old('nama_barang', $item->nama_barang) }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" placeholder="Masukan Stok Barang" inputmode="numeric" name="stok" value="{{ old('stok', $item->stok) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Satuan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_satuan">
                            {{-- <option value="Kg" {{ old('jenis_satuan', $item->jenis_satuan) == 'Kg' ? 'selected' : '' }}>Kg</option>
                            <option value="Tabung" {{ old('jenis_satuan', $item->jenis_satuan) == 'Tabung' ? 'selected' : '' }}>Tabung</option> --}}
                            <option value="Kg" {{ $item->jenis_satuan == 'Kg' ? 'selected' : '' }}>Kg</option>
                            <option value="Tabung" {{ $item->jenis_satuan == 'Tabung' ? 'selected' : '' }}>Tabung</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control" placeholder="Masukan Harga Jual Barang" inputmode="numeric" name="harga_jual" value="{{ old('harga_jual', $item->harga_jual) }}">
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="text" class="form-control" placeholder="Masukan Harga Beli Barang" inputmode="numeric" name="harga_beli" value="{{ old('harga_beli', $item->harga_beli) }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
