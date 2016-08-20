@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @include('layouts._partials.messages')
                <div class="panel panel-default">
                    <div class="panel-heading">Persoonlijke zoekertjes beheren</div>

                    <div class="panel-body">

                        <table class="table">
                            <thead>
                            <!--  titels -->
                            <tr >
                                <th>Titel</th>
                                <th>Naam</th>
                                <th>Omschrijving</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            <!--  foreach voor alle items -->
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
                                        <a type="button" href="{{ route('user.products.edit',$userproduct->id) }}"
                                           class="btn btn-rounded btn-info btn-xs">Bewerken</a>
                                    </td>
                                    <td class="text-right">

                                        <form action="{{ route('user.products.destroy',$userproduct->id) }}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit"  class="btn btn-rounded btn-warning btn-xs">Verwijderen</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
