@extends('layout')

@section('content')
    <h1>Customers</h1>

    <form action="customers" method="post" class="pb-5">

        <p>Name:</p>
        <div class="input-group pb-2">
            <input type="text" name="name" value="{{ old('name') }}">
            {{ $errors->first('name') }}
        </div>

        <p>Email:</p>
        <div class="input-group">

            <input type="email" name="email" value="{{ old('email') }}">
            {{ $errors->first('email') }}
        </div>

        <button type="submit">Add Customer</button>

        @csrf
    </form>
    
    <ul>
        @foreach($customers as $customer)
            <li>{{ $customer->name }} <span class="text-muted"> ({{ $customer->email }}) </span></li>
        @endforeach
    </ul>
@endsection