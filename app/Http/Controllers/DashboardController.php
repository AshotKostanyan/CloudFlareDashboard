<?php

namespace App\Http\Controllers;

use App\Models\BlockIp;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use DateInterval;
use DatePeriod;
use MongoDB\BSON\UTCDateTime;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Monolog\Formatter\MongoDBFormatter;

class DashboardController extends Controller
{
    public function dashboard(string $LineChart = 'last week')
    {

        // $dateNow = Carbon::yesterday();
        // dd($dateNow->getTimestamp());
        // dd(BlockIp::all()->first()->created->format('Y-m-d'));
        return Inertia::render('Dashboard', [
            'dataset' => ColumnChartController::getdataset($LineChart),
            'IPS' => BlockIp::orderByDesc('created_at')->paginate(14),
        ]);
    }

    public function getElementById(string $id)
    {
        return Inertia::render('MoreInfo', [
            'Item' => BlockIp::where('_id', $id)->get(),
        ]);
    }
}
