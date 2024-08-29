<div class="modal fade" id="addDataSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="productForm" action="{{route('supplier.store')}}" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="namaBarang">Nama Supplier</label>
                        <input type="text" class="form-control @error('nama_supplier') is-invalid @enderror" placeholder="Masukan Nama Supplier" name="nama_supplier" value="{{ old('nama_supplier') }}">
                        @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kontak_supplier">Kontak Supplier</label>
                        <input type="text" class="form-control @error('kontak_supplier') is-invalid @enderror" placeholder="Masukan Kontak Supplier" name="kontak_supplier" value="{{ old('kontak_supplier') }}">
                        @error('kontak_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="" cols="30" rows="3"></textarea>
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveChanges" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
