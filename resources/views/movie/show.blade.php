@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row">

        <div class="col card-columns">
            @foreach($data->original->film as $x)
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ $x->cover }}" alt="{{ $x->titel }}" style="width: 250px; height: 350px;">
                        <div class="caption text-center">
                            <h5>{{ $x->titel }}</h5> ({{$x->jaar}})

                            @php
                                $starttijd = date('H:i', (int)$x->starttijd);
                                $eindtijd = date('H:i', (int)$x->eindtijd);
                            @endphp

                            <p>{{$starttijd}} - {{$eindtijd}} {{$x->zender}}</p>
                            <a href="/film/tt{{$x->imdb_id}}" class="btn btn-outline-primary" role="button">Bekijk Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection