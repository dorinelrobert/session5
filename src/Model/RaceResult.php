<?php 

namespace App\Model;

class RaceResult {
	private $startRaceMessage;
	private $rounds;
	private $winner;

	public function setStartRaceMessage(string $startRaceMessage){
		$this->startRaceMessage = $startRaceMessage;
	}

	public function getStartRaceMessage(){
		return $this->startRaceMessage;
	}

	public function addRound(array $round){
		$this->rounds[] = $round;
	}

	public function getRounds(){
		return $this->rounds;
	}

	public function setWinner(array $winner){
		$this->winner = $winner;
	}

	public function getWinner(){
		return $this->winner;
	}
}