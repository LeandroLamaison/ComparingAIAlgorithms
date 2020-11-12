<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubix\ML\Classifiers\NaiveBayes;

return function ($dataset) {

    ini_set('memory_limit', '-1');
    
    $estimator = new NaiveBayes(5);
    
    echo 'Treinando...' .  PHP_EOL;
    
    $estimator->train($dataset);

    return $estimator;
};


