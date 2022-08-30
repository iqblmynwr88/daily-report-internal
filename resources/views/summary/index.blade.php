<!DOCTYPE html>
<html lang="en">
@include('layout.main-head')
<!-- Custom styles for this page -->
<link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="/js/sweetalert.min.js"></script>
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
                                    <input type="hidden" name="" id="total_hari" value="{{ date("t") }}">
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <select class="select2 form-control" style="width: 100%" id="perangkat_">
                                        <option value="default" selected disabled="disabled">Pilih perangkat</option>
                                        <option value="all">All</option>
                                        @forEach ($pmt as $perangkat)
                                            <option value="{{ $perangkat['pmt'] }}">{{ ucwords($perangkat['pmt']) }}</option>
                                        @endforEach
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
                                <label for="formGroupExampleInput2" class="form-label">Keterangan</label>
                                <textarea class="form-control" aria-label="With textarea" id="edit-keterangan-wajib-pajak"></textarea>
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

    <div class="modal fade" id="ModalDetailTrxNotif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="page-loader text-center" id="spinner-main">
                        <div class="spinner-border text-success" role="status">
                            <span class="visually-hidden"></span>
                        </div>
                        <h5 class="text-success" id="exampleModalLabel">Mohon tunggu, data sedang di proses...</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalDetailTrx" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12" id="form-edit-merchant">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Total Lembar</label>
                                <input type="text" class="form-control" id="total-lembar" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Total Amount</label>
                                <input type="text" class="form-control" id="total-amount" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Total Tax</label>
                                <input type="text" class="form-control" id="total-tax" readonly>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" id="btn-close-detail" data-bs-dismiss="modal"><i class="fa fa-sm fa-close"></i> Close</button>
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
            let total_hari = parseInt($("#total_hari").val())+4;
            let total_hari2 = $("#total_hari").val();
            let oBulan = "";
            $("#ResetDataMedan").hide();
            $("#perangkat_").prop("disabled",true);
            load_data();
            var table_data = $("#TableData").DataTable({
                processing : true,
                language: {processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-success"></i><span class="sr-only">Loading...</span>'},
                serverSide : true,
                ordering : false,
                retrieve : true,
            });
            $(".select2").select2();
            $(function () {
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
                // });
                // $("#datepicker_years_only input").datepicker({
                //     autoclose: true,
                //     container: "#datepicker_years_only",
                //     startView: "years",
                //     viewMode: "years",
                //     minViewMode: "years",
                //     format: "yyyy",
                // }).on("change", function (e) {
                //     console.log($(this).val());
                // });
            });
            var table = $("#dataTableSummary").DataTable({
                    ordering : false,
                    searching : false,
                    paging : false
                });
            $(document.body).delegate("#col-det","click",function(e){
                e.preventDefault();
                year = $("#year__").val();
                bulan = $(this).attr("data-bulan").toLowerCase();
                index = $(this).attr("data-index");
                day = $(this).attr("data-day");
                id = $(this).attr("data-id");
                nop = $(this).attr("data-nop");
                name = $(this).attr("data-name");
                tax = $(this).attr("data-tax");
                address = $(this).attr("data-address");
                status = $(this).attr("data-status");
                wilayah = $("#wilayah").val();
                $("#id-wp").val(id);
                $("#nama-wp").val(name);
                $("#tahun-trx").val($(this).attr("data-tahun"));
                $("#bulan-trx").val(bulan);
                information = $(this).attr("data-information");
                $("#keterangan-wajib-pajak").val("")
                param = id+"|"+year+"|"+wilayah;
                $.ajax({
                    url : "/DetailPertangal/"+param,
                    success : function(result) {
                        $("#DetailSummary").modal("show");
                        $("#detail-name").html("<small><b>"+result.datas[0].merchant.name+" | "+result.datas[0].merchant._id.$oid+ " | "+result.datas[0].merchant.nop+"</b></small>");
                        $("#detail-address").html("<small>"+result.datas[0].merchant.address+"</small>");
                        $("#detail-category").html("<small>"+result.datas[0].merchant.tax_category+"</small>");
                        result.datas[0][bulan].keterangan !== undefined ? $("#keterangan-wajib-pajak").val(result.datas[0][bulan].keterangan) : "";
                        table.clear().draw();
                        result.datas.forEach(element => {
                            table.row.add([
                                "<small>"+element[bulan]['values'][index]['day']+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['amt'])+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['tax'])+"</small>",
                                element[bulan].keterangan != undefined ? "<small>" + result.datas[0][bulan].keterangan +"</small>" : "<small>-</small>",
                                element[bulan].keterangan != undefined ? "<button class='btn btn-sm btn-success' id='btn-tambah-keterangan' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Edit keterangan? click disini.'><i class='fas fa-edit fa-sm'></i></button>" : "<button class='btn btn-sm btn-success' id='btn-tambah-keterangan' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Tambah keterangan? click disini.'><i class='fas fa-plus fa-sm'></i></button>",
                            ])
                            table.columns.adjust().draw();
                        });
                    }
                })
            });
            $(document.body).delegate("#btn-generate-excel","click",function(e){
                e.preventDefault();
                wilayah = $("#wilayah").val();
                $("#perangkat_").val() === "" || $("#perangkat_").val() === null ? perangkat = "all" : perangkat = $("#perangkat_").val();
                $("#year_").val() === "" ? tahun = $("#year__").val() : tahun = $("#year_").val();
                $("#month_").val() === "" ? month = $("#month__").val() : month = $("#month_").val();
                $(this).html("<i class='fa fa-exclamation-triangle fa-sm'></i> Sedang Diproses...");
                $(this).prop("disabled",true);
                param = tahun +"|"+ month + "|" + wilayah + "|" + perangkat;
                $.ajax({
                    url : "/ExportToDoc/"+param,
                    success : function (result) {
                        console.log(result);
                        $("#btn-generate-excel").html("<i class='fas fa-download fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Detail data merchant?'></i> Export Data");
                        $("#btn-generate-excel").prop("disabled",false);
                        swal("", "Export data berhasil", "success",{
                            button: {
                                text: "Terima Kasih!",
                                value: true,
                                visible: true,
                                className: "btn btn-sm btn-success",
                                closeModal: true,
                            }
                        });
                        window.open('../'+result);
                    }
                });
            });
            $(document.body).delegate("#col-detail-merchant","click",function(e){
                e.preventDefault();
                id = $(this).attr("data-id");
                nama = $(this).attr("data-name");
                alamat = $(this).attr("data-address");
                tax = $(this).attr("data-tax");
                status = $(this).attr("data-status");
                information = $(this).attr("data-information");
                $("#spinner-edit-merchant").hide();
                $("#edit-nama-wajib-pajak").val(nama);
                $("#edit-id-wajib-pajak").val(id);
                $("#edit-tax-wajib-pajak").val(tax);
                $("#edit-alamat-wajib-pajak").val(alamat);
                status === "1" ? $("#edit-status-aktif-wajib-pajak").prop("checked","checked") : $("#edit-status-tidak-aktif-wajib-pajak").prop("checked","checked");
                $("#ModalEditMerchant").modal("show");
            });
            $(document.body).delegate("#btn-save-edit-merchant","click",function(e){
                e.preventDefault();
                $(this).prop("disabled",true);
                $(this).html("Mohon tunggu...");
                $("#btn-cancel-edit-merchant").prop("disabled",true);
                tahun = $("#year_").val() === "" ? $("#year__").val() : $("#year_").val();
                bulan = $("#month_").val() === "" ? $("#month__").val().toLowerCase() : $("#month_").val().toLowerCase();
                keterangan = $("#edit-keterangan-wajib-pajak").val();
                wilayah = $("#wilayah").val();
                status = 0;
                
                nama = $("#edit-nama-wajib-pajak").val();
                id = $("#edit-id-wajib-pajak").val();
                if ($("#edit-status-aktif-wajib-pajak").is(":checked")) {
                    status = 1;
                }
                if ($("#edit-status-tidak-aktif-wajib-pajak").is(":checked")) {
                    status = 0;
                }

                param = id+"|"+nama+"|"+tahun+"|"+bulan+"|"+keterangan+"|"+status+"|"+wilayah;
                $.ajax({
                    url : "/EditMerchant/"+param,
                    success : function (result) {
                        $("#btn-save-edit-merchant").prop("disabled",false);
                        $("#btn-save-edit-merchant").html("Save");
                        $("#btn-cancel-edit-merchant").prop("disabled",false);
                        $("#TableData").DataTable().ajax.reload(function () {
                            if ( row.child.isShown() ) {
                                row.child.hide();
                                tr.removeClass('shown');
                            }
                            else {         
                                if (tr.hasClass('shown')) {
                                    row.child(format(row.data())).show();
                                    tr.addClass('shown');                      
                                }
                            }
                        },false);
                        $("#pesan-sistem-edit-merchant").empty();
                        $("#pesan-sistem-edit-merchant").append("<div class='alert alert-success' role='alert'>"+result+"</div>");
                    }
                });
            });
            $(document.body).delegate("#btn-cancel-edit-merchant","click",function(e){
                e.preventDefault();
                $("#ModalEditMerchant").modal("hide");
                $("#pesan-sistem-edit-merchant").empty();
            });
            function getDataAfterEdit() {
                wilayah = $("#wilayah").val();
                $("#perangkat_").val() === "" || $("#perangkat_").val() === null ? perangkat = "all" : perangkat = $("#perangkat_").val();
                $("#year_").val() === "" ? tahun = $("#year__").val() : tahun = $("#year_").val();
                $("#month_").val() === "" ? month = $("#month__").val() : month = $("#month_").val();
                noTmp = "";
                no = 1;
                Row = 0;
                isiBody = "";
                isiHead = "";
                isiSubBody = "";
                isiTable = "";
                tableHeaders = "";
                param = perangkat +"|"+ tahun +"|"+ month +"|"+ wilayah;
                $.ajax({
                    url : "/SearchByPmt/"+param,
                    success : function (result) {
                        $.each(result, function(iX, valX){
                            noTmp = no++;
                            $.each(valX.summaries.values, function(i, valZ){
                                if (valZ.amt === 0 || valZ.amt == 0) {
                                    if (valX.status === 0 || valX.status == 0) {
                                        isiSubBody += "<td id='col-det'  data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-secondary'><small>"+valZ.day+"</small></td>";
                                    } else {
                                        isiSubBody += "<td id='col-det'  data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-danger'><small>"+valZ.day+"</small></td>";
                                    }
                                } else if (valZ.amt >= 200000) {
                                    isiSubBody += "<td id='col-det' data-bulan='"+month.toLowerCase()+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-success'><small>"+valZ.day+"</small></td>";
                                } else {
                                    isiSubBody += "<td id='col-det' data-bulan='"+month.toLowerCase()+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-warning'><small>"+valZ.day+"</small></td>";
                                }
                            });
                            if (valX.status === 0 || valX.status == 0) {
                                isiBody += "<tr><td><small>"+noTmp+"</small></td><td id='col-detail-merchant' data-id='"+valX.id.$oid+"' data-name='"+valX.name.replace("'","&#39")+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"'><small><i class='fa fa-info-circle fa-sm text-danger'></i> "+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                                isiSubBody = "";
                            } else {
                                isiBody += "<tr><td><small>"+noTmp+"</small></td><td id='col-detail-merchant' data-id='"+valX.id.$oid+"' data-name='"+valX.name.replace("'","&#39")+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"'><small><i class='fa fa-info-circle fa-sm text-success'></i> "+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                                isiSubBody = "";
                            }
                        });
                        $.each(result[0].summaries.values, function(i, val){
                            tableHeaders += "<th style='width: 1%;'><small>" + val.day + "</small></th>";
                        });
                        Row = result[0].summaries.values.length;
                        isiHead = "<tr><th colspan='3' class='table-light'><Button class='btn btn-sm btn-success' id='btn-generate-excel'><i class='fas fa-download fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Detail data merchant?'></i> Export Data</Button></th><th colspan='"+Row+"' style='text-align:center' class='table-light'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                        isiTable = "<table class='table table-bordered table-striped' id='TableData' width='100%' cellspacing='0'><thead id='TableDataHeader'>"+isiHead+"</thead><tbody>"+isiBody+"</tbody></table>";
                        $("#TableDataDiv").empty();
                        $("#TableDataDiv").append(isiTable);
                        $("#TableData").DataTable({
                            ordering : false
                        });
                    }
                });
            }
            $(document.body).delegate("#btn-tambah-keterangan","click",function(e){
                e.preventDefault();
                var id = $("#id-wp").val();
                var name = $("#nama-wp").val();
                var tahun = $("#tahun-trx").val();
                var bulan = $("#bulan-trx").val();
                var keterangan = $("#keterangan-wajib-pajak").val();
                $("#DetailSummary").modal("hide");
                $("#AddKeterangan").modal("show");
                $("#nama-wajib-pajak").val(name);
                $("#id-wajib-pajak").val(id);
                $("#tahun-wajib-pajak").val(tahun);
                $("#bulan-wajib-pajak").val(bulan);
                $("#btn-cancel-add-keterangan").attr("data-id",id);
                $("#btn-cancel-add-keterangan").attr("data-tahun",tahun);
                $("#btn-cancel-add-keterangan").attr("data-bulan",bulan);
            });
            $(document.body).delegate("#btn-save-add-keterangan","click",function(e){
                e.preventDefault();
                if ($("#keterangan-wajib-pajak").val() === "") {
                    $("#pesan-sistem").empty();
                    $("#pesan-sistem").append("<div class='alert alert-danger' role='alert'>Keterangan mohon diisi, silahkan ulang kembali</div>");
                } else {
                    var wilayah = $("#wilayah").val();
                    var id = $("#id-wajib-pajak").val();
                    var name = $("#nama-wajib-pajak").val();
                    var tahun = $("#tahun-wajib-pajak").val();
                    var bulan = $("#bulan-wajib-pajak").val();
                    var keterangan = $("#keterangan-wajib-pajak").val();
                    $("#pesan-sistem").empty();
                    $("#pesan-sistem").append("<div class='alert alert-secondary' role='alert'><div class='page-loader text-center'><div class='spinner-border text-secondary' id='spinner-form-keterangan' role='status'><span class='visually-hidden'></span></div><p class='text-secondary text-loader'>Please wait...</p></div></div>");
                    var param = id +"|"+keterangan+"|"+tahun+"|"+bulan+"|"+wilayah;
                    $.ajax({
                        url : "/AddKeterangan/"+param,
                        success : function (result) {
                            $("#pesan-sistem").empty();
                            $("#pesan-sistem").append("<div class='alert alert-success' role='alert'>Keterangan telah disimpan, Terima kasih!</div>");
                            $("#keterangan-wajib-pajak").val(result[0].summaries.keterangan);
                        }
                    });
                }
            });
            $(document.body).delegate("#btn-cancel-add-keterangan","click",function(e){
                e.preventDefault();
                $("#pesan-sistem").empty();
                $("#keterangan-wajib-pajak").val("");
                id = $(this).attr("data-id");
                tahun = $(this).attr("data-tahun");
                bulan = $(this).attr("data-bulan");
                wilayah = $("#wilayah").val();
                param = id+"|"+tahun+"|"+wilayah;
                $.ajax({
                    url : "/DetailPertangal/"+param,
                    success : function(result) {
                        $("#AddKeterangan").modal("hide");
                        $("#DetailSummary").modal("show");
                        $("#detail-name").html("<small><b>"+result.datas[0].merchant.name+" | "+result.datas[0].merchant._id.$oid+ " | "+result.datas[0].merchant.nop+"</b></small>");
                        $("#detail-address").html("<small>"+result.datas[0].merchant.address+"</small>");
                        $("#detail-category").html("<small>"+result.datas[0].merchant.tax_category+"</small>");
                        result.datas[0][bulan].keterangan != undefined ? $("#keterangan-wajib-pajak").val(result.datas[0][bulan].keterangan) : "";
                        table.clear().draw();
                        result.datas.forEach(element => {
                            table.row.add([
                                "<small>"+element[bulan]['values'][index]['day']+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['amt'])+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['tax'])+"</small>",
                                element[bulan].keterangan != undefined ? "<small>" + result.datas[0][bulan].keterangan +"</small>" : "<small>-</small>",
                                element[bulan].keterangan != undefined ? "<button class='btn btn-sm btn-success' id='btn-tambah-keterangan' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Edit keterangan? click disini.'><i class='fas fa-edit fa-sm'></i></button>" : "<button class='btn btn-sm btn-success' id='btn-tambah-keterangan' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Tambah keterangan? click disini.'><i class='fas fa-plus fa-sm'></i></button>",
                            ])
                            table.columns.adjust().draw();
                        });
                    }
                })
            });
            $(document.body).delegate("#btn-refresh","click",function(e){
                e.preventDefault();
                tr = $(this).closest('tr');
                row = $("#TableData").DataTable().row(tr);
                open = row.child.isShown();
                $("#TableData").DataTable().ajax.reload(function () {
                    if ( row.child.isShown() ) {
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {         
                        if (tr.hasClass('shown')) {
                            row.child(format(row.data())).show();
                            tr.addClass('shown');                      
                        }
                    }
                },false);
                $(".dataTables_filter input").val("");
            });
            
            function load_data(start, length) {
                let wilayah = $("#wilayah").val();
                let year = $("#year_").val() === "" ? $("#year__").val() : $("#year_").val();
                let month = $("#month_").val() === "" ? $("#month__").val().toLowerCase() : $("#month_").val().toLowerCase();
                let xBulan = $("#month_").val() === "" ? $("#month__").val() : $("#month_").val();

                let j = 1;
                let param = year +"|"+month+"|"+wilayah;
                let tanggal = 0;
                $.fn.dataTable.ext.errMode = 'none';
                let isiKolom = [
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
                        title: "<small>Merchant</small>",
                        data: 'name',
                        name: 'name',
                    },
                    {
                        title: "<small>Perangkat</small>",
                        data: 'perangkat',
                        name: 'perangkat',
                    },
                    
                ];
                
                for (let i = 0; i < 31; i++) {
                    isiKolom.push({
                        data:'summaries',
                        name:'bebas',
                        title: '<small>'+j+'</small>',
                        className: 'text-center',
                        render:function(data){
                            if (data['data']['values'][i] !== undefined) {
                                tanggal = data['data']['values'][i]['day'];
                                amt = data['data']['values'][i]['amt'];
                                status = data['status'];
                                if (status === "1") {
                                    if (amt === 0) {
                                        return "<i class='fa fa-xmark' class='text-light'></i>";
                                    } else {
                                        return "<i class='fa fa-check' class='text-light'></i>";
                                    }
                                } else {
                                    return "<i class='fa fa-minus' class='text-light'></i>";
                                }
                            } else {
                                // console.log(i);
                            }
                        },
                        createdCell: function (td, cellData, rowData, row, col) {
                            if (status === "1") {
                                if ( amt === 0 ) {
                                    $(td).addClass('bg-danger text-light border border-light text-center');
                                } else if ( amt >= 200000) {
                                    $(td).addClass('bg-success text-light border border-light text-center');
                                } else {
                                    $(td).addClass('bg-warning text-light border border-light text-center');
                                }
                            } else if (status === "0") {
                                $(td).addClass('bg-secondary text-light border border-light text-center');
                            }
                        }
                    });
                    j++;
                }
                var oTable = $("#TableData").DataTable({
                    processing : true,
                    language: {processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-success"></i><span class="sr-only">Loading...</span>'},
                    serverSide : true,
                    ordering : false,
                    retrieve : true,
                    ajax : {
                        url : "/SummaryWilayah/"+param,
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
                            width: "20%",
                            targets: [2]
                        },
                        {
                            width: "10%",
                            className: 'text-capitalize small',
                            targets: [3]
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

                        $(document.body).delegate("#SearchDataMedan","click",function(e){
                            let year = $("#year_").val() === "" ? $("#year__").val() : $("#year_").val();
                            let month = $("#month_").val() === "" ? $("#month__").val().toLowerCase() : $("#month_").val().toLowerCase();
                            let total_hari = parseInt($("#total_hari").val())+4;
                            let keywords = ['1|'+year+'|'+month];
                            y = new Date(year).getFullYear(); 
                            m = new Date(y+' '+month).getMonth();
                            var firstDay = new Date(y, m, 1);
                            var lastDay = new Date(y, m + 1, 0);
                            oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });
                            oTable.search(keywords).draw();
                            $(".dataTables_filter input").val("");
                            $("#judul-table").html("<b>Data Transaksi Bulan "+oBulan+"</b>");
                            $("#perangkat_").prop("disabled",false);
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-danger' style='width: 100%;height: 38px' id='ResetDataMedan'><i class='fas fa-trash fa-sm'></i> Reset Data</button></center>");
                            $("#year_").prop("disabled",true);
                            $("#month_").prop("disabled",true);
                            if (total_hari === 35) {
                                oTable.columns([32,33,34]).visible(true,true);
                            } else if (total_hari === 34) {
                                oTable.columns([33]).visible(true,true);
                                oTable.columns([34]).visible(false,false);
                                oTable.columns([32]).visible(true,true);
                            } else {
                                for (let x = total_hari; x<35; x++) {
                                    oTable.columns(x).visible(false,false);
                                }
                            }
                        });

                        $(document.body).delegate("#ResetDataMedan","click",function(e){
                            e.preventDefault();
                            $("#year_").val("");
                            $("#month_").val("");
                            $("#perangkat_").val("default").trigger("change");
                            $("#perangkat_").prop("disabled",true);
                            $("#year_").prop("disabled",false);
                            $("#month_").prop("disabled",false);
                            
                            let year = $("#year_").val() === "" ? $("#year__").val() : $("#year_").val();
                            let month = $("#month_").val() === "" ? $("#month__").val().toLowerCase() : $("#month_").val().toLowerCase();
                            let total_hari = parseInt($("#total_hari").val())+4;
                            let keywords = ['1|'+year+'|'+month];
                            y = new Date(year).getFullYear(); 
                            m = new Date(y+' '+month).getMonth();
                            var firstDay = new Date(y, m, 1);
                            var lastDay = new Date(y, m + 1, 0);
                            oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });
                            oTable.search(keywords).draw();
                            $(".dataTables_filter input").val("");
                            $("#judul-table").html("<b>Data Transaksi Bulan "+oBulan+"</b>");
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-success' style='width: 100%;height: 38px' id='SearchDataMedan'><i class='fas fa-search fa-sm'></i> Search Data</button></center>");
                            if (total_hari === 35) {
                                oTable.columns([32,33,34]).visible(true,true);
                            } else if (total_hari === 34) {
                                oTable.columns([33]).visible(true,true);
                                oTable.columns([34]).visible(false,false);
                                oTable.columns([32]).visible(true,true);
                            } else {
                                for (let x = total_hari; x<35; x++) {
                                    oTable.columns(x).visible(false,false);
                                }
                            }
                        });

                        $("#datepicker_months_only input").datepicker({
                            autoclose: true,
                            container: "#datepicker_months_only",
                            startView: "months",
                            viewMode: "months",
                            minViewMode: "months",
                            format: "M",
                        }).on("change", function(e) {
                            y = new Date($("#year_").val()).getFullYear(); 
                            m = new Date(y+' '+$(this).val()).getMonth();
                            var firstDay = new Date(y, m, 1);
                            var lastDay = new Date(y, m + 1, 0);
                            $("#total_hari").val(lastDay.getDate());
                            total_hari = lastDay.getDate();
                            total_hari2 = lastDay.getDate();
                            // oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });
                            oBulan = "";
                            // console.log(oBulan);
                        });
                        $("#datepicker_years_only input").datepicker({
                            autoclose: true,
                            container: "#datepicker_years_only",
                            startView: "years",
                            viewMode: "years",
                            minViewMode: "years",
                            format: "yyyy",
                        }).on("change", function (e) {
                            // console.log($(this).val());
                        });
                        console.log(oBulan);

                        y = new Date(year).getFullYear(); 
                        m = new Date(y+' '+xBulan).getMonth();
                        var firstDay = new Date(y, m, 1);
                        var lastDay = new Date(y, m + 1, 0);
                        oBulan = firstDay.toLocaleString('id-ID', { month: 'long' });

                        $(".dataTables_length").empty();
                        $(".dataTables_length").append("<button class='btn btn-sm btn-success ml-1 mr-1' id='btn-refresh'><i class='fas fa-refresh fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Refresh Data.'></i></button><Button class='btn btn-sm btn-success mr-3' id='btn-generate-excel'><i class='fas fa-download fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Detail data merchant?'></i></Button><small class='text-secondary' id='judul-table'><b>Data Transaksi Bulan "+oBulan+"</b></small>");

                        for (let x = total_hari; x<35; x++) {
                            oTable.columns(x).visible(false,false);
                        }

                        $(document.body).delegate("#perangkat_","change",function(e){
                            e.preventDefault();
                            $("#perangkat_").val() === "" || $("#perangkat_").val() === null ? perangkat = "all" : perangkat = $("#perangkat_").val();
                            let year = $("#year_").val() === "" ? $("#year__").val() : $("#year_").val();
                            let month = $("#month_").val() === "" ? $("#month__").val().toLowerCase() : $("#month_").val().toLowerCase();
                            let total_hari = parseInt($("#total_hari").val())+4;
                            let keywords = ['1|'+year+'|'+month+'|'+perangkat];
                            oTable.search(keywords).draw();
                            $(".dataTables_filter input").val("");
                        });

                    },
                    drawCallback: function(setting) {
                        // console.log("Test");
                    },
                    order: [
                        [1, "asc"]
                    ],
                    columns: isiKolom,
                });
            }

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
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
            
            function format(d) {
                let body1 = "";
                let body2 = "";
                let body3 = "";
                let body4 = "";
                let keterangan = "";
                let status = "";
                for (i = 0; i < 11; i++) {
                    body1 += "<tr><td><small>"+d.summaries.data.values[i].day+"</small></td><td><small>"+number_format(d.summaries.data.values[i].amt)+"</small></td><td><small>"+number_format(d.summaries.data.values[i].tax)+"</small></td><td><button class='btn btn-sm btn-secondary' id='btn-view-detail' data-bulan='"+d.bulan+"' data-tahun='"+d.tahun+"' data-id='"+d.id.$oid+"' data-tgl='"+d.summaries.data.values[i].day+"'><i class='fa fa-sm fa-circle-info text-warning'></i> <small>View</small></button></td></tr>";
                }
                for (i = 11; i < 22; i++) {
                    body2 += "<tr><td><small>"+d.summaries.data.values[i].day+"</small></td><td><small>"+number_format(d.summaries.data.values[i].amt)+"</small></td><td><small>"+number_format(d.summaries.data.values[i].tax)+"</small></td><td><button class='btn btn-sm btn-secondary' id='btn-view-detail' data-bulan='"+d.bulan+"' data-tahun='"+d.tahun+"' data-id='"+d.id.$oid+"' data-tgl='"+d.summaries.data.values[i].day+"'><i class='fa fa-sm fa-circle-info text-warning'></i> <small>View</small></button></td></tr>";
                }
                for (i = 22; i < total_hari2; i++) {
                    body3 += "<tr><td><small>"+d.summaries.data.values[i].day+"</small></td><td><small>"+number_format(d.summaries.data.values[i].amt)+"</small></td><td><small>"+number_format(d.summaries.data.values[i].tax)+"</small></td><td><button class='btn btn-sm btn-secondary' id='btn-view-detail' data-bulan='"+d.bulan+"' data-tahun='"+d.tahun+"' data-id='"+d.id.$oid+"' data-tgl='"+d.summaries.data.values[i].day+"'><i class='fa fa-sm fa-circle-info text-warning'></i> <small>View</small></button></td></tr>";
                }
                keterangan = d.summaries.data.keterangan === undefined ? "-" : d.summaries.data.keterangan;
                status = d.summaries.status == "1" ? "Aktif" : "Tidak Aktif";
                // status = d.summaries.status;
                body4 = "<tr><td><small>"+keterangan+"</small></td></tr><tr><td><small><b>Status</b></small></td></tr><tr><td><small>"+status+"</small></td></tr><tr><td><button class='btn btn-sm btn-outline-success' id='btn-edit-data' data-nama='"+d.name+"' data-alamat='"+d.address+"' data-status='"+d.summaries.status+"' data-keterangan='"+keterangan+"' data-kategori='"+d.tax_category+"' data-id='"+d.id.$oid+"'><i class='fa fa-edit'></i> Edit Data</button></td></tr>";
                let oTable1 = "<div class='col-lg-3 col-xl-3 col-md-3 col-sm-3'><table class='table table-light table-striped'><tr><th width='10%'><small><b>Tgl</b></small></th><th width='10%'><small><b>Amount</b></small></th><th><small><b>Tax</b></small></th><th><small><b>Detail</b></small></th></tr><tbody>"+body1+"</tbody></table></div><div class='col-lg-3 col-xl-3 col-md-3 col-sm-3'><table class='table table-light table-striped'><tr><th width='10%'><small><b>Tgl</b></small></th><th width='10%'><small><b>Amount</b></small></th><th><small><b>Tax</b></small></th><th><small><b>Detail</b></small></th></tr><tbody>"+body2+"</tbody></table></div><div class='col-lg-3 col-xl-3 col-md-3 col-sm-3'><table class='table table-light table-striped'><tr><th width='10%'><small><b>Tgl</b></small></th><th width='10%'><small><b>Amount</b></small></th><th><small><b>Tax</b></small></th><th><small><b>Detail</b></small></th></tr><tbody>"+body3+"</tbody></table></div><div class='col-lg-3 col-xl-3 col-md-3 col-sm-3'><table class='table table-light'><tr><th><small><b>Keterangan</b></small></th></tr><tbody>"+body4+"</tbody></table></div>";
                let oTable = "<div class='row bg-light'>"+oTable1+"</div>";
                return (oTable);
            }

            $(document.body).delegate("#btn-edit-data","click",function(e) {
                e.preventDefault(e);
                $("#edit-id-wajib-pajak").val($(this).attr("data-id"));
                $("#edit-nama-wajib-pajak").val($(this).attr("data-nama"));
                $("#edit-tax-wajib-pajak").val($(this).attr("data-kategori"));
                $("#edit-alamat-wajib-pajak").val($(this).attr("data-alamat"));
                $("#edit-keterangan-wajib-pajak").val($(this).attr("data-keterangan"));
                $(this).attr("data-status") === "1" ? $("#edit-status-aktif-wajib-pajak").prop("checked","checked") : $("#edit-status-tidak-aktif-wajib-pajak").prop("checked","checked");
                $("#ModalEditMerchant").modal("show");
            });

            $(document.body).delegate("#btn-view-detail","click",function(e) {
                e.preventDefault();
                let param = $(this).attr("data-id")+'|'+$(this).attr("data-tahun")+'|'+$(this).attr("data-bulan")+'|'+$(this).attr("data-tgl")+'|'+$("#wilayah").val();
                $("#ModalDetailTrxNotif").modal("show");
                $.ajax({
                    url: "/GetDetailTrx/"+param,
                    success: function(result) {
                        let hasil = result.split("|");
                        $("#ModalDetailTrxNotif").modal("hide");
                        $("#ModalDetailTrx").modal("show");
                        console.log(result);
                        $("#total-lembar").val(hasil[0]+" Trx");
                        $("#total-amount").val("Rp "+number_format(hasil[1]));
                        $("#total-tax").val("Rp "+number_format(hasil[2]));
                    }
                });
            });

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