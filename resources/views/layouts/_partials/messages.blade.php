<?php
$messages=session()->get('messages');

?>
@if($messages and count($messages) > 0)

    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        @foreach($messages as $message)

            {!! $message !!}<br>

        @endforeach

    </div>

@endif