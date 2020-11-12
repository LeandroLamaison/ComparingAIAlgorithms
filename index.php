<?php

$createDatasets = require 'createDatasets.php';
$naiveBayes = require 'train/naiveBayes.php';
$randomForest = require 'train/randomForest.php';
$testPredictions = require 'test.php';

[$train, $test] = $createDatasets('rain');

$naiveBayesEstimator = $naiveBayes($train);
$testPredictions($test, $naiveBayesEstimator);

$randomForestEstimator = $randomForest($train);
$testPredictions($test, $randomForestEstimator);