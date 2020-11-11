<?php
require_once('vendor/autoload.php');

use Rubix\ML\Extractors\CSV;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Classifiers\NaiveBayes;
use Rubix\ML\Persisters\Filesystem;

ini_set('memory_limit', '-1');

$trainingData = new CSV('training.csv', true);
$trainingDataset = Labeled::fromIterator($trainingData);

$estimator = new NaiveBayes(2.5, [
    'yes' => 0.5,
    'no' => 0.5,
]);

echo "Modelo em treinamento..." . PHP_EOL;
$estimator -> train($trainingDataset);
echo "Modelo treinado" . PHP_EOL;

echo "Salvando modelo..." . PHP_EOL;
$persister = new Filesystem(__DIR__.'\estimator.model');
$persister->save($estimator);
echo "Modelo salvo" . PHP_EOL;