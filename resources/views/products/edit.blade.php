@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Bewerk zoekertje - {{$product->title}}</div>

                    <div class="panel-body">
                        {!! Form::model($product->toArray(),['method' => 'PUT', 'route' => ['user.products.update',$product->id],'role' =>
                            'form','class'=>'admin-form form-horizontal','files' => 'true']) !!}


                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="inputName">Productnaam</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    {{ Form::text('name',null,['id' => 'inputName','class' => 'form-control','placeholder' => 'product naam']) }}

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="inputTitle">Titel</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    {{ Form::text('title',null,['id' => 'inputTitle','class' => 'form-control','placeholder' => 'product titel']) }}

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="inputDescription">Beschrijving</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    {{  Form::textarea('description',null,['id' => 'inputDescription','class' => 'form-control','placeholder' => 'Productbeschrijving']) }}

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="inputPrice">Prijs in euro</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    {{  Form::text('price',null,['id' => 'inputPrice','class' => 'form-control','placeholder' => '€€€']) }}

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Selecteer Categorie</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    {!! Form::select('categories[]', $categories,$selected,['class'=>'dropdown']) !!}

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="inputContent">Product foto</label>
                            <div class="col-lg-8">
                                <div class="bs-component">

                                    {!! Form::file('images[]', array('multiple'=>true)) !!}

                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="bs-component text-center">

                                    <input class="btn btn-default" type="submit"
                                           value="save"/>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
