<?php

namespace MPay24Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Mpay24Order extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'mpay24order';
	}
}
