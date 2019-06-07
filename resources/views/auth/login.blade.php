<!DOCTYPE html>
<html lang="en">
<head>
    <title>MLM | Registration </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato&amp;subset=latin,latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/4ecc3dbb0b.js"></script>
    <link href="{{asset('public/css/toast.css')}}" rel="stylesheet">
    <script src="{{asset('public/js/toast.js')}}"></script>
    <link rel="stylesheet" href="{{asset('public/css/style2.css')}}">
    <style>
        .help-block
        {
            display: none;
        }
    </style>
</head>
<body>
<div class="container-fluid col_head">
    <header class="header">
        <a href="" class="logo">MLM</a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
        {{--<ul class="menu">--}}
        {{--<li><a href="#">Our Work</a></li>--}}
        {{--<li><a href="#">About</a></li>--}}
        {{--<li><a href="#">Careers</a></li>--}}
        {{--<li><a href="#"><span class="glyphicon glyphicon-user menu_icon"></span> Contact</a></li>--}}
        {{--</ul>--}}
    </header>
<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Login Form</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form method="post" action="{{url('/login')}}">
                        {{csrf_field()}}
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="user_id" value="{{ old('user_id') }}" id="id" placeholder="User ID"/>
                        @if ($errors->has('user_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" name="password" id="psw" value="{{old('password')}}" placeholder="Password" required/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
            <!--                    <input class="button" type="submit" value="Register" />-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" id="nextBtn">Login</button>
                    </div>
                </form>
                <center>
                    <div class="login-register-option">
                        <a class="anchor-mlm" href="{{ url('/password/reset') }}">I forgot my password</a><br>
                        <a class="anchor-mlm" href="{{ url('/register') }}">Register a new membership</a>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid footer">
    <center>
        <p>Footer</p>
    </center>
</div>
</div>
</body>
<script>
    $(function () {
        if (($('.alert-success').contents().length  != 0))
        {
            $('.alert-success').hide();
            $.toast({
                heading: 'Success',
                text: $('.alert-success').text(),
                icon: 'success',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            })

        }
        if (($('.alert-danger').contents().length  != 0))
        {
            $('.alert-danger').hide();
            $.toast({
                heading: 'Failed',
                text: $('.alert-danger').text(),
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            })

        }
        if (($('.help-block').contents().length  != 0))
        {
            $('.help-block').hide();
            $.toast({
                heading: 'Failed',
                text: $('.help-block').text(),
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            })

        }
    });
    $('#nextBtn').click(function (e) {
        if ($('#id').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "User ID is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#id').addClass('error');
            return false;
        }
        if($('#psw').val() == '')
        {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "User ID is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#psw').addClass('error');
            return false;
        }
    });
</script>
</html>
