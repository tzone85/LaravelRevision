<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function list() {

    	$customers = [
			'Thand Mini',
			'Mncedi Mhla',
			'Dishman Sombolo',
			'Another Name'
		];

		return view('internals.customers', [
			'customers' => $customers
		]);
	}
}
