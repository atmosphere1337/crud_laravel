<link rel="stylesheet" href="css/bootstrap.css">
<div class = "h-100 d-flex justify-content-center align-items-center">
<form method="POST" action="{{route('register_process')}}">
  <div class="mb-3 text-center h5">Register page</div>
  <div class="form-floating mb-3">
    <input name="login" type="text" class="form-control" id="Input1" aria-describedby="emailHelp" placeholder="Login">
    <label for="Input1">Login</label>
  </div>
  <div class="form-floating mb-3">
    <input name="password" type="password" class="form-control" id="Password1" placeholder="Password">
    <label for="Password1">Password</label>
  </div>
  <div>
    <button type="submit" class="btn btn-primary" style="float:left; width:45%; margin-left:2%">Sign Up</button>
    <a href="{{route('login_get')}}" class="btn btn-danger" style="float:right; width:45%; margin-right:2%">Sign In</a>
    @include('other.validation_error')
  </div>
</form>
</div>