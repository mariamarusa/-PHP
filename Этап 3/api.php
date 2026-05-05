<?php
function processRequest($id) {
   
   //  usleep(rand(10000, 50000)); // микросекунды (10-50 мс)
    
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
