<?php

require __DIR__ . '/vendor/autoload.php';

use Ratp\Api;

$line = new \Ratp\Line();
$line->setId('M8');

$station = new \Ratp\Station();
$station->setName('Daumesnil');
$station->setLine($line);

$direction = new \Ratp\Direction();
$direction->setSens('R');
$direction->setLine($line);

$mission = new \Ratp\MissionsNext($station, $direction);
$api     = new Api();

$result = $api->getMissionsNext($mission)->getReturn();

foreach ($result->getMissions() as $mission) {
    echo $mission->getStationsMessages()[0] . "\n";
}