<?php 

namespace App\Service;

use App\Model\RaceResult;
use App\Model\AbstractCar;

class RaceManager {
	private $raceResult;
	private $maxRounds = 10;
	private $rows = 10;
	private $cols = 3;

	const DATE_FORMAT = 'Y-m-j';
	const TIME_FORMAT = 'h:i:sa';

	public function __construct(){
		$this->raceResult = new RaceResult;
	}

	public function setMaxRounds(int $maxRounds){
		$this->maxRounds = $maxRounds;
		return $this;
	}

	public function getMaxRounds(){
		return $this->maxRounds;
	}

	public function setRows(int $rows){
		$this->rows = $rows;
		return $this;
	}

	public function getRows(){
		return $this->rows;
	}

	public function setCols(int $cols){
		$this->cols = $cols;
		return $this;
	}

	public function getCols(){
		return $this->cols;
	}

	private function determineRandomCarMovement(AbstractCar $car){
		return rand(1, 100) <= 50 ? $car->getAccelerate() : $car->getReverse() * -1;
	}

	private function moveCar(AbstractCar $car, int $carMove){
		$currentRow = $car->getRow();
		$newRow = $currentRow + $carMove;

		if($newRow < 0 ){
			$newRow = 0;
		} elseif ($newRow > 10) {
			$newRow = 10;
		}

		$car->setRow($newRow);
	}


	private function addCars(array $cars){
		foreach($cars as $key => $car){
			if($key + 1 > $this->getCols()){
				throw new \Exception('Too many cars.' . 'Race can start with only ' . $this->getCols() . ' cars.');
			}

			$car->setCol($key + 1);
			$this->cars[] = $car;	
		}
	}

	private function getCarsAtFinishLine(){
		return array_values(array_filter($this->cars, function($car){
			return $car->getRow() == $this->getRows();
		}));
	}

	private function getLeadingCars(){
		$max = array_reduce($this->cars, function($max, $value) {
    		if ($value->getRow() > $max) {
        		$max = $value->getRow();
     		}

		    return $max;
		});

		return array_values(array_filter($this->cars, function($car) use ($max) {
			return $car->getRow() == $max;
		}));
	}

	public function race(array $cars){
		$this->addCars($cars);
		$this->raceResult->setStartRaceMessage('The race started on the date '. date(self::DATE_FORMAT));

		for($i = 1; $i <= $this->getMaxRounds(); $i++){
			//sleep(1)

			$roundData['round'] = $i;
			$roundData['time'] 	= date(self::TIME_FORMAT);
			$roundData['cars'] 	= [];

			foreach($this->cars as $car){
				$carMove = $this->determineRandomCarMovement($car);
				$this->moveCar($car, $carMove);

				$roundData['cars'][] = [
					'symbol' => $car->getSymbol(),
					'action' => $carMove >= 0 ? 'accelerate' : 'reverse',
					'column' => $car->getCol(),
					'row' => $car->getRow()
				];	
			}

			$this->raceResult->addRound($roundData);
			$getCarsAtFinishLine = $this->getCarsAtFinishLine();

			if(count($getCarsAtFinishLine)){
				$this->raceResult->setWinner($getCarsAtFinishLine);
				return $this->raceResult;	
			}
			
		}

		$winner = $this->getLeadingCars();

		$this->raceResult->setWinner($winner);
		return $this->raceResult;
	}
}