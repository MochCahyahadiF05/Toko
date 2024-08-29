<div class="modal fade " id="editDataCustamer-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{route('custemer.update',$item->id)}}" method="post">
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
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama Customer" name="nama_customer" value="{{ old('nama_customer', $item->nama_customer) }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukan No Telepon" inputmode="numeric" name="no_telp" value="{{ old('no_telp', $item->no_telp) }}">
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
