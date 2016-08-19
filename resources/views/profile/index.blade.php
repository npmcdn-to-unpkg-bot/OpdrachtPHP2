@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Mijn Profiel</div>

                    <div class="panel-body">



                    <p> <Strong> Gebruikersnaam: </Strong>{{ Auth::user()->name }}</p>
                        <p><Strong>  E-Mail Address: </Strong> {{ Auth::user()->email}}</p>
                        <p> <Strong>  Woonplaats: </Strong>{{ Auth::User()->zipcode}} {{ Auth::User()->city}}</p>
                        <p><Strong> Lid sinds: </Strong>{{ Auth::User()->created_at->format('d/m/Y')}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
