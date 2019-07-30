<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
	{
    	// active and inactive functions from the scope defined in the model
//    	$activeCustomers = Customer::active()->get();
//    	$inactiveCustomers = Customer::inactive()->get();

		$customers = Customer::all();

    	return view('customers.index', compact('customers'));
//    	return view('customers.index', compact('activeCustomers', 'inactiveCustomers'));

	}

	public function create()
	{
		$companies = Company::all();
		return view('customers.create', compact('companies'));
	}

	public function store()
	{

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

    	return redirect('customers');
	}


	/**
	 * making use of Route Model Binding thus rendering the commented out code useless
	 * @param Customer $customer
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show(Customer $customer)
	{
		//below returns a null if not in db
//		$customer = Customer::find($customer);

		// returns a 404 if page not in db
//		$customer = Customer::where('id', $customer)->firstOrFail();
		return view('customers.show', compact('customer'));
	}
}
