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
                    $total_tanggal = date("t");
                    $bulan = strtolower(date("M"));
                    @endphp
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Detail Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="page-loader text-center" id="spinner-main">
                                <div class="spinner-border text-success" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                <p class="text-success text-loader">Please wait...</p>
                            </div>
                            <div class="table-responsive" id="TableDataDiv">
                                
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
            $("#spinner-main").hide();
            $("#ResetDataMedan").hide();
            $("#perangkat_").prop("disabled",true);
            getStarted();
            var table_data = $("#TableData").DataTable({
                ordering : false
            });
            $(".select2").select2();
            $(function () {
                $("#datepicker_months_only input").datepicker({
                    autoclose: true,
                    container: "#datepicker_months_only",
                    startView: "months",
                    viewMode: "months",
                    minViewMode: "months",
                    format: "M",
                });
                $("#datepicker_years_only input").datepicker({
                    autoclose: true,
                    container: "#datepicker_years_only",
                    startView: "years",
                    viewMode: "years",
                    minViewMode: "years",
                    format: "yyyy",
                });
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
                $("#spinner-edit-merchant").show();
                $("#form-edit-merchant").hide();
                $(this).prop("disabled",true);
                $("#btn-cancel-edit-merchant").prop("disabled",true);
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

                param = id+"|"+nama+"|"+status+"|"+wilayah;
                $.ajax({
                    url : "/EditMerchant/"+param,
                    success : function (result) {
                        getDataAfterEdit();
                        $("#spinner-edit-merchant").hide();
                        $("#form-edit-merchant").show();
                        $("#btn-save-edit-merchant").prop("disabled",false);
                        $("#btn-cancel-edit-merchant").prop("disabled",false);
                        $("#pesan-sistem-edit-merchant").empty();
                        $("#pesan-sistem-edit-merchant").append("<div class='alert alert-success' role='alert'>Status telah disimpan, Terima kasih!</div>");
                    }
                });
            });
            $(document.body).delegate("#btn-cancel-edit-merchant","click",function(e){
                e.preventDefault();
                $("#ModalEditMerchant").modal("hide");
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
            $(document.body).delegate("#perangkat_","change",function(e){
                e.preventDefault();
                $("#perangkat_").val() === "" || $("#perangkat_").val() === null ? perangkat = "all" : perangkat = $("#perangkat_").val();
                $("#year_").val() === "" ? year = $("#year__").val() : year = $("#year_").val();
                $("#month_").val() === "" ? month = $("#month__").val() : month = $("#month_").val();
                var wilayah = $("#wilayah").val();
                var param = perangkat +"|"+ year +"|"+ month +"|"+ wilayah;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $(".table-responsive").hide();
                $("#spinner-main").show();
                
                if (perangkat !== "default" || perangkat !== null || perangkat != null) {
                    $.ajax({
                        url : "/SearchByPmt/"+param,
                        success : function (result) {
                            $("#spinner-main").hide();
                            $(".table-responsive").show();
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
            });
            $(document.body).delegate("#ResetDataMedan","click",function(e){
                e.preventDefault();
                var year = $("#year__").val();
                var month = $("#month__").val().toLowerCase();
                var wilayah = $("#wilayah").val();
                var param = year +"|"+month +"|"+ wilayah;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $("#ResetDataMedan").html("Mohon tunggu...");
                $("#ResetDataMedan").prop("disabled",true);
                $(".table-responsive").hide();
                $("#spinner-main").show();
                
                $("#year_").val("");
                $("#month_").val("");
                $.ajax({
                    url : "/SummaryWilayah/"+param,
                    success : function (result) {
                        $("#perangkat_").val("default").trigger("change");
                        $("#perangkat_").prop("disabled",true);
                        $("#spinner-main").hide();
                        
                        $(".table-responsive").show();
                        $("#divSearch").empty();
                        $("#divSearch").append("<center><button class='btn btn-sm btn-success' style='width: 100%;height: 38px' id='SearchDataMedan'><i class='fas fa-search fa-sm'></i> Search Data</button></center>");
                        $("#year_").prop("disabled",false);
                        $("#month_").prop("disabled",false);
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
                                    isiSubBody += "<td id='col-det' data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-success'><small>"+valZ.day+"</small></td>";
                                } else {
                                    isiSubBody += "<td id='col-det' data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-warning'><small>"+valZ.day+"</small></td>";
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
            });
            $(document.body).delegate("#SearchDataMedan","click",function(e){
                e.preventDefault();
                var year = $("#year_").val();
                var month = $("#month_").val().toLowerCase();
                var wilayah = $("#wilayah").val();
                var param = year +"|"+month+"|"+wilayah;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $("#year_").removeClass("is-invalid");
                $("#error-year").hide();
                $("#month_").removeClass("is-invalid");
                $("#error-month").hide();
                if (year === "" && month !== "") {
                    $("#year_").addClass("is-invalid");
                    $("#month_").addClass("is-valid");
                    $("#error-year").show();
                } else if (month === "" && year !== "") {
                    $("#month_").addClass("is-invalid");
                    $("#year_").addClass("is-valid");
                    $("#error-month").show();
                } else if (year === "" && month === "") {
                    $("#year_").addClass("is-invalid");
                    $("#error-year").show();
                    $("#month_").addClass("is-invalid");
                    $("#error-month").show();
                } else if (year !== "" && month !== "") {
                    $("#SearchDataMedan").html("Mohon tunggu...");
                    $("#SearchDataMedan").prop("disabled",true);
                    $(".table-responsive").hide();
                    $("#spinner-main").show();
                    
                    $.ajax({
                        url : "/SummaryWilayah/"+param,
                        success : function (result) {
                            $("#perangkat_").prop("disabled",false);
                            $("#spinner-main").hide();
                            
                            $(".table-responsive").show();
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-danger' style='width: 100%;height: 38px' id='ResetDataMedan'><i class='fas fa-trash fa-sm'></i> Reset Data</button></center>");
                            $("#year_").prop("disabled",true);
                            $("#month_").prop("disabled",true);
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
                                        isiSubBody += "<td id='col-det' data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-success'><small>"+valZ.day+"</small></td>";
                                    } else {
                                        isiSubBody += "<td id='col-det' data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-warning'><small>"+valZ.day+"</small></td>";
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
                };
            });
            $(document.body).delegate("#btn-refresh","click",function(e){
                e.preventDefault();
                $("#TableData").DataTable().ajax.reload(null, false);
            });
            function getStarted () {
                var wilayah = $("#wilayah").val();
                var year = $("#year__").val();
                var month = $("#month__").val().toLowerCase();
                var param = year +"|"+month+"|"+wilayah;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $(".table-responsive").hide();
                $("#spinner-main").show();
                
                var test = "";
                $.ajax({
                    url : "/SummaryWilayah/"+param,
                    success : function (result) {
                        $("#spinner-main").hide();
                        
                        $(".table-responsive").show();
                        console.log(result);
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
                                    isiSubBody += "<td id='col-det'  data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-success'><small>"+valZ.day+"</small></td>";
                                } else {
                                    isiSubBody += "<td id='col-det'  data-bulan='"+month+"' data-tahun='"+valX.tahun+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='color:white;!important;border: 0.001em solid' class='bg-warning'><small>"+valZ.day+"</small></td>";
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
                        isiHead = "<tr><th colspan='3' class='table-light'><button class='btn btn-sm btn-outline-success mr-1' id='btn-refresh'><i class='fas fa-refresh fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Refresh Data.'></i></button><Button class='btn btn-sm btn-outline-success' id='btn-generate-excel'><i class='fas fa-download fa-sm' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-custom-class='custom-tooltip' title='Detail data merchant?'></i></Button></th><th colspan='"+Row+"' style='text-align:center' class='table-light'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                        isiTable = "<table class='table table-bordered table-striped' id='TableData' width='100%' cellspacing='0'><thead id='TableDataHeader'>"+isiHead+"</thead><tbody>"+isiBody+"</tbody></table>";
                        $("#TableDataDiv").empty();
                        $("#TableDataDiv").append(isiTable);
                        $("#TableData").DataTable({
                            ordering : false
                        });
                    }
                });
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