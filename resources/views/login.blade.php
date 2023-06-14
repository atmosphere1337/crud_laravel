<div>Login</div>
<form method="POST" action="{{route('login_process')}}">
    <input type="text" name = "login" /><br/>
    <input type="text" name = "password" /><br/>
    <input type="submit"/><br/>
</form>
<a href="{{route('register_get')}}">Register</a>