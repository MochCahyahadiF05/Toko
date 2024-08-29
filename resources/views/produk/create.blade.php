<div class="modal fade" id="addDataProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="productForm" action="{{route('product.store')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="namaBarang">Nama Barang</label>
                        <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Masukan Nama Barang" name="nama_barang" value="{{ old('nama_barang') }}">
                        @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukan Stok Barang" inputmode="numeric" name="stok" value="{{ old('stok') }}">
                        @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Satuan</label>
                        <select class="form-control @error('jenis_satuan') is-invalid @enderror" id="exampleFormControlSelect1" name="jenis_satuan">
                            <option value="">Jenis Satuan</option>
                            <option value="Kg" {{ old('jenis_satuan') == 'Kg' ? 'selected' : '' }}>Kg</option>
                            <option value="Tabung" {{ old('jenis_satuan') == 'Tabung' ? 'selected' : '' }}>Tabung</option>
                        </select>
                        @error('jenis_satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" placeholder="Masukan Harga Jual Barang" inputmode="numeric" name="harga_jual" value="{{ old('harga_jual') }}">
                        @error('harga_jual')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" placeholder="Masukan Harga Beli Barang" inputmode="numeric" name="harga_beli" value="{{ old('harga_beli') }}">
                        @error('harga_beli')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <input type="hidden" name="show_modal" value="addDataProduct"> --}}
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveChanges" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
