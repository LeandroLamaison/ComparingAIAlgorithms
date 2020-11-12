<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rubix\ML\CrossValidation\Reports\AggregateReport;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;

return function ($dataset, $estimator) {

    ini_set('memory_limit', '-1');

    echo 'Fazendo as predições...' . PHP_EOL;
    
    $predictions = $estimator->predict($dataset->randomize());
    
    $report = new AggregateReport([
        new MulticlassBreakdown(),
        new ConfusionMatrix(),
    ]);
    
    $result = $report->generate($predictions, $dataset->labels());
    
    echo $result;
    
    $result->toJSON()->write('output/report.json');
    
    echo 'Resultado salvo no arquivo report.json' . PHP_EOL;
};