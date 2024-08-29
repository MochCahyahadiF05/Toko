<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Sukses!'
        , text: "{{ session('success') }}"
        , icon: 'success'
        , confirmButtonText: 'Oke'
    });

</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        title: 'Error!'
        , text: "{{ session('error') }}"
        , icon: 'error'
        , confirmButtonText: 'Oke'
    });

</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: 'Error!'
        , html: `
            <center>
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </center>
        `
        , icon: 'error'
        , confirmButtonText: 'Oke'
    });

</script>
@endif

<script>
    document.querySelectorAll('.deleteButton').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah aksi default, jika tombol dalam form

            // Ambil ID form dari atribut data-id tombol
            const formId = event.target.getAttribute('data-id');

            // Tampilkan konfirmasi SweetAlert2
            Swal.fire({
                title: "Apakah Anda yakin?"
                , text: "Data yang dihapus tidak bisa dikembalikan!"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#3085d6"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, submit form untuk menghapus data
                    document.getElementById('deleteForm' + formId).submit();
                }
            });
        });
    });

</script>
