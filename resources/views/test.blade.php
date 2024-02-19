<h1>This is a test</h1>

<h2> {{$heading}}  </h2>

@foreach ($listings as $listing)
    <a href="/listing/{{$listing['id']}}"> <h3> {{$listing['name']}} </h3></a>
    <p> {{$listing["details"]}} </p>

@endforeach