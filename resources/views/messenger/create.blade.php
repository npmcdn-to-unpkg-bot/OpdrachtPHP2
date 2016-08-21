@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Create a new message</h2></div>

                    <div class="panel-body">

    {!! Form::open(['route' => 'messages.store']) !!}

    <div class="col-md-12">
        <!-- Subject Form Input -->
        <div class="form-group">
            {!! Form::label('subject', 'Onderwerp', ['class' => 'control-label']) !!}
            {!! Form::text('subject', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::label('message', 'Bericht', ['class' => 'control-label']) !!}
            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
        </div>



        <input type="checkbox" checked="true" hidden="true" name="recipients[]" value="{!!$to_id!!}">



    <!-- Submit Form Input -->
        <div class="form-group">
            {!! Form::submit('Verzenden', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop