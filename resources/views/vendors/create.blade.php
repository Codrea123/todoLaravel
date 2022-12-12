<form action='{{route('vendors.store')}}' method='post'>
    @csrf
    <input type="text" name="name"/>
    <input type="text" name="email"/>
    <button type="submit">Save</button>
</form>
