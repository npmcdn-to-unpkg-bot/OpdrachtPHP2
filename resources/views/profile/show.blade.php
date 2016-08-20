@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{$user->name}}</h3> <a href="#"><span class="label label-info"><i class="fa fa-comment"></i> Stuur Bericht</span></a></div>

                    <div class="panel-body">




                        <p><Strong>  E-Mail Address: </Strong> {{ $user->email}}</p>
                        <p> <Strong>  Woonplaats: </Strong>{{ $user->zipcode}} {{ $user->city}}</p>
                        <p><Strong> Lid sinds: </Strong>{{ $user->created_at->format('d/m/Y')}}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
