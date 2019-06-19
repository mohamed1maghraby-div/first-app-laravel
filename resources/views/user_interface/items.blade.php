@extends('layouts.app')

@section('content')
<div class="container col-lg-12">
    <div class="row">
        <div class=" col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create && Update and Delete Items</div>

                <div class="panel-body">
       
                    <form action="items" method="post"> 
                        {{csrf_field()}}
                        <!-- item name -->
                        <div class="form-group{{ $errors->has('item_name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Item Name : </label>

                            <div class="col-md-6">
                                <input style="margin-top:20px;" class="form-control" type="text" name="item_name"   autofocus/>
                                @if ($errors->has('item_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('item_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <!--  Item Quantity -->
                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Item Quantity : </label>

                            <div class="col-md-6">
                                <input style="margin-top:20px;" class="form-control" type="number" name="quantity"   autofocus/>
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!--  Item Price -->
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Item Price : </label>

                            <div class="col-md-6">
                                <input style="margin-top:20px;" class="form-control" type="number" name="price"   autofocus/>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input style="margin-top:20px;"type="submit" value="Create Item" class="btn btn-primary">
                            </div>
                        </div>
                        </form>

                    <div class="container">
                        <table class="table col-lg-5">
                            <thead>
                                <tr>
                                    <td>Item Name:</td> 
                                    <td>Quantity</td>   
                                    <td>Price</td>   
                                    <td>Edit</td>   
                                    <td>Delete</td>
                                </tr>
                            </thead>
                             @foreach($items as $item)
                            <thead>
                                <tr>
                                    <td>{{ $item->item_name }}</td> 
                                    <td>{{ $item->quantity }}</td>   
                                    <td>{{ $item->price }}</td>   
                                    <td><a href="item_edit/{{$item->id}}">Edit</a></td> 
                                    <td><a href="items/{{$item->id}}">Delete</a></td>
                                </tr> 
                            </thead>
                            @endforeach

                        </table>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>