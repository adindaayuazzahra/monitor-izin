{{-- <script src="{{asset('assets/js/popper.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js"
    integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/82ef5747eb.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"></script>


<!-- Load jQuery MaskMoney -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"></script>
<script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
    $(document).ready(function() {
        $('#alokasi_biaya').maskMoney({
            thousands: '.',
            decimal: ',',
            allowZero: true,
            prefix: 'Rp. ',
            precision: 0
        });
    });
</script>

{{-- sweetalert Notif --}}
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js
" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"></script>
@if (session('message'))
    <script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
        Swal.fire({
            timer: 2000,
            icon: '{{ session('icon') }}',
            title: '{{ session('title') }}',
            text: '{{ session('message') }}',
        });
    </script>
@endif





<!-- datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js" integrity="sha512-a9NgEEK7tsCvABL7KqtUTQjl69z7091EVPpw5KxPlZ93T141ffe1woLtbXTX+r2/8TtTvRX/v4zTL2UlMUPgwg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js" nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
</script>

<script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
    $(document).ready(function() {
        $('.my_table').DataTable({
            // responsive: true,
            dom: '<"row"<"col-sm-12 col-md-6 mt-2"B><"col-sm-12 col-md-6 mt-2"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            // dom: '<"row"<"col-sm-12 col-md-6"B>>' + 
            // '<"row pt-3"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
            // '<"row"<"col-sm-12"tr>>' +
            //     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            // dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ],
            responsive: true,
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "zeroRecords": "Tidak ada data yang sesuai dengan pencarian",
                "paginate": {
                    "previous": '<i class="fa-solid fa-angle-left"></i>',
                    "next": '<i class="fa-solid fa-angle-right"></i>'
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                },
                // "oPaginate": {
                //     "sFirst": '<i class="bi bi-caret-left-fill"></i>',
                //     "sLast": '<i class="bi bi-caret-right-fill"></i>',
                //     "sNext": '<i class="bi bi-caret-right"></i>',
                //     "sPrevious": '<i class="bi bi-caret-left"></i>'
                // },
                // "oAria": {
                //     "sSortAscending": ": activate to sort column ascending",
                //     "sSortDescending": ": activate to sort column descending"
                // }
            }
        });

        $('.example').DataTable({
            pageLength: 5,
            buttons: [
                'pdf', 'print'
            ],
            dom: '<"row"<"col-sm-12 col-md-6 mt-2"B><"col-sm-12 col-md-6 mt-2"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            responsive: true,
            language: {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 - 0 dari 0 data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "zeroRecords": "Tidak ada data yang sesuai dengan pencarian",
                "paginate": {
                    "previous": '<i class="fa-solid fa-angle-left"></i>',
                    "next": '<i class="fa-solid fa-angle-right"></i>'
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                },

            }

        });

        $('.table_1').DataTable({
            pageLength: 5,
            buttons: [
                'pdf', 'print'
            ],
            dom: '<"row"<"col-sm-12 col-md-6 mt-2"B><"col-sm-12 col-md-6 mt-2"f>>' +
                '<"row"<"col-sm-12"tr>>' +
                '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            responsive: true,
            language: {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 - 0 dari 0 data",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "zeroRecords": "Tidak ada data yang sesuai",
                "paginate": {
                    "previous": '<i class="fa-solid fa-angle-left"></i>',
                    "next": '<i class="fa-solid fa-angle-right"></i>'
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom secara ascending",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom secara descending"
                },

            }

        });
    });
</script>

