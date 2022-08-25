<!DOCTYPE html>
<html lang="en">
    @include('layout.main-head')
    {{-- <body class="bg-light my-login"> --}}
    <div class="page-loader1 text-center">
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden"></span>
        </div>
        <p class="text-success">Please wait...</p>
    </div>
    <body>
        <div class="container">
            <div class="isi-container">
                <div class="row my-login" style="justify-content: center">
                    <div class="col-lg-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="card o-hidden border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="text-center mt-5 mb-3">
                                        <h1 class="h4 text-gray-900 mb-3">Login Please...</h1>
                                    </div>
                                    <div id="message-login" class="mb-3">
                                        @if (session()->has('message'))
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            <h5 class="alert-heading">Login gagal!</h5>
                                            <small>{{ session('message') }}</small>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                    </div>
                                    <form class="user" action="{{ url('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autofocus autocomplete="off" placeholder="Enter Your Account Here...">
                                            @error('username')
                                            <div class="invalid-feedback ml-3">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-5">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback ml-3">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-success btn-block btn-user" type="submit" onclick="$('.isi-container').hide();$('.page-loader1').show()"><i class="fa fa-sm fa-right-to-bracket"></i> Login!</button>
                                        <hr class="mt-5">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.main-footer');
    <script>
        $(document).ready(function() {
            $(".page-loader1").fadeOut(1000);
            $(".isi-container").fadeIn(1000);
            $("#username").focus();
        });
    </script>
    </body>
</html>