<?php

namespace App\Http\Controllers;

use App\Models\SummaryBatam;
use App\Models\SummaryDeliserdang;
use App\Models\SummaryMedan;
use App\Models\SummaryPematangsiantar;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SummaryWilayah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $isidata = "";
        $bulan = strtolower(date("M"));
        $tahun = date("Y");
        if ($slug === "medan") {
            $isidata = new SummaryMedan;
            return view ('summary.index',[
                'main_menu' => 'dailyreport',
                'slug' => '/summary/medan',
                'datas' => $isidata->merge($tahun, $bulan),
                'title' => "Monitoring Medan",
                'wilayah' => 'medan',
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
        } elseif ($slug === "batam") {
            $isidata = new SummaryBatam;
            return view ('summary.index',[
                'main_menu' => 'dailyreport',
                'slug' => '/summary/batam',
                'datas' => $isidata->merge($tahun, $bulan),
                'title' => "Monitoring Batam",
                'wilayah' => 'batam',
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
        } elseif ($slug === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return view ('summary.index',[
                'main_menu' => 'dailyreport',
                'slug' => '/summary/deliserdang',
                'datas' => $isidata->merge($tahun, $bulan),
                'title' => "Monitoring Deliserdang",
                'wilayah' => 'deliserdang',
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
        } elseif ($slug === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return view ('summary.index',[
                'main_menu' => 'dailyreport',
                'slug' => '/summary/pematangsiantar',
                'datas' => $isidata->merge($tahun, $bulan),
                'title' => "Monitoring Pematangsiantar",
                'wilayah' => 'pematangsiantar',
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
    }

    public function EditMerchant($slug)
    {
        $arr = explode("|",$slug);
        $id = $arr[0];
        $nama = $arr[1];
        $status = $arr[2];
        $wilayah = $arr[3];

        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            return($isidata->EditMerchant($id,$status,$nama));
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            return($isidata->EditMerchant($id,$status,$nama));
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return($isidata->EditMerchant($id,$status,$nama));
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return($isidata->EditMerchant($id,$status,$nama));
        }
    }

    public function SummaryWilayah($slug)
    {
        $arr = explode("|",$slug);
        $year = $arr[0];
        $month = strtolower($arr[1]);
        $wilayah = $arr[2];

        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            return ($isidata->merge($year, $month));
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            return ($isidata->merge($year, $month));
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return ($isidata->merge($year, $month));
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return ($isidata->merge($year, $month));
        }
    }

    // Search By PMT
    public function SearchByPmt($slug)
    {
        $arr = explode("|", $slug);
        $pmt = $arr[0];
        $arr[1] === "" || empty($arr[1]) ? $year = date("Y") : $year = $arr[1];
        $arr[2] === "" || empty($arr[2]) ? $bulan = strtolower(date("M")) : $bulan = strtolower($arr[2]);
        $wilayah = $arr[3];
        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($pmt, $year, $bulan));
            } else {
                return ($isidata->merge($year, $bulan));
            }
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($pmt, $year, $bulan));
            } else {
                return ($isidata->merge($year, $bulan));
            }
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($pmt, $year, $bulan));
            } else {
                return ($isidata->merge($year, $bulan));
            }
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($pmt, $year, $bulan));
            } else {
                return ($isidata->merge($year, $bulan));
            }
        }
    }

    public function ExportToDoc($slug)
    {
        // param = tahun +"|"+ month + "|" + wilayah + "|" + perangkat;
        $arr = explode("|",$slug);
        $tahun = $arr[0];
        $bulan = strtolower($arr[1]);
        $wilayah = $arr[2];
        $perangkat = $arr[3];

        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        }
    }

    public function SimpanKeterangan($slug)
    {
        $arr = explode("|",$slug);
        $id = $arr[0];
        $keterangan = $arr[1];
        $tahun = $arr[2];
        $bulan = $arr[3];
        $wilayah = $arr[4];
        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan));
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan));
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan));
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan));
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
    public function store($slug)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr = explode("|",$id);
        $id = $arr[0];
        $year = $arr[1];
        $wilayah = $arr[2];
        
        if ($wilayah === "medan") {
            $DetailPerTanggal = new SummaryMedan;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "batam") {
            $DetailPerTanggal = new SummaryBatam;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "deliserdang") {
            $DetailPerTanggal = new SummaryDeliserdang;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "pematangsiantar") {
            $DetailPerTanggal = new SummaryPematangsiantar;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function edit(SummaryMedan $summaryMedan)
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
    public function update(Request $request, SummaryMedan $summaryMedan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SummaryMedan  $summaryMedan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SummaryMedan $summaryMedan)
    {
        //
    }
}
