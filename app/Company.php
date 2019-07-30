<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

	/**
	 * associate company to many customers
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function customers()
	{
		return $this->hasMany(Customer::class);
	}
}
