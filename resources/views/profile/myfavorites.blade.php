@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('layouts._partials.messages')
                <div class="panel panel-default">
                    <div class="panel-heading">Mijn favorieten</div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                            <!--  titels -->
                            <tr >
                                <th>Titel</th>
                                <th>Naam</th>
                                <th>Omschrijving</th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--  foreach voor alle items -->
                            @if (!empty($userproducts))
                            @foreach($userproducts as $userproduct)
                                <tr>
                                    <td>
                                        {{ $userproduct->title}}

                                    </td>
                                    <td>
                                        {{ $userproduct->name}}

                                    </td>
                                    <td>
                                        {{ substr(($userproduct->description),0,75)." ..."}}

                                    </td>
                                    <td class="text-right">
                                        <a type="button" href="{{ route('products.detail',$userproduct->id) }}"
                                           class="btn btn-rounded btn-primary btn-xs">Bekijken</a>
                                    </td>
                                </tr>
                            @endforeach
                                @else
                                <p>U heeft nog geen favorieten toegevoegd.</p>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
