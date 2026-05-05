<?php
function processRequest($id) {
    // Имитация задержки (10-50 мс для быстрого API)
   //  usleep(rand(10000, 50000)); // микросекунды (10-50 мс)
    
    // Для медленного API (150-200 мс) раскомментировать:
     usleep(rand(150000, 200000));
    
    return [
        'status' => 'success',
        'id' => $id,
        'data' => [
            'name' => 'User ' . $id,
            'timestamp' => date('Y-m-d H:i:s')
        ]
    ];
}