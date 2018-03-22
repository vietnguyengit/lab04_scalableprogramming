<!DOCTYPE html>
<html>
<head>
<title>Edit Order</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse">
<div class="navbar-header">
<a class="navbar-brand" href="{{ URL::to('orders') }}">Orders Alert</a>
</div>
<ul class="nav navbar-nav">
<li><a href="{{ URL::to('orders') }}">View All Orders</a></li>
<li><a href="{{ URL::to('orders/create') }}">Create a Order</a>
</ul>
</nav>
<h1>Edit {{ $order->regno }}</h1>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::model($order, array('route' => array('orders.update', $order->orderid),
'method' => 'PUT')) }}
<div class="form-group">
{{ Form::label('regno', 'Registration Number') }}
{{ Form::text('regno', Input::old('regno'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
{{ Form::label('regstate', 'Registration State') }}
{{ Form::text('regstate', Input::old('regstate'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
{{ Form::label('custname', 'Customer Name') }}
{{ Form::text('custname', Input::old('custname'), array('class' => 'form-control'))
}}
</div>
<div class="form-group">
{{ Form::label('custphone', 'Customer Phone') }}
{{ Form::text('custphone', Input::old('custphone'), array('class' => 'formcontrol'))
}}
</div>
<div class="form-group">
{{ Form::label('vehbrand', 'Vehicle Brand') }}
{{ Form::text('vehbrand', Input::old('vehbrand'), array('class' => 'form-control'))
}}
</div>
<div class="form-group">
{{ Form::label('vehmodel', 'Vehicle Model') }}
{{ Form::text('vehmodel', Input::old('vehmodel'), array('class' => 'formcontrol'))
}}
</div>
<div class="form-group">
{{ Form::label('vehyear', 'Vehicle Year') }}
{{ Form::text('vehyear', Input::old('vehyear'), array('class' => 'form-control')) }}
</div>
<div class="form-group">
{{ Form::label('serialno', 'Vehicle Serial Number') }}
{{ Form::text('serialno', Input::old('serialno'), array('class' => 'form-control')) }}
</div>
{{ Form::submit('Edit the Order!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}
</div>
</body>
</html>
