<?php 

namespace MithatGuner\Kiyasla\Facades;

use Illuminate\Support\Facades\Facade;

class Kiyasla extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'kiyasla';
	}
	
}