<?php

namespace MPay24Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class MPay24 extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'mpay24';
	}
}
