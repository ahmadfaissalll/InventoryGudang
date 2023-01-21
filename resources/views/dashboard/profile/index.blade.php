<x-layout :title="'Profile'">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <x-success-message />
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class='content'>
            <div class="container-fluid">
                <div class='row justify-content-around'>
                    <div class='col-md-3'>
                        <!-- Profile Image -->
                        <div class='box box-primary text-center'>
                            <div class='box-body box-profile'><img class='profile-user-img img-responsive img-circle'
                                    src='{{ asset('img/user1-128x128.jpg') }}' alt='{{ auth()->user()->nickname }}'
                                    style='max-width:128px; aspect-ratio: 1;'>
                                <h3 class='profile-username text-center'>{{ auth()->user()->nickname }}
                                </h3>
                                <a href='/dashboard/profile/edit' class='btn btn-block btn-primary'>Ubah
                                    Profil</a>
                                <a href='/dashboard/profile/edit-password/edit' class='btn btn-block btn-danger'>Ubah
                                    Password</a>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class='col-md-6' style="margin-top: 70px">
                        <div class='box box-primary'>
                            <!-- /.box-header -->
                            <div class='box-body'>
                                <div class="ml-2 mb-3">
                                    <strong style="width: 20%; margin-right: 10px; display: inline-block;">Nickname</strong>
                                    <span>{{ auth()->user()->nickname }}</span>
                                </div>
                                <div class="ml-2 mb-3">
                                    <strong
                                        style="width: 20%; margin-right: 10px; display: inline-block;">Username</strong>
                                    <span>{{ auth()->user()->username }}</span>
                                </div>
                                <div class="ml-2 mb-3">
                                    <strong
                                        style="width: 20%; margin-right: 10px; display: inline-block;">Email</strong>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                                <div class="ml-2 mb-3">
                                    <strong
                                        style="width: 20%; margin-right: 10px; display: inline-block;">Password</strong>
                                    <span>Tidak ditampilkan karena alasan keamanan.</span>
                                </div>
                                <hr />
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</x-layout>
