<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockIp;
use Carbon\Carbon;
use Doctrine\DBAL\Types\JsonType;

class RequestColumnChart extends Controller
{
    // add returned type #TODO
    public function getdataset(string $timeperiod)
    {
        switch ($timeperiod) {
            case 'last week':
                $ips = BlockIp::whereDate('updated_at', '>=', Carbon::now()->subDay())->get();
                break;
            case 'last year':
                //--
                break;
        }
    } 

    public function getcoutbyday(){

    }

    public function getcountbymount(){

    }

    public function getcountbyyear(){

    }
}
