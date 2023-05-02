<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.js"
    integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/82ef5747eb.js" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<!-- Load jQuery MaskMoney -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script>
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

<!-- datatables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
{{-- <script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/cr-1.6.2/date-1.4.0/fc-4.2.2/fh-3.3.2/sc-2.1.1/datatables.min.js">
</script> --}}
<script
    src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/b-2.3.6/b-colvis-2.3.6/b-html5-2.3.6/b-print-2.3.6/r-2.4.1/datatables.min.js">
</script>

<script>
    $(document).ready(function() {
        $('#my_table').DataTable({
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

        $('#example').DataTable({
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
    });
</script>
