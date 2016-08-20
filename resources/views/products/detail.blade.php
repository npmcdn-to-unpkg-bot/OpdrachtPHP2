@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>{{$productdetails->title}}</h3> Geplaatst op: {{$productdetails->created_at->format('d/m/Y')}} Door: <a href="{{ url('/user/'.$productdetails->user_id) }}">{{$username->name}}</a></div>
                    <div class="panel-body">

                        <div class="row">
                            <!-- linkse kolom -->
                            <div class="col-sm-6"> <!--Hier images uitprinten -->
                                <div class="main-carousel" data-flickity='{ "cellAlign":"center", "freeScroll":false, "wrapAround":true, "pageDots":false }'>
                                    @foreach ($images as $image)
                                        <div class="carousel-cell"><img src="{{$image->GetImageUrl()}}" alt="ProductImage" ></div>
                                    @endforeach
                                        @if (count($images) == 0)
                                            <div class="carousel-cell"><img src="{{asset('assets/images/default.jpg')}}" alt="ProductImage" ></div>
                                        @endif
                                </div>
                            </div>
                            <!-- rechtse kolom -->
                            <div class="col-sm-6">
                                <h3>Naam product:</h3>
                                <p>{{$productdetails->name}}</p>
                                <h3>Vraagprijs:</h3>
                                <p>€ {{$productdetails->price}}</p>
                                <h3>Beschrijving:</h3>
                                <p>{{$productdetails->description}}</p>


                            </div>
                        </div>




                    </div>
                    <div class="panel-footer">
                       <h3>Categorie: {{$categoryname->name}}</h3>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
