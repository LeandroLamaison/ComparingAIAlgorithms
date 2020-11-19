<?php

$createDatasets = require 'createDatasets.php';
$naiveBayes = require 'train/naiveBayes.php';
$randomForest = require 'train/randomForest.php';
$testPredictions = require 'test.php';

$usage = new stdClass();

[$train, $test] = $createDatasets('rain');

echo "Rodando algoritmo NaiveBayes com dataset da chuva" . PHP_EOL;
$naiveBayesData = $naiveBayes($train);
$usage -> NaiveBayes_Rain = $testPredictions($test, $naiveBayesData, 'Rain-NaiveBayes');


echo "Rodando algoritmo RandomForest com dataset da chuva" . PHP_EOL;
$randomForestData = $randomForest($train);
$usage -> RandomForest_Rain = $testPredictions($test, $randomForestData, 'Rain-RandomForest');


[$train, $test] = $createDatasets('mushrooms');

echo "Rodando algoritmo NaiveBayes com dataset dos cogumelos" . PHP_EOL;
$naiveBayesData = $naiveBayes($train);
$usage -> NaiveBayes_Mushrooms = $testPredictions($test, $naiveBayesData, 'Mushrooms-NaiveBayes');

echo "Rodando algoritmo RandomForest com dataset dos cogumelos" . PHP_EOL;
$randomForestData = $randomForest($train);
$usage -> RandomForest_Mushrooms = $testPredictions($test, $randomForestData, 'Mushrooms-RandomForest');

$usageFile = fopen('output/usage.json', 'a');
ftruncate($usageFile, 0);
fwrite($usageFile, json_encode($usage));
fclose($usageFile);
?>
