\
<!DOCTYPE html>
<html lang="en">

<head> 
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class='row'>
        <div class=".col-md-4.col-md-offset-4" style="margin-top: 20px;">
            <h4>Login</h4>
            <hr>
            <form action='{{route('login-user')}}', method='POST'>
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
              <div class="form-group">
                <label for='email'>Email</label>
                 <input type="text" class="form-control" placeholder="Enter email:" name="email" value='{{old('email')}}'>
                 <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for='password'>Password</label>
                 <input type="password" class="form-control" placeholder="Enter password:" name="password" value=''>
                 <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>
              <br>
              <div class="form-group">
                <button class="btn btn-block btn-primary" type='submit'>Login</button>
              </div>
              <br>
                <a href="registration">Register first!</a>
            </form>
        </div>
        </div>
    </div>
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</html>