<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {

    	$activeCustomers = Customer::where('active', 1)->get();
    	$inactiveCustomers = Customer::where('active', 0)->get();


    	// compact/shorter way of passing data to views

		return view('internals.customers', compact('activeCustomers', 'inactiveCustomers'));

    	// long form of passing data to views

    	/*return view('internals.customers', [
			'activeCustomers' => $activeCustomers,
			'inactiveCustomers' => $inactiveCustomers
		]);*/
	}

	public function store() {

    	// add validation
		$data = request()->validate([
			'name' => 'required|alpha|min:3',
			'email' => 'email|required|min:3|distinct',
			'jobTitle'=>'required|alpha|min:2',
			'age' => 'required|max:150|numeric',
			'active' => 'required|boolean'
		]);

    	$customer = new Customer();
    	$customer->name = request('name');
    	$customer->email = request('email');
    	$customer->jobTitle = request('jobTitle');
    	$customer->age = request('age');
    	$customer->active = request('active');
    	$customer->save();

    	return back();
	}
}
