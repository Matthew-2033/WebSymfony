<?php


namespace App\Helpers\Chart;


class ChartFormat
{
    /**
     * @param array $data
     * @return json
     */
    static public function chartAvgGrease(array $data): string
    {
        $masculino = array_filter($data, function ($index){
            return $index['sex'] == 'MASCULINO';
        });

        dd($masculino);
    }
}