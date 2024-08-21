<div class="modal fade " id="addDataProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('product.store')}}" method="post">
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
                        <input type="text" class="form-control" placeholder="Masukan Nama Barang" name="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" placeholder="Masukan Stok Barang" inputmode="numeric" name="stok">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jenis Satuan</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_satuan">
                            <option>Jenis Satuan</option>
                            {{-- <option>Karung</option> --}}
                            <option value="Kg">Kg</option>
                            <option value="Tabung">Tabung</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="stok">Harga Jual</label>
                        <input type="text" class="form-control" placeholder="Masukan Harga Jual Barang" inputmode="numeric" name="harga_jual">
                    </div>
                    <div class="form-group">
                        <label for="stok">Harga Beli</label>
                        <input type="text" class="form-control" placeholder="Masukan Harga Beli Barang" inputmode="numeric" name="harga_beli">
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
