/*
 Template Name: Drixo - Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function() {
    // $('#datatable').DataTable();

    //Buttons examples
    // var table = $('#datatable-buttons').DataTable({
    //     lengthChange: false,
    //     buttons: ['copy', 'excel', 'pdf', 'colvis']
    // });

    // table.buttons().container()
    //     .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    $('.any1transactions thead tr').clone(true).appendTo( '.any1transactions thead' );
    $('.any1transactions thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('.any1transactions').DataTable({
        "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
        "pageLength": 50,
        // stateSave: true,
        "order": [],
        //
        // initComplete: function () {
        //     this.api().columns([1, 3, 4]).every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(this.header()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );
        //
        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );
        //
        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     })
        // },

        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
        ],
        dom: "<'row'<'col-xs-5 mb-3 col-md-12 text-right'B>><'row'<'col-xs-5 col-md-6 col-5'l><'col-sm-12 col-xs-1 col-md-6 col-5'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        // select: {
        //     style: 'multi'
        // },
        orderCellsTop: true,
        // fixedHeader: true

    });

    table.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );



    $('.any1users thead tr').clone(true).appendTo( '.any1users thead' );
    $('.any1users thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table1.column(i).search() !== this.value ) {
                table1
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table1 = $('.any1users').DataTable({
        "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
        "pageLength": 50,
        // stateSave: true,
        "order": [],
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
        ],
        dom: "<'row'<'col-xs-5 mb-3 col-md-12 text-right'B>><'row'<'col-xs-5 col-md-6 col-5'l><'col-sm-12 col-xs-1 col-md-6 col-5'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        // select: {
        //     style: 'os'
        // },
        orderCellsTop: true,
        // fixedHeader: true

    });

    table1.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    $('.any1withdraws thead tr').clone(true).appendTo( '.any1withdraws thead' );
    $('.any1withdraws thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="" />' );

        $( 'input', this ).on( 'keyup change', function () {
            if ( table2.column(i).search() !== this.value ) {
                table2
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table2 = $('.any1withdraws').DataTable({
        "lengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
        "pageLength": 50,
        // stateSave: true,
        "order": [[ 0, "desc" ]],
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csvHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis',
        ],
        dom: "<'row'<'col-xs-5 mb-3 col-md-12 text-right'B>><'row'<'col-xs-5 col-md-6 col-5'l><'col-sm-12 col-xs-1 col-md-6 col-5'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        // select: {
        //     style: 'multi'
        // },
        orderCellsTop: true,
        // fixedHeader: true

    });

    table2.columns().every( function () {
        var that = this;

        $( 'input', this.header() ).on( 'keyup change clear', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

} );
