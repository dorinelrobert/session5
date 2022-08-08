<?php 

namespace App\Model;

class AbstractCar {
	private $symbol;
	private $accelerate;
	private $reverse;
	private $col;
	private $row = 0;

	public function setSymbol(string $symbol){
		$this->symbol = $symbol;
		return $this;
	}

	public function getSymbol(){
		return $this->symbol;
	}

	public function setAccelerate(int $accelerate){
		$this->accelerate = $accelerate;
		return $this;
	}

	public function getAccelerate(){
		return $this->accelerate;
	}

	public function setReverse(int $reverse){
		$this->reverse = $reverse;
		return $this;
	}
	
	public function getReverse(){
		return $this->reverse;
	}

	public function setCol(int $col){
		$this->col = $col;
	}

	public function getCol(){
		return $this->col;
	}

	public function setRow(int $row){
		$this->row = $row;
	}

	public function getRow(){
		return $this->row;
	}
}