@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>{{$thread->subject}}</h2><h4 class="media-heading"><i class="fa fa-trash" aria-hidden="true"></i>
                            {!! link_to('messages/delete' .'/'. $thread->id, 'Conversatie Verwijderen') !!}</h4></div>

                    <div class="panel-body">

    <div class="col-md-12">


        @foreach($thread->messages as $message)
            <div class="media underline">

                <div class="media-body">
                    <h5 class="username"><a href="{{ url('/user/'.$message->user->id) }}">{!! $message->user->name !!}:</a></h5>
                    <p>{!! $message->body !!}</p>
                    <div class="text-muted"><small>Posted {!! $message->created_at->diffForHumans() !!}</small></div>
                </div>
            </div>
        @endforeach

        <h4>Antwoorden:</h4>
        {!! Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT']) !!}
    <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>



    <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Verzenden', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop