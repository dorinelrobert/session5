<?php

namespace App\Service;

class HTMLRaceOutput {
	public static function printStartRaceMessage(string $startRaceMessage){
		echo '<h3>'  . $startRaceMessage . '</h3>';
	}

	public static function printRounds(array $rounds){
		foreach($rounds as $round){
			echo '<h4>Round ' . $round['round'] . ' (' . $round['time'] . ')</h4>';
			echo '<ul>';
			foreach($round['cars'] as $car){
				echo '<li>' . $car['symbol'] . ' ' . $car['action']  . ' on column ' . $car['column']  . ' and now is on position ' . $car['row'] . '.</li>';
			}
			echo '</ul>';

		}
	}

	public static function printGameOver(array $winner){
		echo '<h4>Game Over</h4>';
		if(count($winner) > 1){
			echo '<p>It\'s a tie! The winners are: </p>';
			echo '</ul>';
			foreach($winner as $car){
				echo '<li>' . $car->getSymbol() . ' on column ' . $car->getCol() . '</li>';
			}
			echo '</ul>';
		} else {
			echo '<p>Winner: ' . $winner[0]->getSymbol() . ' on column ' . $winner[0]->getCol() . '</p>';
		}
	}

}