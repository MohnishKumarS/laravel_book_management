{{--  sweatalert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"
></script>

{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- ALERT MESSAGE --}}
@if (session('status'))
    <script>
        Swal.fire({
            title: "{{ session('title') }}",
            text: "{{ session('text') }}",
            icon: "{{ session('status') }}",
        })
    </script>
@endif
