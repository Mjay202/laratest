<h1>This is a test</h1>

<h2> {{$heading}}  </h2>

@unless ((count ($listings)) == 0)
@foreach ($listings as $listing)
    <a href="/listing/{{$listing['id']}}"> <h3> {{$listing['name']}} </h3></a>
    <p> {{$listing["details"]}} </p>
@endforeach

    
@else
<p>There is no listing available<p>

@endunless