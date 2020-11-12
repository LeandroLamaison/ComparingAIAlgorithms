<?php

require_once __DIR__ . '/vendor/autoload.php';

use Rubix\ML\Extractors\CSV;
use Rubix\ML\Datasets\Labeled;

return function ($name) {
    ini_set('memory_limit', '-1');
    
    echo 'Carregando dados para a memória...' . PHP_EOL;
    
    $dataset = Labeled::fromIterator(new CSV(__DIR__. "/datasets/$name.csv", true));
    
    $datasets = $dataset->stratifiedSplit(0.8);
    
    return $datasets;
};


