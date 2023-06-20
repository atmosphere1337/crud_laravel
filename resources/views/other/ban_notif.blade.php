<div>You are banned</div>
<form action="{{route('logout')}}" method="POST">
    {{method_field('Delete')}}
    <button type="submit">Logout</button>
</form>