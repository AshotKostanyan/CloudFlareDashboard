<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use DateInterval;
use DatePeriod;
use Illuminate\Http\Request;
use App\Models\BlockIp;
use Carbon\Carbon;
use Doctrine\DBAL\Types\JsonType;
use Faker\Core\Number;

class ColumnChartController extends Controller
{
    // add returned type #TODO
    public static function getdataset(string $timeperiod)
    {
        switch ($timeperiod) {
            case 'last week':
                $dt = Carbon::now();
                $dt->hour = 0;
                $dt->minute = 0;
                $dt->second = 0;
                $dt = $dt->getTimestamp();
                $dayend = $dt + 86400;
                $array = [];
                for ($i = 0; $i < 7; $i++) {
                    $ips = BlockIp::whereBetween('updated', [$dt, $dayend])->get();
                    array_push($array, $ips);
                    (int)$dt -= 86400;
                    (int)$dayend -= 86400;
                }
                return [array_reverse(ColumnChartController::getcountbyday($array)), ColumnChartController::getlastweekdays()];
                break;
            case 'last year':
                $dt = Carbon::now();
                $dt->hour = 0;
                $dt->minute = 0;
                $dt->second = 0;
                $dt = $dt->getTimestamp();
                $dayend = $dt + 2626560;
                $array = [];
                for ($i = 0; $i < 12; $i++) {
                    $ips = BlockIp::whereBetween('updated', [$dt, $dayend])->get();
                    array_push($array, $ips);
                    (int)$dt -= 2626560;
                    (int)$dayend -= 2626560;
                }
                return [array_reverse(ColumnChartController::getcountbyyear($array)), ColumnChartController::getyearmounths()];
                break;
        }
    }

    public static function getcountbyday(array $array)
    {
        $arr = [];
        for($i = 0; $i < 7; ++$i){
            $dailycount = 0;
            foreach($array[$i] as $el){
                $dailycount+=$el->count;
            }
            array_push($arr, $dailycount);
        }
        return $arr;
    }

    public static function getcountbyyear(array $array)
    {
        $arr = [];
        for($i = 0; $i < 12; ++$i){
            $dailycount = 0;
            foreach($array[$i] as $el){
                $dailycount+=$el->count;
            }
            array_push($arr, $dailycount);
        }
        return $arr;
    }

    

    public static function getlastweekdays(){
        $now = new DateTime("6 days ago", new DateTimeZone('America/New_York'));
        $interval = new DateInterval('P1D'); // 1 Day interval
        $period = new DatePeriod($now, $interval, 7); // 7 Days
        $sale_data = array();
        foreach ($period as $day) {
            $key = $day->format('M d');
            array_push($sale_data, $key);
        }
        return $sale_data;
    }

    public static function getyearmounths(){
        // $period = new DatePeriod(Carbon::createFromTimestamp(+2626560)->toDateTime(), $interval, 12); // 7 Days
        $now = new DateTime('11 months ago');
        $interval = new DateInterval('P1M'); // 1 Day interval
        $period = new DatePeriod($now, $interval, 12); // 7 Days
        $sale_data = array();
        foreach ($period as $day) {
            $key = $day->format('M');
            array_push($sale_data, $key);
        }
        return $sale_data;
    }
}

