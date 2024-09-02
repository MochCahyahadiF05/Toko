@extends('admin')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>{{ __('Transaksi PerKg') }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="Product">Produk</label>
                                    <select name="product_id" id="" class="form-control @error('product_id') is-invalid @enderror">
                                        <option value=""> Pilih Product</option>
                                        @foreach($productKg as $salesItem)
                                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Berapa Kg ?</label>
                                    <input type="text" class="form-control @error('qty') is-invalid @enderror" placeholder="Masukan Jumlah yang dibeli" inputmode="numeric" name="qty" value="{{old('qty')}}">
                                    @error('qty')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Tanggal Transaksi</label>
                                    <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{old('sale_date')}}">
                                    @error('sale_date')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_payment">Status Payment</label><br>
                                    <div class="form-check">
                                        <input type="radio" name="status_payment" id="" value="Lunas" class="form-check-input @error('status_payment') is-invalid @enderror">
                                        <label for="" class="form-check-label">Lunas</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="status_payment" id="" value="Belum Lunas" class="form-check-input @error('status_payment') is-invalid @enderror">
                                        <label for="" class="form-check-label">Belum Lunas</label>
                                    </div>
                                    @error('status_payment')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cust_nama">Nama Customer</label>
                                    
                                    <input type="text" id="customer_input_kg" class="form-control" placeholder="Masukkan nama customer baru">
                                    
                                    <select name="customer_select" id="customer_select_kg" class="form-control" style="display: none;">
                                        <option value="">Pilih customer lama</option>
                                        <!-- Tambahkan opsi customer lama di sini -->
                                    </select>
                                    
                                    <div class="form-check">
                                        <input type="radio" name="customer_type" id="new_customer_kg" class="form-check-input" onclick="toggleCustomerInput('kg')" checked>
                                        <label for="new_customer_kg" class="form-check-label">Customer Baru</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input type="radio" name="customer_type" id="existing_customer_kg" class="form-check-input" onclick="toggleCustomerInput('kg')">
                                        <label for="existing_customer_kg" class="form-check-label">Customer Lama</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>{{ __('Transaksi PerTabung') }}</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="Product">Produk</label>
                                    <select name="product_id" id="" class="form-control @error('product_id') is-invalid @enderror">
                                        <option value=""> Pilih Product</option>
                                        @foreach($productTabung as $salesItem)
                                            <option value="{{$salesItem->id}}">{{$salesItem->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('product_id')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="qty">Berapa Tabung ?</label>
                                    <input type="text" class="form-control @error('qty') is-invalid @enderror" placeholder="Masukan Jumlah yang dibeli" inputmode="numeric" name="qty" value="{{old('qty')}}">
                                    @error('qty')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sale_date">Tanggal Transaksi</label>
                                    <input type="date" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" value="{{old('sale_date')}}">
                                    @error('sale_date')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_payment">Status Payment</label><br>
                                    <div class="form-check">
                                        <input type="radio" name="status_payment" id="" value="Lunas" class="form-check-input @error('status_payment') is-invalid @enderror">
                                        <label for="" class="form-check-label">Lunas</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="status_payment" id="" value="Belum Lunas" class="form-check-input @error('status_payment') is-invalid @enderror">
                                        <label for="" class="form-check-label">Belum Lunas</label>
                                    </div>
                                    @error('status_payment')
                                        <div class="invalid-feedback"> {{$message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cust_nama">Nama Customer</label>
                                    
                                    <input type="text" id="customer_input_tabung" class="form-control" placeholder="Masukkan nama customer baru">
                                    
                                    <select name="customer_select" id="customer_select_tabung" class="form-control" style="display: none;">
                                        <option value="">Pilih customer lama</option>
                                        <!-- Tambahkan opsi customer lama di sini -->
                                    </select>
                                    
                                    <div class="form-check">
                                        <input type="radio" name="customer_type" id="new_customer_tabung" class="form-check-input" onclick="toggleCustomerInput('tabung')" checked>
                                        <label for="new_customer_tabung" class="form-check-label">Customer Baru</label>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input type="radio" name="customer_type" id="existing_customer_tabung" class="form-check-input" onclick="toggleCustomerInput('tabung')">
                                        <label for="existing_customer_tabung" class="form-check-label">Customer Lama</label>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleCustomerInput(type) {
            var inputElement = document.getElementById('customer_input_' + type);
            var selectElement = document.getElementById('customer_select_' + type);
            var newCustomerRadio = document.getElementById('new_customer_' + type);
            
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
            toggleCustomerInput('kg');
            toggleCustomerInput('tabung');
        };
    </script>
@endsection
