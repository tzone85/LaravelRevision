<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
	 * specifying the fields that can be mass assigned
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'active', 'age', 'jobTitle'];

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
