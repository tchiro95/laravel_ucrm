<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Services\AnalysisService;
use App\Services\DecileService;
use App\Services\RFMService;

class AnalysisController extends Controller
{
    //
    public function index(Request $request)
    {
        $subQuery = Order::betweenDate($request->startDate, $request->endDate);

        if ($request->type === "perDay") {
            // listは配列の値にそれぞれ代入していく。phpの機能
            list($data, $labels, $totals) = AnalysisService::PerDay($subQuery);
        }
        if ($request->type === "perMonth") {
            // listは配列の値にそれぞれ代入していく。phpの機能
            list($data, $labels, $totals) = AnalysisService::PerMonth($subQuery);
        }
        if ($request->type === "perYear") {
            // listは配列の値にそれぞれ代入していく。phpの機能
            list($data, $labels, $totals) = AnalysisService::PerYear($subQuery);
        }
        if ($request->type === "decile") {
            // listは配列の値にそれぞれ代入していく。phpの機能

            list($data, $labels, $totals) = DecileService::Decile($subQuery);
        }
        if ($request->type === "rfm") {
            // listは配列の値にそれぞれ代入していく。
            list($data, $totals, $eachCount) =
                RFMService::rfm($subQuery, $request->rfmPrms);
            return response()->json([
                'data' => $data,
                'type' => $request->type,
                'eachCount' => $eachCount,
                'totals' => $totals,
            ], Response::HTTP_OK);
        }

        return response()->json([
            'data' => $data,
            'type' => $request->type,
            'labels' => $labels,
            'totals' => $totals,
        ], Response::HTTP_OK);
    }
}
