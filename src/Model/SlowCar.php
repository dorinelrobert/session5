<?php 

namespace App\Model;

use App\Model\AbstractCar;

class SlowCar extends AbstractCar {

	public function __construct(){
		$this->setSymbol('v')
			->setAccelerate(1)
			->setReverse(1);
	}
}