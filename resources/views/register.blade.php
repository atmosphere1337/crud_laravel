<div>Register</div>
<form method="POST" action="{{route('register_process')}}">
    <input type="text" name = "login" /><br/>
    <input type="text" name = "password" /><br/>
    <input type="submit"/><br/>
</form>
<a href="{{route('login_get')}}">Login</a>