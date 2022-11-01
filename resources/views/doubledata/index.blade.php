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
                                    <select class="select2 form-control" style="width: 100%" id="select_wilayah">
                                        <option value="default" selected disabled="disabled">Pilih Wilayah</option>
                                        <option value="medan" {{ $MDN_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Medan</option>
                                        <option value="batam" {{ $BTM_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Batam</option>
                                        <option value="bengkulu" {{ $BGL_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Bengkulu</option>
                                        <option value="binjai" {{ $BJI_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Binjai</option>
                                        <option value="deliserdang" {{ $DLS_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Deliserdang</option>
                                        <option value="karo" {{ $KRO_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Karo</option>
                                        <option value="pekanbaru" {{ $PKB_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Pekanbaru</option>
                                        <option value="pematangsiantar" {{ $PMT_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Pematangsiantar</option>
                                        <option value="samosir" {{ $SMS_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Samosir</option>
                                        <option value="simalungun" {{ $SML_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Simalungun</option>
                                        <option value="tanjungpinang" {{ $TJP_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Tanjungpinang</option>
                                        <option value="langkat" {{ $LGT_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Langkat</option>
                                        <option value="labuhanbatu" {{ $LBB_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Labuhanbatu</option>
                                        <option value="asahan" {{ $ASA_IS_ACTIVE == 1 ? '' : 'disabled="disabled"' }}>Asahan</option>
                                    </select>
                                    <input type="hidden" id="select_wilayah_" value="">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_years_only">
                                        <input type="text" class="form-control" id="tgl_awal" placeholder="Tanggal Awal." required autocomplete="off">
                                        <input type="hidden" id="tgl_awal_" value="">
                                        <div class="invalid-feedback" id="error-year" style="display: none">
                                            <i>Mohon diisi</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_months_only">
                                        <input type="text" class="form-control" id="tgl_akhir" placeholder="Tanggal Akhir." required autocomplete="off">
                                        <input type="hidden" id="tgl_akhir_" value="">
                                        <div class="invalid-feedback" id="error-month" style="display: none">
                                            <i>Mohon diisi</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3" id="divSearch">
                                    <center>
                                        <button class="btn btn-sm btn-success" style="width: 100%;height: 38px" id="SearchData"><i class="fas fa-search fa-sm"></i> Search Data</button>
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
                            <div class="table-responsive" id="TableDataDiv">
                                <table class="table table-bordered table-striped" id="TableData" width='100%' cellspacing='0'>
                                    
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
    <!-- Logout Detail Summary-->
    <div class="modal fade" id="DetailSummary" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Summary</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                            <div class="card mb-1 py-1 border-left-primary">
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td id="detail-name"></td>
                                        </tr>
                                        <tr>
                                            <td id="detail-address"></td>
                                        </tr>
                                        <tr>
                                            <td id="detail-category"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-primary table-striped" id="dataTableSummary" width="100%" cellspacing="0">
                                    <thead>
                                        <th style='width: 5%;'><small>Tanggal</small></th>
                                        <th style='width: 10%;'><small>Total Amount</small></th>
                                        <th style='width: 10%;'><small>Tax</small></th>
                                        <th style='width: 50%;'><small>Keterangan</small></th>
                                        <th style='width: 1%;'><small>...</small></th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <input type="hidden" name="" id="id-wp">
                            <input type="hidden" name="" id="nama-wp">
                            <input type="hidden" name="" id="tahun-trx">
                            <input type="hidden" name="" id="bulan-trx">
                            <input type="hidden" name="" id="keterangan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="AddKeterangan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Keterangan</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                            <div id="pesan-sistem">
                                
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Wajib Pajak</label>
                                <input type="text" class="form-control" id="nama-wajib-pajak" readonly placeholder="Example input placeholder">
                                <input type="hidden" name="" id="id-wajib-pajak">
                                <input type="hidden" name="" id="tahun-wajib-pajak">
                                <input type="hidden" name="" id="bulan-wajib-pajak">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Keterangan</label>
                                <textarea class="form-control" aria-label="With textarea" id="keterangan-wajib-pajak" required></textarea>
                                <div class="invalid-feedback" id="error-keterangan-wajib-pajak" style="display: none">
                                    <i>Mohon diisi</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" id="btn-save-add-keterangan">Save</button>
                    <button class="btn btn-danger" type="button" id="btn-cancel-add-keterangan">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalEditMerchant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Detail Data Merchant</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="page-loader text-center" id="spinner-edit-merchant">
                            <div class="spinner-border text-success" role="status">
                                <span class="visually-hidden"></span>
                            </div>
                            <p class="text-success text-loader">Please wait...</p>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" id="form-edit-merchant">
                            <div id="pesan-sistem-edit-merchant">
                                
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Wajib Pajak</label>
                                <input type="text" class="form-control" id="edit-nama-wajib-pajak" readonly placeholder="Example input placeholder">
                                <input type="hidden" name="" id="edit-id-wajib-pajak">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Kategori Pajak</label>
                                <input type="text" class="form-control" id="edit-tax-wajib-pajak" readonly placeholder="Example input placeholder">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Alamat</label>
                                <textarea class="form-control" aria-label="With textarea" id="edit-alamat-wajib-pajak" readonly></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="edit-status-aktif-wajib-pajak">
                                    <label class="form-check-label" for="edit-status-aktif-wajib-pajak">Aktif</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="edit-status-tidak-aktif-wajib-pajak" checked>
                                <label class="form-check-label" for="edit-status-tidak-aktif-wajib-pajak">Tidak Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" id="btn-save-edit-merchant">Save</button>
                    <button class="btn btn-danger" type="button" id="btn-cancel-edit-merchant">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    @include('layout.main-footer')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            let tgl_awal = "";
            let tgl_akhir = "";
            load_data();
            $(".select2").select2();
            function load_data(start, length) {
                let param = "1|nothing|nothing|nothing";
                $.fn.dataTable.ext.errMode = 'none';
                $('#TableData').on('error.dt', function(e, settings, techNote, message) {
                    let pesan = message.split("-");
                    swal({
                        icon: "info",
                        title:'Warning!',
                        text: pesan[1],
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        dangerMode  : true,
                    });
                });
                
                var oTable = $("#TableData").DataTable({
                    processing : true,
                    language: {processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-success"></i><span class="sr-only">Loading...</span>'},
                    serverSide : true,
                    ordering : false,
                    retrieve : true,
                    destroy : true,
                    ajax : {
                        url : "/CekDoubleData/"+param,
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
                            "targets": [0,1],
                            "searchable": false
                        },
                        {
                            width: "5%",
                            targets: [2]
                        },
                        {
                            width: "15%",
                            className: 'text-capitalize small',
                            targets: [3,4]
                        },
                        {
                            width: "1%",
                            targets: [0,1,5]
                        },
                        {
                            className: 'small',
                            targets: "_all"
                        }
                    ],
                    initComplete: function() {
                        // Setting Keyword dengan diawali status code untuk menentukan action
                        // 0 Searching by Name
                        // 1 Searching by Tahun Bulan
                        $(".dataTables_filter input").off().on("keyup" , function(e){
                            if (e.keyCode === 13) {
                                let keywords = ['0|'+this.value];
                                oTable.search(keywords).draw();
                            }
                        }).on("input", function(i) {
                            if (this.value === "") {
                                let keywords = ['0|nothing'];
                                oTable.search(keywords).draw();
                            }
                        });

                        $(document.body).delegate("#SearchData","click",function (e) {
                            let keywords = ["1|"+ $("#select_wilayah").val() +"|"+ $("#tgl_awal").val() +"|"+ $("#tgl_akhir").val()];
                            console.log(keywords);
                            oTable.search(keywords).draw();

                            $(".dataTables_filter input").val("");
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-danger' style='width: 100%;height: 38px' id='ResetDataMedan'><i class='fas fa-trash fa-sm'></i> Reset Data</button></center>");
                            $("#tgl_awal").prop("disabled",true);
                            $("#tgl_akhir").prop("disabled",true);
                            $("#select_wilayah").prop("disabled",true);
                        });

                        $(document.body).delegate("#ResetDataMedan","click",function(e){
                            e.preventDefault();
                            $("#tgl_awal").val("");
                            $("#tgl_akhir").val("");
                            $("#select_wilayah").val("");
                            $("#select_wilayah").val("default").trigger("change");
                            $("#tgl_awal").prop("disabled",false);
                            $("#tgl_akhir").prop("disabled",false);
                            $("#select_wilayah").prop("disabled",false);
                            
                            let keywords = ["0|"+ $("#select_wilayah").val() +"|"+ $("#tgl_awal").val() +"|"+ $("#tgl_akhir").val()];
                            oTable.search(keywords).draw();
                            
                            $(".dataTables_filter input").val("");
                            $("#judul-table").html("<b>Data Transaksi Bulan</b>");
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-success' style='width: 100%;height: 38px' id='SearchData'><i class='fas fa-search fa-sm'></i> Search Data</button></center>");
                            
                        });

                        $("#datepicker_years_only input").datepicker({
                            autoclose: true,
                            container: "#datepicker_years_only",
                            startView: "days",
                            viewMode: "days",
                            minViewMode: "days",
                            format: "yyyy-mm-dd",
                        }).on("change", function(e) {
                            tgl_awal = $(this).val();
                            $("#tgl_awal_").val($(this).val());
                        });
                        $("#datepicker_months_only input").datepicker({
                            autoclose: true,
                            container: "#datepicker_months_only",
                            startView: "days",
                            viewMode: "days",
                            minViewMode: "days",
                            format: "yyyy-mm-dd",
                        }).on("change", function(e) {
                            tgl_akhir = $(this).val();
                            $("#tgl_akhir_").val($(this).val());
                        });
                        $(document.body).delegate("#select_wilayah","change",function(e){
                            e.preventDefault();
                            $("#select_wilayah_").val($(this).val());
                        })

                        // $("#datepicker_months_only input").datepicker({
                        //     autoclose: true,
                        //     container: "#datepicker_months_only",
                        //     startView: "months",
                        //     viewMode: "months",
                        //     minViewMode: "months",
                        //     format: "M",
                        // }).on("change", function(e) {
                        //     y = new Date($("#year_").val()).getFullYear(); 
                        //     m = new Date(y+' '+$(this).val()).getMonth();
                        //     var firstDay = new Date(y, m, 1);
                        //     var lastDay = new Date(y, m + 1, 0);
                        //     $("#total_hari").val(lastDay.getDate());
                        //     total_hari = lastDay.getDate();
                        //     total_hari2 = lastDay.getDate();
                        //     // oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });
                        //     oBulan = "";
                        //     console.log("asdasdasds");
                        // });
                        // $("#datepicker_years_only input").datepicker({
                        //     autoclose: true,
                        //     container: "#datepicker_years_only",
                        //     startView: "years",
                        //     viewMode: "years",
                        //     minViewMode: "years",
                        //     format: "yyyy",
                        // }).on("change", function (e) {
                        //     // console.log($(this).val());
                        // });
                        // console.log(oBulan);

                        // y = new Date(year).getFullYear(); 
                        // m = new Date(y+' '+xBulan).getMonth();
                        // var firstDay = new Date(y, m, 1);
                        // var lastDay = new Date(y, m + 1, 0);
                        // oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });

                        $(".dataTables_length").empty();
                        $(".dataTables_length").append("<button class='btn btn-sm btn-success ml-1 mr-1' id='btn-refresh'><i class='fas fa-refresh fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Refresh Data.'></i></button><Button class='btn btn-sm btn-success mr-3' id='btn-generate-excel'><i class='fas fa-download fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Detail data merchant?'></i></Button><small class='text-secondary' id='judul-table'><b>Data Transaksi Bulan</b></small>");

                        

                    },
                    drawCallback: function(setting) {
                        // console.log("Test");
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
                            title: "<small>No.</small>",
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            title: "<small>Tanggal</small>",
                            data: 'tanggal',
                            name: 'tanggal',
                        },
                        {
                            title: "<small>Trx ID</small>",
                            data: 'trxid',
                            name: 'trxid',
                        },
                        {
                            title: "<small>Device ID</small>",
                            data: 'deviceid',
                            name: 'deviceid',
                        },
                        {
                            title: "<small>Count</small>",
                            data: 'count',
                            name: 'count',
                        },
                    ]
                })
            }
        });
    </script>
</body>
</html>