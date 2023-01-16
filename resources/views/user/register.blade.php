<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Gudang | Login</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- ADMIN LTE THEME --}}
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <style>
        .form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
        }

        @media (max-width: 768px) {
            .form {
                height: 100vh;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form">
            <div class="col-lg-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Register</h1>
                    </div>

                    <form class="form-horizontal" method="post" action="/register">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        value="{{ old('username') }}" name="username">
                                    @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        value="{{ old('email') }}" name="email">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nickname" class="col-sm-2 col-form-label">Nickname</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nickname" placeholder="Nickname"
                                        value="{{ old('nickname') }}" name="nickname">
                                    @error('nickname')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                            </div>
                            <p>Sudah punya akun? <a href="/login">Masuk</a></p>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Sign in</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

</body>

</html>
