<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {

    	$customers = Customer::all();

		return view('internals.customers', [
			'customers' => $customers
		]);
	}

	public function store() {

    	// add validation
		$data = request()->validate([
			'name' => 'required|alpha|min:3',
			'email' => 'email|required|min:3|distinct',
			'jobTitle'=>'required|alpha|min:2',
			'age' => 'required|max:150|numeric'
		]);

    	$customer = new Customer();
    	$customer->name = request('name');
    	$customer->email = request('email');
    	$customer->jobTitle = request('jobTitle');
    	$customer->age = request('age');
    	$customer->save();

    	return back();
	}
}
