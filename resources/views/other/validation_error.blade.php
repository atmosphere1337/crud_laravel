@if ($errors->any())
    <div style="color:red">
        @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach 
    <div>
@endif