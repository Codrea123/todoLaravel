PAGINA DE EDIT
<form action="{{route('vendors.update', ['vendor' => $vendor])}}" method='post'>
    @csrf
    <input type="text" name="name" value="{{$vendor->name}}"/>
    <input type="text" name="email" value="{{$vendor->email}}"/>
    <button type="submit">Save</button>
</form>
