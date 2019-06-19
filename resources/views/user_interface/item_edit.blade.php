@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Item</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="/item_edit/{{$items->id}}" method="post"> 
                        {{csrf_field()}}
                        <!-- Item Name -->
                        <div class="form-group{{ $errors->has('item_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"> Item Name :</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="item_name"  value="{{$items->item_name}}" placeholder="" />
                                @if ($errors->has('item_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <!-- quantity -->
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label"> Item Quantity :</label>

                            <div class="col-md-6">
                                <input type="number" name="quantity" value="{{$items->quantity}}" placeholder=""  class="form-control"/>
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- price -->
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">  Item Price : </label>

                            <div class="col-md-6">
                                <input type="number" name="price" value="{{$items->price}}" placeholder="" class="form-control"/>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" value="CreateItem" class="btn btn-primary">
                            </div>
                        </div>
                        
                        </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection

