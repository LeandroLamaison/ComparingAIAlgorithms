<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Rubix\ML\Classifiers\RandomForest;
use Rubix\ML\Classifiers\ClassificationTree;

return function ($dataset) {

    ini_set('memory_limit', '-1');
    
    $estimator = new RandomForest(new ClassificationTree(10), 3, 0.1);
    
    echo 'Treinando...' .  PHP_EOL;
    
    $estimator->train($dataset);

    return $estimator;
};
