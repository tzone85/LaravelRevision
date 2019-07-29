<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
	 * Fillable Example
	 * specifying the fields that can be mass assigned
	 * @var array
	 */
	//protected $fillable = ['name', 'email', 'active', 'age', 'jobTitle'];

	/**
	 * Guarded Example
	 * if array is empty, nothing is guarded. (because we'll be using best practices and validating our input fields, and be weary about what goes into the create method)
	 * if we put say name, in there, thus name, cannot be mass assigned.
	 * so Guarded is the opposite of Fillable
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * scope function for active customers
	 * @param $query
	 * @return mixed
	 */
	public function scopeActive($query)
	{
		return $query->where('active', 1);
	}

	/**
	 * scope function for inactive customers
	 * @param $query
	 * @return mixed
	 */
	public function scopeInactive($query)
	{
		return $query->where('active', 0);
	}
}
