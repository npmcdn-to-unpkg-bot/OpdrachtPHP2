@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Mijn Berichten</div>

                    <div class="panel-body">



    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif
    @if($threads->count() > 0)
        @foreach($threads as $thread)
            <?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
            <div class="media alert {!!$class!!} underline">
                <h4 class="media-heading">{!! link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
                <p>{!! $thread->latestMessage->body !!}</p>
                <p><small><strong>Verzonden door:</strong> {!! $thread->creator()->name !!}</small></p>
                <p><small><strong>Aan:</strong> {!! $thread->participantsString(Auth::id()) !!}</small></p>
            </div>
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop