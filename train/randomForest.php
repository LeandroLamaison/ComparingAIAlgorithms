<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Classifiers\ClassificationTree;

return function ($dataset) {

    ini_set('memory_limit', '-1');

    $data = new stdClass();
    
    $data -> estimator = new RandomForest(new ClassificationTree(10), 3, 0.1);
    
    echo 'Treinando...' .  PHP_EOL;
    
    $data -> estimator->train($dataset);

    $data -> mem_usage = memory_get_usage();
    $data -> mem_peak = memory_get_peak_usage();

    return $data;
};
