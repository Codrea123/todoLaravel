<html>

<h1>{{count($vendors)}}</h1>
@foreach($vendors as $vendor)
    <ul>
        <a href="{{route('vendors.edit', ['vendor' => $vendor])}}">
        <li>
            <div style="display: flex; flex-direction: column;">
                <div>
                    <p>{{$vendor->name}}</p>
                    <p>{{$vendor->email}}</p>
                </div>

            </div>
        </a>
            <form action="{{route("vendors.destroy", ['vendor' => $vendor])}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit">STERGE</button>
            </form>
        </li>
    </ul>
@endforeach

</html>
