


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session()->has('status'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: '{{ session()->get('status') }}',
                icon: 'success',
                timer: 2000,
                confirmButtonText: 'OK'
            });
        </script>
    @endif