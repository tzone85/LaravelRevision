@extends('layout')

@section('title')
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

                <div class="form-group">
                    <label for="active">Status</label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>

                @csrf
            </form>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-6">
            <h3>Active Customers:</h3>
            <ul>
                @foreach($activeCustomers as $activeCustomer)
                    <li>{{ $activeCustomer->name }} Age: {{ $activeCustomer->age }} <span class="text-muted"> ( {{ $activeCustomer->email }} Job Title: {{ $activeCustomer->jobTitle }} )</span> </li>
                @endforeach
            </ul>
        </div>

        <div class="col-6">
            <h3>Inactive Customers:</h3>
            <ul>
                @foreach($inactiveCustomers as $inactiveCustomer)
                    <li>{{ $inactiveCustomer->name }} Age: {{ $inactiveCustomer->age }} <span class="text-muted"> ( {{ $inactiveCustomer->email }} Job Title: {{ $inactiveCustomer->jobTitle }} )</span> </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection