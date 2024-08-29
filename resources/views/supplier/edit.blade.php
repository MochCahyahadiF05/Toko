<div class="modal fade " id="editDataSupplier-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('supplier.update',$item->id)}}" method="post">
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
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Supplier" name="nama_supplier" value="{{ old('nama_supplier', $item->nama_supplier) }}">
                    </div>
                    <div class="form-group">
                        <label for="kontak_supplier">Kontak Supplier</label>
                        <input type="text" class="form-control" placeholder="Masukan Kontak Supplier" name="kontak_supplier" value="{{ old('kontak_supplier', $item->kontak_supplier) }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Alamat</label>
                        <textarea class="form-control" name="alamat" id="" cols="30" rows="3">{{$item->alamat}}</textarea>
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
