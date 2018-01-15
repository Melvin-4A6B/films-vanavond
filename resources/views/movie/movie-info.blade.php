@extends("layouts.app")

@section("content")
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <img src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{$data['poster_path']}}" alt="{{$data['title']}}">
            </div>
            <div class="col-sm-9">
                <h2>{{$data['title']}}</h2>
                <p>{{$data['overview']}}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h3>Film informatie</h3>
                <hr>
                <h5>Genre</h5>
                @foreach($data['genre_ids'] as $key => $x)
                    @lang("genre." . $x){{ $key == count($data['genre_ids']) - 1 ? "" : " /" }}
                @endforeach

                <h5>Speelduur</h5>
                {{$details['runtime']}} Min

                <h5>IMDB</h5>
                {{$details['vote_average']}} <i class="fas fa-star"></i>

                <h5>Budget</h5>
                &dollar;{{$details['budget']}}

                <h5>Omzet</h5>
                &dollar;{{$details['revenue']}}

                <h5>Releasedatum</h5>
                {{date("d/m/Y", strtotime($details['release_date']))}}
                <h5>Regie</h5>
                <ul>
                    @foreach($directors as $d)
                        <li>{{$d['name']}}</li>
                    @endforeach
                </ul>

                <h5>Acteurs</h5>
                <ul>
                    @foreach($credits["cast"] as $c)
                        <li>{{$c['name']}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-9">
                @if(count($trailers["youtube"]) > 0)
                    <iframe id="ytplayer" type="text/html" width="640" height="360"
                            src="https://www.youtube.com/embed/{{ $trailers["youtube"][0]["source"] }}?autoplay=0"
                            frameborder="0">
                    </iframe>
                @endif

                <h5>Gerelateerde films</h5>
                <ul>
                    @foreach($similar as $sim)
                        <li>{{ $sim["title"] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection