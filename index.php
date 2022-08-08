<?php

require 'vendor/autoload.php';

use App\Service\RaceManager;
use App\Service\CarLoader;
use App\Service\HTMLRaceOutput;

$carLoader 		= new CarLoader();
$raceManager 	= new RaceManager();

$cars = $carLoader->getCars();

/* @var RaceResult $raceResult */
$raceResult = $raceManager->race($cars); 

$HTMLRaceOutput = new HTMLRaceOutput();
$HTMLRaceOutput::printStartRaceMessage($raceResult->getStartRaceMessage());
$HTMLRaceOutput::printRounds($raceResult->getRounds());
$HTMLRaceOutput::printGameOver($raceResult->getWinner());