<!DOCTYPE html>
<html lang="en">
@include('layout.main-head')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                            <h6 class="m-0 font-weight-bold text-primary">Search By..</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_years_only">
                                        <input type="text" class="form-control" id="year_" placeholder="Pilih tahun." required>
                                        <input type="hidden" id="year__" value="{{ date("Y") }}">
                                        <div class="invalid-feedback" id="error-year" style="display: none">
                                            <i>Mohon diisi</i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
                                    <div class="form-line" id="datepicker_months_only">
                                        <input type="text" class="form-control" id="month_" placeholder="Pilih bulan." required>
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
                                        <button class="btn btn-sm btn-primary" style="width: 100%;height: 38px" id="SearchDataMedan"><i class="fas fa-search fa-sm"></i> Search Data</button>
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
                            <h6 class="m-0 font-weight-bold text-primary">Detail Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="page-loader text-center">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden"></span>
                                </div>
                                <p class="text-primary text-loader">Please wait...</p>
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
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
                                        <th><small>Tanggal</small></th>
                                        <th><small>Total</small></th>
                                        <th><small>Amount</small></th>
                                        <th><small>Tax</small></th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    @include('layout.main-footer')
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
            $(".spinner-border").hide();
            $(".text-loader").hide();
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
                bulan = $(this).attr("data-bulan").toLowerCase();
                index = $(this).attr("data-index");
                day = $(this).attr("data-day");
                id = $(this).attr("data-id");
                nop = $(this).attr("data-nop");
                name = $(this).attr("data-name");
                tax = $(this).attr("data-tax");
                address = $(this).attr("data-address");
                status = $(this).attr("data-status");
                information = $(this).attr("data-information");
                console.log(bulan);
                param = id+"|"+nop+"|"+name+"|"+tax+"|"+address+"|"+status+"|"+information
                $.ajax({
                    url : "/SummaryPematangsiantar/"+param,
                    success : function(result) {
                        // console.log(result.datas[0][bulan]['values'][index]);
                        $("#detail-name").html("<small><b>"+result.name+" | "+result.id+ " | "+result.nop+"</b></small>");
                        $("#detail-address").html("<small>"+result.address+"</small>");
                        $("#detail-category").html("<small>"+result.tax+"</small>");
                        table.clear().draw();
                        result.datas.forEach(element => {
                            console.log(element);
                            table.row.add([
                                "<small>"+element[bulan]['values'][index]['day']+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['amt'])+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['amt'])+"</small>",
                                "<small>Rp. " + number_format(result.datas[0][bulan]['values'][index]['tax'])+"</small>",
                            ])
                            table.columns.adjust().draw();
                        });
                    }
                })
            });
            $(document.body).delegate("#perangkat_","change",function(e){
                e.preventDefault();
                var perangkat = $(this).val();
                var year = $("#year_").val();
                var month = $("#month_").val();
                var param = perangkat +"|"+ year +"|"+ month;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $(".table-responsive").hide();
                $(".spinner-border").show();
                $(".text-loader").show();
                if (perangkat !== "default" || perangkat !== null || perangkat != null) {
                    $.ajax({
                        url : "/SearchByPmtPematangsiantar/"+param,
                        success : function (result) {
                            console.log(result);
                            $(".spinner-border").hide();
                            $(".text-loader").hide();
                            $(".table-responsive").show();
                            $.each(result, function(iX, valX){
                                noTmp = no++;
                                $.each(valX.summaries.values, function(i, valZ){
                                    if (valZ.amt === 0 || valZ.amt == 0) {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month.toLowerCase()+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39'")+"' data-id='"+valX.id.$oid+"' style='background-color:red;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    } else if (valZ.amt >= 200000) {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month.toLowerCase()+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:green;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    } else {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month.toLowerCase()+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:orange;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    }
                                });
                                isiBody += "<tr><td><small>"+noTmp+"</small></td><td><small>"+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                                isiSubBody = "";
                            });
                            $.each(result[0].summaries.values, function(i, val){
                                tableHeaders += "<th style='width: 1%;'><small>" + val.day + "</small></th>";
                            });
                            Row = result[0].summaries.values.length + 3;
                            isiHead = "<tr><th colspan='"+Row+"' style='text-align:center'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                            isiTable = "<table class='table table-bordered' id='TableData' width='100%' cellspacing='0'><thead class='table-primary' id='TableDataHeader'>"+isiHead+"</thead><tbody class='table-info'>"+isiBody+"</tbody></table>";
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
                var param = year +"|"+month;
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
                $(".spinner-border").show();
                $(".text-loader").show();
                $("#year_").val("");
                $("#month_").val("");
                $.ajax({
                    url : "/SearchSummaryPematangsiantar/"+param,
                    success : function (result) {
                        $("#perangkat_").val("default").trigger("change");
                        $("#perangkat_").prop("disabled",true);
                        $(".spinner-border").hide();
                        $(".text-loader").hide();
                        $(".table-responsive").show();
                        $("#divSearch").empty();
                        $("#divSearch").append("<center><button class='btn btn-sm btn-primary' style='width: 100%;height: 38px' id='SearchDataMedan'><i class='fas fa-search fa-sm'></i> Search Data</button></center>");
                        $("#year_").prop("disabled",false);
                        $("#month_").prop("disabled",false);
                        $.each(result, function(iX, valX){
                            noTmp = no++;
                            $.each(valX.summaries.values, function(i, valZ){
                                if (valZ.amt === 0 || valZ.amt == 0) {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39'")+"' data-id='"+valX.id.$oid+"' style='background-color:red;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                } else if (valZ.amt >= 200000) {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:green;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                } else {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:orange;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                }
                            });
                            isiBody += "<tr><td><small>"+noTmp+"</small></td><td><small>"+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                            isiSubBody = "";
                        });
                        $.each(result[0].summaries.values, function(i, val){
                            tableHeaders += "<th style='width: 1%;'><small>" + val.day + "</small></th>";
                        });
                        Row = result[0].summaries.values.length + 3;
                        isiHead = "<tr><th colspan='"+Row+"' style='text-align:center'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                        isiTable = "<table class='table table-bordered' id='TableData' width='100%' cellspacing='0'><thead class='table-primary' id='TableDataHeader'>"+isiHead+"</thead><tbody class='table-info'>"+isiBody+"</tbody></table>";
                        $("#TableDataDiv").empty();
                        $("#TableDataDiv").append(isiTable);
                        $("#TableData").DataTable({
                            ordering : false
                        });
                    }
                });
            })
            $(document.body).delegate("#SearchDataMedan","click",function(e){
                e.preventDefault();
                var year = $("#year_").val();
                var month = $("#month_").val().toLowerCase();
                var param = year +"|"+month;
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
                    $(".spinner-border").show();
                    $(".text-loader").show();
                    $.ajax({
                        url : "/SearchSummaryPematangsiantar/"+param,
                        success : function (result) {
                            $("#perangkat_").prop("disabled",false);
                            $(".spinner-border").hide();
                            $(".text-loader").hide();
                            $(".table-responsive").show();
                            $("#divSearch").empty();
                            $("#divSearch").append("<center><button class='btn btn-sm btn-danger' style='width: 100%;height: 38px' id='ResetDataMedan'><i class='fas fa-trash fa-sm'></i> Reset Data</button></center>");
                            $("#year_").prop("disabled",true);
                            $("#month_").prop("disabled",true);
                            $.each(result, function(iX, valX){
                                noTmp = no++;
                                $.each(valX.summaries.values, function(i, valZ){
                                    if (valZ.amt === 0 || valZ.amt == 0) {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39'")+"' data-id='"+valX.id.$oid+"' style='background-color:red;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    } else if (valZ.amt >= 200000) {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:green;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    } else {
                                        isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:orange;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                    }
                                });
                                isiBody += "<tr><td><small>"+noTmp+"</small></td><td><small>"+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                                isiSubBody = "";
                            });
                            $.each(result[0].summaries.values, function(i, val){
                                tableHeaders += "<th style='width: 1%;'><small>" + val.day + "</small></th>";
                            });
                            Row = result[0].summaries.values.length + 3;
                            isiHead = "<tr><th colspan='"+Row+"' style='text-align:center'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                            isiTable = "<table class='table table-bordered' id='TableData' width='100%' cellspacing='0'><thead class='table-primary' id='TableDataHeader'>"+isiHead+"</thead><tbody class='table-info'>"+isiBody+"</tbody></table>";
                            $("#TableDataDiv").empty();
                            $("#TableDataDiv").append(isiTable);
                            $("#TableData").DataTable({
                                ordering : false
                            });
                        }
                    });
                };
            });
            function getStarted () {
                var year = $("#year__").val();
                var month = $("#month__").val().toLowerCase();
                var param = year +"|"+month;
                var no = 1;
                var noTmp = "";
                var tableHeaders = "";
                var isiTable = ""
                var isiHead = "" ;
                var isiBody = "";
                var isiSubBody = "";
                var Row = 0;
                $(".table-responsive").hide();
                $(".spinner-border").show();
                $(".text-loader").show();
                var test = "";
                $.ajax({
                    url : "/SearchSummaryPematangsiantar/"+param,
                    success : function (result) {
                        $(".spinner-border").hide();
                        $(".text-loader").hide();
                        $(".table-responsive").show();
                        $.each(result, function(iX, valX){
                            noTmp = no++;
                            $.each(valX.summaries.values, function(i, valZ){
                                if (valZ.amt === 0 || valZ.amt == 0) {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39'")+"' data-id='"+valX.id.$oid+"' style='background-color:red;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                } else if (valZ.amt >= 200000) {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:green;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                } else {
                                    isiSubBody += "<td id='col-det' data-toggle='modal' data-bulan='"+month+"' data-index='"+i+"' data-nop='"+valX.nop+"' data-day='"+valZ.day+"' data-tax='"+valX.tax_category+"' data-address='"+valX.address+"' data-status='"+valX.status+"' data-information='"+valX.information+"' data-target='#DetailSummary' data-name='"+valX.name.replace("'","&#39")+"' data-id='"+valX.id.$oid+"' style='background-color:orange;color:white;!important;border: 0.001em solid'><small>"+valZ.day+"</small></td>";
                                }
                            });
                            isiBody += "<tr><td><small>"+noTmp+"</small></td><td><small>"+valX.name+"</small></td><td><small>"+valX.perangkat+"</small></td>"+isiSubBody+"</tr>";
                            isiSubBody = "";
                        });
                        $.each(result[0].summaries.values, function(i, val){
                            tableHeaders += "<th style='width: 1%;'><small>" + val.day + "</small></th>";
                        });
                        Row = result[0].summaries.values.length + 3;
                        isiHead = "<tr><th colspan='"+Row+"' style='text-align:center'><small>Data Transaksi Bulan "+result[0].bulan+"</small></th></tr></tr><tr><th style='width: 1%;'><small>No.</small></th><th style='width: 20%;'><small>Wajib Pajak</small><th style='width: 10%;'><small>Perangkat</small></th>"+tableHeaders+"</tr>";
                        isiTable = "<table class='table table-bordered' id='TableData' width='100%' cellspacing='0'><thead class='table-primary' id='TableDataHeader'>"+isiHead+"</thead><tbody class='table-info'>"+isiBody+"</tbody></table>";
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