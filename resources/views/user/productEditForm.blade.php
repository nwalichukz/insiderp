@extends('layouts.usertemplate')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
 				 <div class="panel-heading">Edit Product</div>

                <div class="panel-body">
                         
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/updateProduct') }}" enctype="multipart/form-data" accept-charset="UTF-8" files="true">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="hidden" value="{{$productData->id}}" >
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div class="col-md-9 center-block">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $productData->name }}" placeholder="Enter name of product" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                              <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

                            <div class="col-md-9 center-block">
                                <input id="price" type="text" class="form-control" name="price" value="{{ $productData->price }}" placeholder="Enter price of product" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">

                            <div class="col-md-9 center-block">
                                <select id="category" type="select" class="form-control" name="category" required>
                                    <option value="" selected="">@if(!empty($productData->category)){{$productData->category}} @endif </option>
                                    <option value="Cables" selected=""> Cables</option>
                                    <option value="Electrical-Fittings" selected=""> Electrical Fittings</option>
                                    <option value="Industrial-Materials" selected="">Industrial Materials </option>
                                    <option value="Telecommunication-and-Networking" selected="">Telecommunication and Networking </option>
                                    <option value="Switches-and-Socket" selected=""> Switches and Socket</option>
                                    <option value="Generators-and-Accessories" selected=""> Generators and Accessories</option>
                                    <option value="Ups-and-Surge-Protector" selected=""> Ups and Surge-Protector</option>
                                    <option value="Solar-and-Alternative-Energy" selected="">Solar and Alternative Energy </option>

                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            <div class="form-group{{ $errors->has('descriptn') ? ' has-error' : '' }}">

                            <div class="col-md-9 center-block">
                                 <textarea id="description" type="text" maxlength="200" class="form-control" id="description" name="descriptn" required>{{ $productData->descriptn }}</textarea>
                                    
                               @if ($errors->has('descriptn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descriptn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-9 center-block">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection