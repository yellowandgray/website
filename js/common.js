function dataTable(id, btn, cols) {
    var myTable =
            $('#' + id)
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
            .DataTable({
                bAutoWidth: false,
                aoColumns: cols,
                aaSorting: [],
                //bProcessing: true,
                //bServerSide: true,
                //sAjaxSource: "http://127.0.0.1/table.php",
                //sScrollY: "200px",
                //bPaginate: false,
                //sScrollX: "100%",
                //sScrollXInner: "120%",
                //bScrollCollapse: true,
                //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
                //you may want to wrap the table inside a "div.dataTables_borderWrap" element
                //iDisplayLength: 50
                select: {
                    style: 'multi'
                }
            });


    $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
    new $.fn.dataTable.Buttons(myTable, {
        buttons: [
            {
                extend: "csv",
                title: id + '_' + $.format.date(new Date(), 'dd-MM-yy-hh:mma'),
                text: "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                className: "btn btn-white btn-primary btn-bold"
            },
            {
                extend: "excelHtml5",
                title: id + '_' + $.format.date(new Date(), 'dd-MM-yy-hh:mma'),
                text: "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                className: "btn btn-white btn-primary btn-bold"
            },
            {
                extend: "pdfHtml5",
                title: id + '_' + $.format.date(new Date(), 'dd-MM-yy-hh:mma'),
                text: "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                className: "btn btn-white btn-primary btn-bold"
            },
            {
                extend: "print",
                text: "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                className: "btn btn-white btn-primary btn-bold",
                autoPrint: false,
                message: 'This print was produced using the Print button for DataTables'
            }
        ]
    });
    $('#' + btn + ' .tableTools-container').empty();
    myTable.buttons().container().appendTo($('#' + btn + ' .tableTools-container'));
}

$(function () {
    $('#product_images').ace_file_input({
        style: 'well',
        btn_choose: 'Drop images here or click to choose',
        btn_change: null,
        no_icon: 'ace-icon fa fa-picture-o',
        droppable: true,
        whitelist_ext: ['jpeg', 'jpg', 'png', 'gif', 'bmp'],
        whitelist_mime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp'],
        thumbnail: 'small'//small | large | fit
                //,icon_remove:null//set null, to hide remove/reset button
                /**,before_change:function(files, dropped) {
                 //Check an example below
                 //or examples/file-upload.html
                 return true;
                 }*/
                /**,before_remove : function() {
                 return true;
                 }*/
        ,
        preview_error: function (filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            //alert(error_code);
        }
    });
    $('.modal.aside').ace_aside();
    $('#product_unit_sizes').addClass('aside').ace_aside({container: '#add_product > .modal-dialog'});
    //$('#aside-inside-modal').addClass('in').removeClass('aside-hidden');
    $('#item_keywords').tagsinput();
});

function bindShowDetailClick() {
    $('.show-details-btn').on('click', function (e) {
        e.preventDefault();
        $(this).closest('tr').next().toggleClass('open');
        $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
    });
}