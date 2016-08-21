@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            @if($keyword != null)
            Gezocht op: {{$keyword}}@endif</div>
        <div class="col-md-10">
            {!! Form::open(array('route'=>'queries.search','class'=>'form navbar-form navbar-right searchform')) !!}
            {!! Form::text('search', null,array('required','class'=>'form-control','placeholder'=>'Zoeken')) !!}
            {!! Form::submit('Search',array('class'=>'btn btn-default')) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-body">


                    @if (count($products) === 0)
                        <p>Geen resultaten gevonden voor: {{$keyword}}</p>
                       @else

    @foreach($products as $p)

                        <div class="row underline">
                            <div class="col-md-3">
                               <!-- Eerste foto uitprinten als er 1 is-->

                                @if(count($p->images) != 0)
                                <img class="productimg" src="{{$p->images['0']->getImageUrl()}}" alt="ProductImage" >
                                @else
                                    <img class="productimg" src="{{asset('assets/images/default.jpg')}}" alt="ProductImage" >
                                @endif

                            </div>
                            <div class="col-md-3">
                                <h3><a href="{{ route('products.detail',$p->id) }}">{{$p->title}}</a></h3>
                                <h4>{{$p->name}}</h4>
                                <p>€ {{$p->price}}</p>
                                <p><strong>Categorie:</strong> {{$p->category->name}}</p>
                            </div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-3">
                                <p>{{$p->created_at}}</p>
                                </div>
                        </div>
    @endforeach
                    @endif
        {{ $products->links() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
