<?php

$createDatasets = require 'createDatasets.php';
$naiveBayes = require 'train/naiveBayes.php';
$randomForest = require 'train/randomForest.php';
$testPredictions = require 'test.php';


$durations = new stdClass();

[$train, $test] = $createDatasets('rain');

echo "Rodando algoritmo NaiveBayes com dataset da chuva" . PHP_EOL;
$initialTimeStamp = microtime(true);
$naiveBayesEstimator = $naiveBayes($train);
$testPredictions($test, $naiveBayesEstimator, 'Rain-NaiveBayes');
$durations -> NaiveBayesRain = microtime(true) - $initialTimeStamp;

echo "Rodando algoritmo RandomForest com dataset da chuva" . PHP_EOL;
$initialTimeStamp = microtime(true);
$randomForestEstimator = $randomForest($train);
$testPredictions($test, $randomForestEstimator, 'Rain-RandomForest');
$durations -> RandomForestRain = microtime(true) - $initialTimeStamp;


[$train, $test] = $createDatasets('mushrooms');

echo "Rodando algoritmo NaiveBayes com dataset dos cogumelos" . PHP_EOL;
$initialTimeStamp = microtime(true);
$naiveBayesEstimator = $naiveBayes($train);
$testPredictions($test, $naiveBayesEstimator, 'Mushrooms-NaiveBayes');
$durations -> NaiveBayesMushrooms = microtime(true) - $initialTimeStamp;

echo "Rodando algoritmo RandomForest com dataset dos cogumelos" . PHP_EOL;
$initialTimeStamp = microtime(true);
$randomForestEstimator = $randomForest($train);
$testPredictions($test, $randomForestEstimator, 'Mushrooms-RandomForest');
$durations -> RandomForestMushrooms = microtime(true) - $initialTimeStamp;

$durationsFile = fopen('output/durations.json', 'a');
ftruncate($durationsFile, 0);
fwrite($durationsFile, json_encode($durations));
fclose($durationsFile);
?>
