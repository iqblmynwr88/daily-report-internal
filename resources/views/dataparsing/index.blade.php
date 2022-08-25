<!DOCTYPE html>
<html lang="en">
@include('layout.main-head')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layout.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layout.navbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Search By..</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_years_only">
                                        <input type="text" class="form-control" id="year_" placeholder="Pilih tahun." required autocomplete="off">
                                        <input type="hidden" id="year__" value="{{ date("Y") }}">
                                        <div class="invalid-feedback" id="error-year" style="display: none">
                                            <i>Mohon diisi</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_months_only">
                                        <input type="text" class="form-control" id="month_" placeholder="Pilih bulan." required autocomplete="off">
                                        <input type="hidden" id="month__" value="{{ strtolower(date("M")) }}">
                                        <div class="invalid-feedback" id="error-month" style="display: none">
                                            <i>Mohon diisi</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <select class="select2 form-control" style="width: 100%" id="perangkat_">
                                        <option value="default" selected disabled="disabled">Pilih perangkat</option>
                                        <option value="all">All</option>
                                        {{-- @forEach ($pmt as $perangkat)
                                            <option value="{{ $perangkat['pmt'] }}">{{ ucwords($perangkat['pmt']) }}</option>
                                        @endforEach --}}
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3" id="divSearch">
                                    <center>
                                        <button class="btn btn-sm btn-success" style="width: 100%;height: 38px" id="SearchDataMedan"><i class="fas fa-search fa-sm"></i> Search Data</button>
                                    </center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <hr>
                                </div>
                                <div class='col-sm-6'>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $total_tanggal = date("t");
                    $bulan = strtolower(date("M"));
                    @endphp
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Detail Data</h6>
                        </div>
                        <div class="card-body">
                            {{-- <div class="page-loader text-center" id="spinner-main">
                                <div class="spinner-border text-success" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                <p class="text-success text-loader">Please wait...</p>
                            </div> --}}
                            
                            <div class="table-responsive" id="TableDataDiv">
                                <table class='table table-striped' id='TableData' width='100%' cellspacing='0'>
                                    <thead id='TableDataHeader'>
                                        <tr>
                                            <th><b></b></th>
                                            <th><b>No.</b></th>
                                            <th><b>Merchant</b></th>
                                            <th><b>Open</b></th>
                                            <th><b>Close</b></th>
                                            <th><b>City</b></th>
                                            <th><b>Address</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php 
                                        for ($i= 0; $i < 10; $i++) {
                                            echo "<tr><th><b></b></th><th><b></b></th><th><b></b></th><th><b></b></th><th><b></b></th><th><b></b></th><th><b></b></th></tr>";
                                        }
                                        @endphp
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @include('layout.copyright')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    @include('layout.scrolling')
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalTambahKeterangan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Keterangan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" id="form-edit-merchant">
                            <div id="pesan-sistem-tambah-keterangan">
                                
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Merchant</label>
                                <input type="text" class="form-control" id="edit-merchant-alat" readonly placeholder="Example input placeholder">
                                <input type="hidden" name="" class="form-control" id="edit-id-alat">
                                <input type="hidden" name="" class="form-control" id="edit-merchantId-alat">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Device</label>
                                <input type="text" class="form-control" id="edit-device-alat" readonly placeholder="Example input placeholder">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Keterangan</label>
                                <textarea class="form-control" aria-label="With textarea" id="edit-keterangan-alat"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" id="btn-save-keterangan">Save</button>
                    <button class="btn btn-danger" type="button" id="btn-cancel-keterangan">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @include('layout.main-footer')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.editor.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            let wilayah = '{{ $wilayah }}';
            $(".select2").select2();
            var tr;
            var row;
            function load_data(start, length) {
                $.fn.dataTable.ext.errMode = function ( settings, helpPage, message ) { 
                    let rc = message.split("-")
                    if ($.trim(rc[1]) === "401") {
                        swal({
                            icon: "info",
                            title:'Warning!',
                            text:'Session anda telah habis, Mohon login ulang!',
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            dangerMode  : true,
                        }).then(function() {
                            document.getElementById('logout-form').submit();
                        });
                    } else {
                        swal({
                            icon: "info",
                            title: "Warning!",
                            text: $.trim(rc[1]),
                            closeOnClickOutside: false,
                            closeOnEsc: false,
                            dangerMode  : false,
                        });
                    }
                };
                var dataTable = $("#TableData")
                .DataTable({
                    destroy : true,
                    processing : true,
                    language: {processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-success"></i><span class="sr-only">Loading...</span>'},
                    serverSide : true,
                    ordering : false,
                    retrieve : true,
                    searchDelay: 500,
                    ajax : {
                        url : "/GetAllDataParsing/"+wilayah,
                        data : {start : start, length : length},
                    },
                    responsive: {
                        details: {
                            type: 'column',
                            target: -1
                        }
                    },
                    columnDefs: [
                        {
                            "targets": [0,3,4],
                            "searchable": false
                        },
                        {
                            width: "1%",
                            targets: [3,4]
                        },
                        {
                            width: "30%",
                            targets: [2]
                        },
                        {
                            width: "1%",
                            targets: [0,1]
                        },
                        {
                            className: 'small',
                            targets: "_all"
                        }
                    ],
                    initComplete: function() {
                        $(".dataTables_filter input").off().on("keyup" , function(e){
                            if (e.keyCode === 13) {
                                dataTable.search(this.value).draw();
                            }
                            
                        }).on("input", function(i) {
                            if (this.value === "") {
                                dataTable.search("").draw();
                            }
                        });
                    },
                    order: [
                        [1, "asc"]
                    ],
                    columns: [
                        {
                            className: 'dt-control text-light',
                            orderable: false,
                            data: null,
                            defaultContent: ''
                        },
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'merchant_name',
                            name: 'merchant_name',
                        },
                        {
                            data: 'daily_open',
                            name: 'daily_open'
                        },
                        {
                            data: 'daily_close',
                            name: 'daily_close'
                        },
                        {
                            data: 'city',
                            name: 'city'
                        },
                        {
                            data: 'address',
                            name: 'address'
                        },
                    ],
                });
            }
            load_data();
            // =============================================================
            $(document.body).delegate("#col-detail","click",function(e){
                e.preventDefault();
                console.log($(this).attr("data-id"));
            });

            $(document.body).delegate("#btn-tambah-keterangan","click",function(e){
                e.preventDefault();
                // Form
                console.log($(this).attr("data-merchantName"));
                $("#edit-keterangan-alat").val($(this).attr("data-keterangan"));
                $("#edit-merchant-alat").val($(this).attr("data-merchantName"));
                $("#edit-device-alat").val($(this).attr("data-device"));
                $("#edit-id-alat").val($(this).attr("data-id"));
                $("#edit-merchantId-alat").val($(this).attr("data-merchantId"));
                // Modal show
                $("#ModalTambahKeterangan").modal("show");
            });

            $(document.body).delegate("#btn-save-keterangan","click",function(e){
                e.preventDefault();
                // Param
                id_alat = $("#edit-id-alat").val();
                device = $("#edit-device-alat").val();
                keterangan = $("#edit-keterangan-alat").val();
                merchant_id = $("#edit-merchantId-alat").val();
                param = id_alat +"|"+ merchant_id +"|"+ device +"|"+ keterangan + "|" + wilayah;
                
                // Prepare send data
                $("#btn-save-keterangan").html("Mohon tunggu...");
                $("#btn-save-keterangan").prop("disabled",true);
                // Send to Rest API
                $.ajax({
                    url : "/UpdateKeteranganMerchant/"+param,
                    success : function (result) {
                        $("#btn-save-keterangan").html("Save");
                        $("#btn-save-keterangan").prop("disabled",false);
                        $("#btn-cancel-keterangan").html("Close");
                        $("#pesan-sistem-tambah-keterangan").empty();
                        $("#pesan-sistem-tambah-keterangan").append("<div class='alert alert-success' role='alert'>"+result+"</div>");
                        $("#TableData").DataTable().ajax.reload(function () {
                            if ( row.child.isShown() ) {
                                row.child.hide();
                                tr.removeClass('shown');
                            }
                            else {         
                                if (tr.hasClass('shown')) {
                                    row.child( format(row.data()) ).show();
                                    tr.addClass('shown');                      
                                }
                            }
                        }, false );
                    }
                });
            });

            $(document.body).delegate("#btn-cancel-keterangan","click",function(e){
                e.preventDefault();
                $("#ModalTambahKeterangan").modal("hide");
                $("#btn-cancel-keterangan").html("Cancel");
                $("#pesan-sistem-tambah-keterangan").empty();
            });

            $('#TableData tbody').on('click', 'td.dt-control', function () {
                tr = $(this).closest('tr');
                row = $("#TableData").DataTable().row( tr );
                open = row.child.isShown();
                $("#TableData").DataTable().rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                    if (this.child.isShown()) {
                        this.child.hide();
                        $(this.node()).removeClass('shown');
                    }
                });
                if (!open) {
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });
            
            function format(d) {
                console.log(d.merchant_name);
                // let x = "<table class='table' cellpadding='5' cellspacing='0' border='0' style='padding-left:50px;'>";
                    let body = "";
                    $.each(d.data_perangkat, function(i_,val_) {
                        console.log(d.merchant_name);
                        body += "<tr><td><small>"+val_.devicename+"</small></td><td><small>"+val_.jenis_perangkat+"</small></td><td><small>"+val_.cek+"</small></td><td><small>"+val_.foldernew+"</small></td><td><small>"+val_.sent+"</small></td><td><small>"+val_.sent2+"</small></td><td><small>"+val_.keterangan+"</small></td><td><button class='btn btn-sm btn-danger' id='btn-tambah-keterangan' data-keterangan="+val_.keterangan+" data-device="+val_.devicename+" data-id="+val_.id+" data-merchantId="+d.merchant_id+" data-merchantName="+d.merchant_name.replaceAll(" ", "&#32")+" ><small><i class='fas fa-plus fa-sm'></i></small></button></td></tr>";
                    });
                    let oTable = "<table class='table table-light'><tr><th width='10%'><small><b>Device</b></small></th><th width='10%'><small><b>Jenis Perangkat</b></small></th><th><small><b>Cek</b></small></th><th><small><b>Folder New</b></small></th><th><small><b>File</b></small></th><th><small><b>Sent</b></small></th><th width='30%'><small><b>Keterangan</b></small></th><th width='1%' class='text-center'><small><b>....</b></small></th></tr><tbody>"+body+"</tbody></table>";
                    return (oTable);
            }
            
            function number_format (number, decimals, decPoint, thousandsSep) { 
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
                var n = !isFinite(+number) ? 0 : +number
                var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
                var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
                var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
                var s = ''
                var toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec)
                return '' + (Math.round(n * k) / k)
                .toFixed(prec)
                }
                // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
                if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
                }
                if ((s[1] || '').length < prec) {
                s[1] = s[1] || ''
                s[1] += new Array(prec - s[1].length + 1).join('0')
                }
                return s.join(dec)
            }
        });
    </script>
</body>
</html>