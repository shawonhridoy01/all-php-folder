

@forelse ($addresss as $address)
    <h2>{{$address->user->name}}</h2>
    <h2>{{$address->user->email}}</h2>
    <h2>{{$address->user->password}}</h2>
    <h2>{{$address->address}}</h2>

    <hr>
@empty

@endforelse
