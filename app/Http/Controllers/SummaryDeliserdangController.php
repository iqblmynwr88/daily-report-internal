<?php

namespace App\Http\Controllers;

use App\Models\SummaryDeliserdang;
use Illuminate\Http\Request;

class SummaryDeliserdangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = strtolower(date("M"));
        $tahun = date("Y");
        $isidata = new SummaryDeliserdang;
        return view ('Summary.deliserdang',[
            'main_menu' => 'dailyreport',
            'slug' => '/summary/deliserdang',
            'datas' => $isidata->merge($tahun, $bulan),
            'pmt' => $isidata->getPerangkat_(),
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

    // SearchSummaryMedan
    public function SearchSummaryDeliserdang($slug)
    {
        $arr = explode("|",$slug);

        $year = $arr[0];
        $month = strtolower($arr[1]);
        $isidata = new SummaryDeliserdang;

        return ($isidata->merge($year, $month));
    }

    // Search By PMT
    public function SearchByPmtDeliserdang($slug)
    {
        $arr = explode("|", $slug);
        $pmt = $arr[0];
        $year = $arr[1];
        $bulan = strtolower($arr[2]);

        $isidata = new SummaryDeliserdang;
        if ($pmt <> "all") {
            return ($isidata->GetDataByPmt($pmt, $year, $bulan));
        } else {
            return ($isidata->merge($year, $bulan));
        }
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
     * @param  \App\Models\SummaryDeliserang  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr = explode("|",$id);

        // Pembagian isi parameter

        $year = date("Y");
        $id = $arr[0];
        $nop = $arr[1];
        $name = $arr[2];
        $tax = $arr[3];
        $address = $arr[4];
        $status = $arr[5];
        $information = $arr[6];
        $TrxMedan = new SummaryDeliserdang;
        $res = [
            'id' => $id,
            'nop' => $nop,
            'name' => $name,
            'tax' => $tax,
            'address' => $address,
            'status' => $status,
            'information' => $information,
            'datas' => $TrxMedan->trx($id, $year)
        ];

        return $res;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function edit(SummaryDeliserdang $summaryMedan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SummaryDeliserdang $summaryMedan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SummaryDeliserdang $summaryMedan)
    {
        //
    }
}
