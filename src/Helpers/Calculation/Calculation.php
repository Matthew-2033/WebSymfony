<?php


namespace App\Helpers\Calculation;



class Calculation
{
    public static function regularPercentage($total, $value): float
    {
        $porcetage = ( $value / 100 ) * $total;
        return $porcetage;
    }


}