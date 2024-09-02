@extends('admin')
@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Transaksi') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sales.store')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <h4>{{ __('Transaksi PerKg') }}</h4>
                                    <div class="form-group">
                                        <label for="product_kg_id">Produk PerKg</label>
                                        <select name="product_kg_id[]" class="form-control">
                                            <option value="">Pilih Product</option>
                                            @foreach($productKg as $salesItem)
                                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty_kg">Berapa Kg?</label>
                                        <input type="text" name="qty_kg[]" class="form-control" placeholder="Masukan jumlah Kg yang dibeli">
                                    </div>
                                    <div id="additional_kg_products"></div>
                                    <button type="button" onclick="addKgProduct()" class="btn btn-secondary">Tambah Produk PerKg</button>
                                </div>

                                <div class="col-6">
                                    <h4>{{ __('Transaksi PerTabung') }}</h4>
                                    <div class="form-group">
                                        <label for="product_tabung_id">Produk PerTabung</label>
                                        <select name="product_tabung_id[]" class="form-control">
                                            <option value="">Pilih Product</option>
                                            @foreach($productTabung as $salesItem)
                                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty_tabung">Berapa Tabung?</label>
                                        <input type="text" name="qty_tabung[]" class="form-control" placeholder="Masukan jumlah Tabung yang dibeli">
                                    </div>
                                    <div id="additional_tabung_products"></div>
                                    <button type="button" onclick="addTabungProduct()" class="btn btn-secondary">Tambah Produk PerTabung</button>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="sale_date">Tanggal Transaksi</label>
                                <input type="date" name="sale_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="status_payment">Status Payment</label><br>
                                <input type="radio" name="status_payment" value="Lunas"> Lunas<br>
                                <input type="radio" name="status_payment" value="Belum Lunas"> Belum Lunas
                            </div>

                            <div class="form-group">
                                <label for="cust_nama">Nama Customer</label>
                                <input type="text" id="customer_input" class="form-control" name="cust_nama" placeholder="Masukkan nama customer baru" style="display: block;">
                                <select name="cust_id" id="cust_id" class="form-control" style="display: none;">
                                    <option value="">Pilih customer lama</option>
                                    <!-- Tambahkan opsi customer lama di sini -->
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->nama_customer }}</option>
                                    @endforeach
                                </select>
                                <div class="form-check">
                                    <input type="radio" name="customer_type" id="new_customer" class="form-check-input" onclick="toggleCustomerInput()" checked value="new_customer">
                                    <label for="new_customer" class="form-check-label">Customer Baru</label>
                                </div>

                                <div class="form-check">
                                    <input type="radio" name="customer_type" id="existing_customer" class="form-check-input" onclick="toggleCustomerInput()" value="existing_customer">
                                    <label for="existing_customer" class="form-check-label">Customer Lama</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(session('invoices'))
    <!-- Trigger Modal jika ada session 'invoices' -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalElement = document.getElementById('invoiceModal');
            console.log(modalElement); // Debugging
            if (modalElement) {
                $('#invoiceModal').modal('show');
            } else {
                console.error('Modal element not found');
            }
        });

    </script>

    <!-- Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Detail Transaksi</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('invoices') as $invoice)
                            <tr>
                                <td>{{ $invoice->product->nama_barang }}</td>
                                <td>{{ $invoice->qty }}</td>
                                <td>{{ $invoice->total_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5>Total Bayar: Rp{{ session('invoices')->sum('total_price') }}</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="window.print()">Cetak</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    function toggleCustomerInput() {
        var inputElement = document.getElementById('customer_input');
        var selectElement = document.getElementById('cust_id');
        var newCustomerRadio = document.getElementById('new_customer');

        if (newCustomerRadio.checked) {
            inputElement.style.display = 'block';
            selectElement.style.display = 'none';
        } else {
            inputElement.style.display = 'none';
            selectElement.style.display = 'block';
        }
    }

    // Jalankan fungsi saat halaman dimuat untuk mengatur tampilan awal
    window.onload = function() {
        toggleCustomerInput();
    };

</script>

<script>
    function addKgProduct() {
        const kgProductDiv = document.createElement('div');
        kgProductDiv.classList.add('kg-product', 'mb-3');
        kgProductDiv.innerHTML = `
                <div class="form-group">
                    <label for="product_kg_id">Produk PerKg</label>
                    <select name="product_kg_id[]" class="form-control">
                        <option value="">Pilih Product</option>
                        @foreach($productKg as $salesItem)
                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty_kg">Berapa Kg?</label>
                    <input type="text" name="qty_kg[]" class="form-control" placeholder="Masukan jumlah Kg yang dibeli">
                </div>
                <button type="button" class="btn btn-danger" onclick="removeProduct(this)">Hapus</button>`;
        document.getElementById('additional_kg_products').appendChild(kgProductDiv);
    }

    function addTabungProduct() {
        const tabungProductDiv = document.createElement('div');
        tabungProductDiv.classList.add('tabung-product', 'mb-3');
        tabungProductDiv.innerHTML = `
                <div class="form-group">
                    <label for="product_tabung_id">Produk PerTabung</label>
                    <select name="product_tabung_id[]" class="form-control">
                        <option value="">Pilih Product</option>
                        @foreach($productTabung as $salesItem)
                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="qty_tabung">Berapa Tabung?</label>
                    <input type="text" name="qty_tabung[]" class="form-control" placeholder="Masukan jumlah Tabung yang dibeli">
                </div>
                <button type="button" class="btn btn-danger" onclick="removeProduct(this)">Hapus</button>`;
        document.getElementById('additional_tabung_products').appendChild(tabungProductDiv);
    }

    function removeProduct(button) {
        button.parentElement.remove();
    }

</script>
@endsection
