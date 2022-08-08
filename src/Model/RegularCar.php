<?php 

namespace App\Model;

use App\Model\AbstractCar;

class RegularCar extends AbstractCar {
	
	public function __construct(){
		$this->setSymbol('o')
			->setAccelerate(2)
			->setReverse(2);
	}
}