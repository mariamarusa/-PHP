<?php
require_once 'calculator.php';

function runTest($name, $callback) {
    try {
        $callback();
        echo " Тест '{$name}' пройден.\n";
    } catch (Exception $e) {
        echo " Тест '{$name}' провален: " . $e->getMessage() . "\n";
    }
}


// Тест 1: Положительный тест (скидка 10%)
runTest('Скидка 10% на 1000 руб.', function() {
    $result = calculateDiscount(1000, 10);
    if ($result !== 900.0) {
        throw new Exception("Ожидалось 900, получено {$result}");
    }
});


// Тест 2: Негативный тест (отрицательная скидка)
runTest('Отрицательная скидка (должна вызвать исключение)', function() {
    calculateDiscount(1000, -5);
    throw new Exception("Ожидалось исключение, но функция выполнилась");
});

// Тест 3: Негативный тест (скидка больше 100%)
runTest('Скидка 150% (должна вызвать исключение)', function() {
    calculateDiscount(1000, 150);
    throw new Exception("Ожидалось исключение, но функция выполнилась");
});

// Тест 4: Негативный тест (отрицательная цена)
runTest('Отрицательная цена (должна вызвать исключение)', function() {
    calculateDiscount(-500, 10);
    throw new Exception("Ожидалось исключение, но функция выполнилась");
});

// Тест 5: Негативный тест (некорректные типы данных)
runTest('Строковые значения (должны вызвать исключение)', function() {
    calculateDiscount("abc", "def");
    throw new Exception("Ожидалось исключение, но функция выполнилась");
});

