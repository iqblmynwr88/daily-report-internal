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
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                    <!-- DataTales Example -->
                    @php
                    $total_tanggal = date("t");
                    $bulan = strtolower(date("M"));
                    @endphp
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%;"><small>No.</small></th>
                                            <th style="width: 50%;"><small>Wajib Pajak</small></th>
                                            @php
                                            for ($i = 1; $i <= $total_tanggal; $i++) {
                                                echo "<th style='width: 3%;'><small>".$i."</small></th>";
                                            }
                                            @endphp
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th><small>No.</small></th>
                                            <th><small>Wajib Pajak</small></th>
                                            @php
                                            for ($i = 1; $i <= $total_tanggal; $i++) {
                                                echo "<th><small>".$i."</small></th>";
                                            }
                                            @endphp
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $count = 0;
                                        $j = 0;
                                        @endphp
                                        @foreach ($datas as $data)
                                        <tr>
                                            <td><small>{{$count += 1}}</small></td>
                                            <td><small>{{$data['merchant']['name']}}</small></td>
                                            @php
                                            for ($i = 1; $i <= $total_tanggal; $i++) {
                                                if ($data[$bulan]['values'][$j]['amt'] === 0){
                                                    echo "<th data-toggle='modal' data-target='#logoutModal' style='background-color:red;color:white'><small>".$data[$bulan]['values'][$j]['day']."</small></th>";
                                                } else {
                                                    echo "<th data-toggle='modal' data-target='#logoutModal' style='background-color:green;color:white'><small>".$data[$bulan]['values'][$j]['day']."</small></th>";
                                                }
                                                $j++;
                                            }
                                            $j = 0;
                                            @endphp
                                        </tr>
                                        @endforeach
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
</body>
</html>