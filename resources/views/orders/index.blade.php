<!DOCTYPE html>
<html>
<head>
<title>Orders (Index)</title>
<link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
<div class="navbar-header">
<a class="navbar-brand" href="{{
URL::to('orders') }}">Orders Alert</a>
</div>
<ul class="nav navbar-nav">
<li><a href="{{ URL::to('orders') }}">View All
Orders</a></li>
<li><a href="{{ URL::to('orders/create')
}}">Create a Order</a>
</ul>
</nav>
<h1>All the Orders</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
<div class="alert alert-info">{{
Session::get('message') }}</div>
@endif
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Registration Number</th>
<th>Registration State</th>
<th>Customer Name</th>
<th>Customer Phone</th>
<th>Vehicle Brand</th>
<th>Vehicle Model</th>
<th>Vehicle Year</th>
<th>Vehicle Serial Number</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
@foreach($orders as $key => $value)
<tr>
<td>{{ $value->regno }}</td>
<td>{{ $value->regstate }}</td>
<td>{{ $value->custname }}</td>
<td>{{ $value->custphone }}</td>
<td>{{ $value->vehbrand }}</td>
<td>{{ $value->vehmodel }}</td>
<td>{{ $value->vehyear }}</td>
<td>{{ $value->serialno }}</td>
<!-- we will also add show, edit, and delete
buttons -->
<td>
<!-- delete the order (uses the destroy
method DESTROY /orders/{id} -->
<!-- we will add this later since its a
little more complicated than the other two buttons -->
<!-- Show the order (uses the show method
found at GET /orders/{id} -->

{{ Form::open(array('url' => 'orders/' . $value->orderid, 'class' => 'pull-right')) }}
{{ Form::hidden('_method', 'DELETE') }}
{{ Form::submit('Delete this Order', array('class' => 'btn btn-warning'))
}}
{{ Form::close() }}

<a class="btn btn-small btn-success"
href="{{ URL::to('orders/' . $value->orderid) }}">Show
this Order</a>
<!-- Edit this order (uses the edit
method found at GET /orders/{id}/edit -->
<a class="btn btn-small btn-info"
href="{{ URL::to('orders/' . $value->orderid . '/edit')
}}">Edit this Order</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</body>
</html>
