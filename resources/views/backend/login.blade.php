<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Vinh">
    <meta name="author" content="">

    <title>Admin - The Vinh</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url('backend/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('backend/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url('backend/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Nhập</h3>
                    </div>
                    <div class="panel-body">
                        @include('backend.blocks.error')
                        <form role="form" action="" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên người dùng" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{url('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('backend/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('backend/dist/js/sb-admin-2.js')}}"></script>

</body>

</html>
