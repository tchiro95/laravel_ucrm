<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;


class AnalysisService
{
    public static function PerDay($subQuery)
    {
        $subQuery->where('status', true)->groupBy('id')->selectRaw('id,SUM(subtotal) as totalPerPurchase, DATE_FORMAT(created_at,"%Y%m%d") as date');

        $data = DB::table($subQuery)->groupBy('date')->selectRaw('date,sum(totalPerPurchase) as total')->get();

        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }
    public static function PerMonth($subQuery)
    {
        $subQuery->where('status', true)->groupBy('id')->selectRaw('id,SUM(subtotal) as totalPerPurchase, DATE_FORMAT(created_at,"%Y%m") as date');

        $data = DB::table($subQuery)->groupBy('date')->selectRaw('date,sum(totalPerPurchase) as total')->get();

        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }
    public static function PerYear($subQuery)
    {
        $subQuery->where('status', true)->groupBy('id')->selectRaw('id,SUM(subtotal) as totalPerPurchase, DATE_FORMAT(created_at,"%Y") as date');

        $data = DB::table($subQuery)->groupBy('date')->selectRaw('date,sum(totalPerPurchase) as total')->get();

        $labels = $data->pluck('date');
        $totals = $data->pluck('total');

        return [$data, $labels, $totals];
    }
}
