<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {

    	// active and inactive functions from the scope defined in the model
    	$activeCustomers = Customer::active()->get();
    	$inactiveCustomers = Customer::inactive()->get();
    	$companies = Company::all();

    	return view('internals.customers', compact('activeCustomers', 'inactiveCustomers', 'companies'));

//		return view('internals.customers', [
//			'activeCustomers' => $activeCustomers,
//			'inactiveCustomers' => $inactiveCustomers
//		]);
	}

	public function store() {

    	// add validation including the optional field
		$data = request()->validate([
			'name' => 'required|alpha|min:3',
			'email' => 'email|required|min:3|distinct',
			'jobTitle'=>'required|string|alpha|min:2',
			'age' => 'required|max:150|numeric',
			'active' => 'required|boolean',
			'random' => 'required',
			'company_id' => 'required'
		]);

		// utalizing mass assignment
		Customer::create($data);

    	return back();
	}
}
