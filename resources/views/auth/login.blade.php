<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SISFOPERS SATSIBER TNI</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .login-bg {
            background: url('{{ asset('assets/img/bg-login.png') }}') no-repeat center center;
            background-size: cover;
            min-height: 100vh;
        }
    </style>
</head>
<body class="login-bg">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">SISFOPERS SATSIBER TNI</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Session Status -->
                                    @if (session('status'))
                                        <div class="alert alert-success mb-4">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- NRP -->
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" id="inputNrp" type="text" name="email" value="{{ old('email') }}" placeholder="Masukkan NRP atau Email" required autofocus />
                                            <label for="inputNrp">NRP / Email</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" required />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                                            <label class="form-check-label" for="remember_me">Ingat Saya</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
                                            @endif
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 mt-auto" style="background: transparent;">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Satsiber TNI 2025</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
