<?php
require_once __DIR__ . '/vendor/autoload.php';

use Rubix\ML\CrossValidation\Reports\AggregateReport;
use Rubix\ML\CrossValidation\Reports\ConfusionMatrix;
use Rubix\ML\CrossValidation\Reports\MulticlassBreakdown;

return function ($dataset, $estimatorData, $output) {
    $usage = new stdClass();

    ini_set('memory_limit', '-1');

    echo 'Fazendo predições...' . PHP_EOL;
    
    $predictions = $estimatorData -> estimator->predict($dataset->randomize());
    
    $report = new AggregateReport([
        new MulticlassBreakdown(),
        new ConfusionMatrix(),
    ]);
    
    $result = $report->generate($predictions, $dataset->labels());
    
    echo $result;

    $result->toJSON()->write("output/$output.json");
    $usage -> time = $estimatorData -> time;
    $usage -> mem_usage = $estimatorData -> mem_usage;
    $usage -> mem_peak = $estimatorData -> mem_peak;

    echo "Resultado salvo no arquivo $output.json" . PHP_EOL;

    return $usage;
};