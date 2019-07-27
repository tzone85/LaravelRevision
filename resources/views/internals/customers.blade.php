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
        <div class="input-group pb-2">

            <input type="email" name="email" value="{{ old('email') }}">
            {{ $errors->first('email') }}
        </div>

        <p>Job Title:</p>
        <div class="input-group pb-2">

            <input type="text" name="jobTitle" value="{{ old('jobTitle') }}">
            {{ $errors->first('jobTitle') }}
        </div>

        <p>Age:</p>
        <div class="input-group pb-2">

            <input type="number" name="age" value="{{ old('age') }}">
            {{ $errors->first('age') }}
        </div>

        <button type="submit">Add Customer</button>

        @csrf
    </form>
    
    <ul>
        @foreach($customers as $customer)
            <li>{{ $customer->name }} Age: {{ $customer->age }} <span class="text-muted"> ( {{ $customer->email }} Job Title: {{ $customer->jobTitle }} )</span> </li>
        @endforeach
    </ul>
@endsection