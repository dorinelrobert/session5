<?php

namespace App\Service;

use App\Model\SlowCar;
use App\Model\RegularCar;
use App\Model\FastCar;

class CarLoader {
	public function getCars(){
		$cars[] = new SlowCar();
		$cars[] = new RegularCar();
		$cars[] = new FastCar();
		$cars[] = new FastCar();

		return $cars;
	}
}