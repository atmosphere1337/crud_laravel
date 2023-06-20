<div>Admin</div>
<div style="display:table; border: 1px solid;">
    @foreach ($records as $record)
        <div style="display:table-row; border: 1px solid;">
            <form method="POST" action="{{ route('admin_put') }}" style="display:inline">
                {{method_field('Put')}}
                <input type="hidden" value="{{$record->id}}" name="id"></input>
                <div style="display:table-cell; border: 1px solid; width: 200px;">{{$record->login}}</div>
                <div style="display:table-cell; border: 1px solid;">
                    <input type="submit" value="Ban" @if ($record->ban == 1) disabled @endif></input>
                </div>
            </form>
            <form method="POST" action="{{ route('admin_put_unban') }}" style="display:inline">
                {{method_field('Put')}}
                <input type="hidden" value="{{$record->id}}" name="id"></input>
                <div style="display:table-cell; border: 1px solid;">
                    <input type="submit" value="Unban" @if ($record->ban == 0) disabled @endif></input>
                </div>
            </form>
        </div>
    @endforeach
</div>
<a href="/page">Back</a>