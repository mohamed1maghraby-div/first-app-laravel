
@extends('layouts.app')

@section('content')
@if (count($errors)>0)
<div class="alert alert-danger">
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
</div>
@endif
@if (count($items)>0)
<div class="panel" style="margin:15px; border-color: #d3e0e9; ">
<div class="container">
    <h1>Create Request </h1>
    <form action="requests" method="post">
        {{csrf_field()}}
        <div class="form-group">
           @foreach($items as $item)
            <input class="inser_s" type="checkbox" name="items{{ $item->id }}" value="{{ $item->item_name }}" style="margin-left:35%;"> {{ $item->item_name }}
            <input class="inser_q form-control" style="width:30%; margin-left:35%;" type="number" name="quantities{{ $item->id }}" value="{{ $item->quantity }}" max="{{ $item->quantity }}" min="0" placeholder="" disabled/><br/>
            @endforeach
        </div>
        <input type="submit" style="margin-left:35%;" value="create" class="btn btn-promary">
    </form>
</div>

<div class="container">
        
        
<h1>Delete Request</h1>
      
        <table class="table">
        <thead>
            <tr>
                <td>Item Name:</td> 
                <td>Quantity</td>       
                <td>Delete</td>
            </tr>
        </thead>
        @foreach($show_req as $show_reqs)
        <thead>
            <tr>
                <td>{{ $show_reqs->items }}</td> 
                <td>{{ $show_reqs->quantities }}</td>  
                <td><a href="requests/{{$show_reqs->id}}/{{$show_reqs->items}}">Delete</a></td>
            </tr>
        </thead>
            @endforeach
      
        </table>
</div>
</div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
          $(".inser_s").click(function(e){
                if ($(this).next().attr('disabled')) {
                    $(this).next().removeAttr('disabled');
                } else {
                    $(this).next().attr('disabled', 'disabled');
                }
          });
    });
</script>

@endsection