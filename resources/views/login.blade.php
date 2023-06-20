<div>Login</div>
<form method="POST" action="{{route('login_process')}}">
    <input type="text" name = "login" /><br/>
    <input type="password" name = "password" /><br/>
    <input type="submit"/><br/>
</form>
@include('other.validation_error')
<a href="{{route('register_get')}}">Register</a>