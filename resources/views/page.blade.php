<div>Page</div>
<div style="display:table; border: 1px solid;">
    @foreach ($records as $record)
        <div style="display:table-row; border: 1px solid;">
            <form method="POST" action="{{ route('page_update') }}" style="display:inline">
                {{method_field('Put')}}
                <div style="display:table-cell; border: 1px solid;"><input name="id" type="hidden" value="{{$record->id}}" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
                <div style="display:table-cell; border: 1px solid;"><input name="country" value="{{$record->country}}" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
                <div style="display:table-cell; border: 1px solid;"><input name="city" value="{{$record->city}}" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
                <div style="display:table-cell; border: 1px solid;"><input name="population" value="{{$record->population}}" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
                <div style="display:table-cell; border: 1px solid;"><input type="submit" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
            </form>
            <form method="POST" action="{{ route('page_drop') }} " style="display:inline">
                {{method_field('Delete')}}
                <div style="display:table-cell; border: 1px solid;"><input name="id" type="hidden" value="{{$record->id}}" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
                <div style="display:table-cell; border: 1px solid;"><input type="submit" value="Delete" @if(!($record->owner == auth()->user()->id)) disabled @endif></input></div>
            </form>
        </div>
    @endforeach
</div>
<form action="{{ route('page_add') }}" method="POST">
    <input type="text" name="country"> </input>
    <input type="text" name="city"> </input>
    <input type="text" name="population"> </input>
    <input type="submit"> </input>
</form>
<form action="{{route('logout')}}" method="POST">
    {{method_field('Delete')}}
    <button type="submit">Logout</button>
</form>
