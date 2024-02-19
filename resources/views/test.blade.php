<h1>This is a test</h1>

<h2> {{$heading}}  </h2>

@foreach ($listings as $listing)
    <h3> {{$listing['name']}} </h3>
    <p> {{$listing["details"]}} </p>

@endforeach