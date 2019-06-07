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

    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <style>
        .help-block
        {
            display: none;
        }
        .login-register-option
        {
            margin-bottom: 20px;
        }
    </style>
</head>
<div class="loader" id="loader-2">
    <span></span>
    <span></span>
    <span></span>
</div>
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
{{--@include('frontEnd.header)--}}

    <div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Registration Form</h2>
        </div>
        <div class="row clearfix">
            <div class="">
                <form method="post" action="{{url('/register')}}">
                    {{csrf_field()}}
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="fname" class="input_form_control" id="fname" value="{{ old('fname') }}" placeholder="First Name"/>
                        @if ($errors->has('fname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="lname" id="lname" value="{{ old('lname') }}" placeholder="Last Name" />
                        @if ($errors->has('lname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email"/>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="text" name="referal_id" id="refId" value="{{ old('referal_id') }}" placeholder="Refferal ID"/>
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" id="psw" name="password" placeholder="Password"/>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-lock"></i></span>
                        <input type="password" id="psw1" name="password_confirmation" placeholder="Confirm Password"/>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="input_field"><span><i aria-hidden="true" class="fa fa-flag"></i></span>
                        <select name="state" id="state" onchange="getCity(this.value)">
                            <option value="" selected disabled>State</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                        {{--<input type="text" id="state" name="state" value="{{ old('state') }}" placeholder="State"/>--}}
                        @if ($errors->has('state'))
                            <span class="help-block">
                                <strong>{{ $errors->first('state') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input_field cityClass"><span><i aria-hidden="true" class="fa fa-building-o"></i></span>
                        <input type="text" id="city" readonly="" name="city" value="{{ old('city') }}" placeholder="City"/>
                        @if ($errors->has('city'))
                            <span class="help-block">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" id="btnNext">Register</button>
            </div>
            </form>
            <div class="login-register-option">
                    <center>
                        <a class="anchor-mlm" href="{{ url('/login') }}">I already have a membership</a><br> <br/>
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
        $('.countries').trigger("change");
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
    $('#btnNext').click(function (e) {

        if ($('#fname').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "First Name is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#fname').addClass('error');
            return false;
        }
        if ($('#lname').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "Last Name is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#lname').addClass('error');
            return false;
        }
        if ($('#email').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "Email is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#email').addClass('error');
            return false;
        }
        if ($('#psw').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "Password is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#psw').addClass('error');
            return false;
        }
        if ($('#psw').val() != $('#psw1').val()) {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "Password and Confirm Password do not match",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#psw').addClass('error');
            return false;
        }
        if ($('#state').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "State is required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#state').addClass('error');
            return false;
        }
        if ($('#city').val() == '') {
            e.preventDefault();
            $('input').removeClass('error');
            $.toast({
                heading: 'Failed',
                text: "City is Required",
                icon: 'error',
                hideAfter: 5000,
                showHideTransition: 'slide',
                loader: false
            });
            $('#city').addClass('error');
            return false;
        }
        else
        {
            $('input').removeClass('error');
        }
    });
    $('#refId').change(function (e) {
        var refId = $('#refId').val();
        if (refId != '')
        {
            $('.loader').show();
            $.ajax({
               url: "{{url('checkReferal')}}"+"/"+refId,
               success: function (result) {
                   $('.loader').hide();
                   if (result == 0)
                   {
                       $('input').removeClass('error');
                       $('#refId').addClass('error');
                       $('#refId').val('');
                       $.toast({
                           heading: 'Failed',
                           text: "The Referral ID is not valid",
                           icon: 'error',
                           hideAfter: 5000,
                           showHideTransition: 'slide',
                           loader: false
                       });
                   }
               }
            });
        }
    });
    $('#email').change(function(e)
    {
        var email = $('#email').val();
        if (email != '')
        {
            $.ajax({
                url: "{{url('checkEmail')}}"+"/"+email,
                success: function (result) {
                    $('.loader').hide();
                    if (result == 0)
                    {
                        $('input').removeClass('error');
                        $('#email').addClass('error');
                        $.toast({
                            heading: 'Failed',
                            text: "This email is already exists",
                            icon: 'error',
                            hideAfter: 5000,
                            showHideTransition: 'slide',
                            loader: false
                        });
                    }
                }
            });
        }
    });
    function getCity(id) {
        if (id != '')
        {
            $('.loader').show();
            $.ajax({
                url: "{{url('getCity')}}"+"/"+id,
                success: function(result)
                {
                    $('.loader').hide();
                    $('.cityClass').html(result);
                }
            });
        }
    }
</script>
{{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
{{--<script src="//geodata.solutions/includes/countrystatecity.js"></script>--}}
</html>
