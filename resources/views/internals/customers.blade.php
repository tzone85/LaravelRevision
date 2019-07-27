@extends('layout')

@section('title', 'Learning Laravel 5.8')
    Customer List
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="customers" method="post">

                <div class="form-group pb-2">

                    <label for="name">Name: </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    {{ $errors->first('name') }}
                </div>

                <div class="form-group pb-2">

                    <label for="email">Email: </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    {{ $errors->first('email') }}
                </div>

                <div class="form-group pb-2">

                    <label for="jobTitle">Job Title:</label>
                    <input type="text" name="jobTitle" value="{{ old('jobTitle') }}" class="form-control">
                    {{ $errors->first('jobTitle') }}
                </div>

                <div class="form-group pb-2">

                    <label for="age">Age:</label>
                    <input type="number" name="age" value="{{ old('age') }}" class="form-control">
                    {{ $errors->first('age') }}
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-12">
            <ul>
                @foreach($customers as $customer)
                    <li>{{ $customer->name }} Age: {{ $customer->age }} <span class="text-muted"> ( {{ $customer->email }} Job Title: {{ $customer->jobTitle }} )</span> </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection