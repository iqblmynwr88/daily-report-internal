<?php

namespace App\Http\Controllers;

use App\Models\SummaryReport;
use Illuminate\Http\Request;



class SummaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $isidata = SummaryReport::where('year','2022',true)->get();
        return view('dashboard.main-dashboard',[
            'main_menu' => 'dashboard',
            'title' => 'Dashboard Monitoring',
            'datas' => $isidata,
            'slug' => '/',
            'wilayah' => "",
            'MDN_IS_ACTIVE' => config('setting.MDN_IS_ACTIVE'),
            'BTM_IS_ACTIVE' => config('setting.BTM_IS_ACTIVE'),
            'BGL_IS_ACTIVE' => config('setting.BGL_IS_ACTIVE'),
            'BJI_IS_ACTIVE' => config('setting.BJI_IS_ACTIVE'),
            'DLS_IS_ACTIVE' => config('setting.DLS_IS_ACTIVE'),
            'KRO_IS_ACTIVE' => config('setting.KRO_IS_ACTIVE'),
            'PKB_IS_ACTIVE' => config('setting.PKB_IS_ACTIVE'),
            'PMT_IS_ACTIVE' => config('setting.PMT_IS_ACTIVE'),
            'SMS_IS_ACTIVE' => config('setting.SMS_IS_ACTIVE'),
            'SML_IS_ACTIVE' => config('setting.SML_IS_ACTIVE'),
            'TJP_IS_ACTIVE' => config('setting.TJP_IS_ACTIVE'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SummaryReport  $summaryReport
     * @return \Illuminate\Http\Response
     */
    public function show(SummaryReport $summaryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SummaryReport  $summaryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SummaryReport $summaryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SummaryReport  $summaryReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SummaryReport $summaryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SummaryReport  $summaryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SummaryReport $summaryReport)
    {
        //
    }
}
