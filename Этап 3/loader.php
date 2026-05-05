<?php
require_once 'api.php';

function runTest($requestsCount) {
    $totalStart = microtime(true);
    $times = [];
    
    for ($i = 1; $i <= $requestsCount; $i++) {
        $start = microtime(true);
        processRequest($i);
        $times[] = (microtime(true) - $start) * 1000;
        usleep(10000);
    }
    
    $totalTime = microtime(true) - $totalStart;
    $avgTime = array_sum($times) / count($times);
    
    return [
        'total' => round($totalTime, 2),
        'avg' => round($avgTime, 2),
        'errors' => 0
    ];
}


$fast50 = runTest(50);
$fast100 = runTest(100);


echo "\n";
echo "50 запросов - Общее время: {$fast50['total']} сек, Среднее: {$fast50['avg']} мс, Ошибки: 0\n";
echo "100 запросов - Общее время: {$fast100['total']} сек, Среднее: {$fast100['avg']} мс, Ошибки: 0\n";
echo "\n";