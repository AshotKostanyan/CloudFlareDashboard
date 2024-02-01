<?php

namespace App\Http\Controllers;

use App\Models\BlockIp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PieChartController extends Controller
{
    public static function getdataset(){
        $array = BlockIp::raw(function($collection)
        {
            return $collection->aggregate([
                [
                    '$group' => [
                        '_id' => '$info.country',
                        'count' => [
                            '$sum' => 1
                        ]
                    ]
                ]
            ]);
        });
        
        $dataset = iterator_to_array($array);
        usort($dataset, fn($a, $b) => $b->count - $a->count);
        return $dataset;
    }
}
