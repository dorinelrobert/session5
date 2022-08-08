<?php 

namespace App\Model;

use App\Model\AbstractCar;

class FastCar extends AbstractCar {
	
	public function __construct(){
		$this->setSymbol('^')
			->setAccelerate(3)
			->setReverse(3);
	}
}