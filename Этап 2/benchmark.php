<?php
// Aлг. 1: Наивный (вложенные циклы)
function findPrimesNaive($n) {
    $primes = [];
    for ($i = 2; $i <= $n; $i++) {
        $isPrime = true;
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $isPrime = false;
                break;
            }
        }
        if ($isPrime) $primes[] = $i;
    }
    return $primes;
}

// Алг. 2: Решето Эратосфена
function findPrimesSieve($n) {
    $sieve = array_fill(0, $n + 1, true);
    $sieve[0] = $sieve[1] = false;
    
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($sieve[$i]) {
            for ($j = $i * $i; $j <= $n; $j += $i) {
                $sieve[$j] = false;
            }
        }
    }
    
    $primes = [];
    for ($i = 2; $i <= $n; $i++) {
        if ($sieve[$i]) $primes[] = $i;
    }
    return $primes;
}

// Замер времени
$N = 10000;
$iterations = 10;

echo "Тестирование до N = " . $N . "\n";
echo "Количество запусков: " . $iterations . "\n\n";

// Тест наивного алгоритма
$totalTime = 0;
for ($i = 0; $i < $iterations; $i++) {
    $start = microtime(true);
    findPrimesNaive($N);
    $end = microtime(true);
    $time = $end - $start;
    $totalTime += $time;
}
$avgNaive = $totalTime / $iterations;
echo "Наивный алгоритм: " . round($avgNaive, 6) . " сек.\n";

// Тест решета Эратосфена
$totalTime = 0;
for ($i = 0; $i < $iterations; $i++) {
    $start = microtime(true);
    findPrimesSieve($N);
    $end = microtime(true);
    $time = $end - $start;
    $totalTime += $time;
}
$avgSieve = $totalTime / $iterations;
echo "Решето Эратосфена: " . round($avgSieve, 6) . " сек.\n";

// Коэффициент ускорения
$speedup = $avgNaive / $avgSieve;
echo "\nКоэффициент ускорения: " . round($speedup, 2) . " раз\n";
echo "Второй алгоритм быстрее первого в " . round($speedup, 2) . " раза\n";