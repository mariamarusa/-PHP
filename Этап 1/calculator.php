<?php
function calculateDiscount($price, $percent) {
    
    if (!is_numeric($price) || !is_numeric($percent)) {
        throw new InvalidArgumentException("Цена и процент должны быть числами");
    }
    
    if ($price < 0) {
        throw new InvalidArgumentException("Цена не может быть отрицательной");
    }
    
    if ($percent < 0) {
        throw new InvalidArgumentException("Скидка не может быть отрицательной");
    }
    
    if ($percent > 100) {
        throw new InvalidArgumentException("Скидка не может превышать 100%");
    }
    
    $discountAmount = $price * ($percent / 100);
    $finalPrice = $price - $discountAmount;
    
    return $finalPrice;
}