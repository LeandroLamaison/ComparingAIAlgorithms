<?php

$createDatasets = require 'createDatasets.php';
$naiveBayes = require 'train/naiveBayes.php';
$randomForest = require 'train/randomForest.php';
$testPredictions = require 'test.php';

[$train, $test] = $createDatasets('rain');

echo "Rodando algoritmo NaiveBayes com dataset da chuva" . PHP_EOL;
$naiveBayesEstimator = $naiveBayes($train);
$testPredictions($test, $naiveBayesEstimator, 'Rain-NaiveBayes');

echo "Rodando algoritmo RandomForest com dataset da chuva" . PHP_EOL;
$randomForestEstimator = $randomForest($train);
$testPredictions($test, $randomForestEstimator, 'Rain-RandomForest');