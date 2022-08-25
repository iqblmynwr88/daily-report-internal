<?php

namespace App\Http\Controllers;

use App\Models\SummaryAsahan;
use App\Models\SummaryBatam;
use App\Models\SummaryDeliserdang;
use App\Models\SummaryKaro;
use App\Models\SummaryLabuanbatu;
use App\Models\SummaryLangkat;
use App\Models\SummaryMedan;
use App\Models\SummaryPematangsiantar;
use Illuminate\Http\Request;

class SummaryWilayah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        try {
            $isidata = "";
            $bulan = strtolower(date("M"));
            $tahun = date("Y");
            $start = request('start');
            $length = request('length');
            $keyword = "";
            
            if ($slug === "medan") {
                $isidata = new SummaryMedan;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/medan',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "batam") {
                $isidata = new SummaryBatam;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/batam',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "deliserdang") {
                $isidata = new SummaryDeliserdang;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/deliserdang',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "pematangsiantar") {
                $isidata = new SummaryPematangsiantar;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/pematangsiantar',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "karo") {
                $isidata = new SummaryKaro;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/karo',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
                    'title' => "Monitoring Karo",
                    'wilayah' => 'karo',
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "langkat") {
                $isidata = new SummaryLangkat;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/langkat',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
                    'title' => "Monitoring Langkat",
                    'wilayah' => 'langkat',
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "labuanbatu") {
                $isidata = new SummaryLabuanbatu;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/labuanbatu',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
                    'title' => "Monitoring Labuanbatu",
                    'wilayah' => 'labuanbatu',
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            } elseif ($slug === "asahan") {
                $isidata = new SummaryAsahan;
                return view ('summary.index',[
                    'main_menu' => 'dailyreport',
                    'slug' => '/summary/asahan',
                    'datas' => $isidata->merge($tahun, $bulan, $start, $length, $keyword),
                    'title' => "Monitoring Asahan",
                    'wilayah' => 'asahan',
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
                    'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
                    'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
                    'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
                ]);
            }
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
        }
    }

    public function EditMerchant($slug)
    {
        $arr = explode("|",$slug);
        $id = $arr[0];
        $nama = $arr[1];
        $tahun = $arr[2];
        $bulan = $arr[3];
        $keterangan = $arr[4];
        $status = $arr[5];
        $wilayah = $arr[6];

        try {
            if ($wilayah === "medan") {
                $isidata = new SummaryMedan;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "batam") {
                $isidata = new SummaryBatam;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "deliserdang") {
                $isidata = new SummaryDeliserdang;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "pematangsiantar") {
                $isidata = new SummaryPematangsiantar;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "karo") {
                $isidata = new SummaryKaro;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "langkat") {
                $isidata = new SummaryLangkat;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "labuanbatu") {
                $isidata = new SummaryLabuanbatu;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            } elseif ($wilayah === "asahan") {
                $isidata = new SummaryAsahan;
                return($isidata->EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama));
            }
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
            return $pesan;
        }
    }

    public function SummaryWilayah($slug)
    {
        $arr = explode("|",$slug);
        $year = $arr[0];
        $month = strtolower($arr[1]);
        $wilayah = $arr[2];
        $start = request('start');
        $length = request('length');

        // Extract request search
        $t_search = explode("|",request('search')['value']);
        
        if (count($t_search) === 2) {
            if ($t_search[1] === "nothing") {
                $keyword = "";
            } else {
                $keyword = $t_search[1];
            }
        } elseif (count($t_search) === 3) {
            $year = $t_search[1];
            $month = $t_search[2];
            $keyword = "";
        } elseif (count($t_search) === 4) {
            $year = $t_search[1];
            $month = $t_search[2];
            $keyword = $t_search[3];
        } else {
            $keyword = "";
        }
        
        try {
            if ($wilayah === "medan") {
                $isidata = new SummaryMedan;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "batam") {
                $isidata = new SummaryBatam;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "deliserdang") {
                $isidata = new SummaryDeliserdang;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "pematangsiantar") {
                $isidata = new SummaryPematangsiantar;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "karo") {
                $isidata = new SummaryKaro;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "langkat") {
                $isidata = new SummaryLangkat;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "labuanbatu") {
                $isidata = new SummaryLabuanbatu;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            } elseif ($wilayah === "asahan") {
                $isidata = new SummaryAsahan;
                if (count($t_search) === 4) {
                    $data = $isidata->GetDataByPmt($year, $month, $start, $length, $keyword);
                } else {
                    $data = $isidata->merge($year, $month, $start, $length, $keyword);
                }
                $isi = json_decode($data);
                if ($isi->rc === "00") {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => intval($isi->total),
                        'recordsFiltered' => intval($isi->total),
                        'data'            => $isi->data,
                        'error'           => $isi->pesan,
                    ]);
                } else {
                    return response([
                        'draw'            => request('draw'),
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $isi->pesan,
                    ]);
                }
            }
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
            return response([
                'draw'            => request('draw'),
                'recordsTotal'    => 0,
                'recordsFiltered' => 0,
                'data'            => [],
                'error'           => $pesan,
            ]);
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
        $start = request('start');
        $length = request('length');
        
        if (is_null(request('search')['value'])) {
            $keyword = "";
        } else {
            $keyword = request('search')['value'];
        }

        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "karo") {
            $isidata = new SummaryKaro;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "langkat") {
            $isidata = new SummaryLangkat;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "labuanbatu") {
            $isidata = new SummaryLabuanbatu;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
            }
        } elseif ($wilayah === "asahan") {
            $isidata = new SummaryAsahan;
            if ($pmt <> "all" || $pmt === "" || empty($pmt)) {
                return ($isidata->GetDataByPmt($year, $bulan, $start, $length, $keyword));
            } else {
                return ($isidata->merge($year, $bulan, $start, $length, $keyword));
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
        } elseif ($wilayah === "karo") {
            $isidata = new SummaryKaro;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "langkat") {
            $isidata = new SummaryLangkat;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "labuanbatu") {
            $isidata = new SummaryLabuanbatu;
            return($isidata->ExportData($tahun, $bulan, $perangkat, $wilayah));
        } elseif ($wilayah === "asahan") {
            $isidata = new SummaryAsahan;
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
        $status = "";
        $nama = "";

        if ($wilayah === "medan") {
            $isidata = new SummaryMedan;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "batam") {
            $isidata = new SummaryBatam;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "deliserdang") {
            $isidata = new SummaryDeliserdang;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "pematangsiantar") {
            $isidata = new SummaryPematangsiantar;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "karo") {
            $isidata = new SummaryKaro;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "labuanbatu") {
            $isidata = new SummaryLabuanbatu;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "langkat") {
            $isidata = new SummaryLangkat;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
        } elseif ($wilayah === "asahan") {
            $isidata = new SummaryAsahan;
            return ($isidata->SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama));
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
        } elseif ($wilayah === "karo") {
            $DetailPerTanggal = new SummaryKaro;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "labuanbatu") {
            $DetailPerTanggal = new SummaryLabuanbatu;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "langkat") {
            $DetailPerTanggal = new SummaryLangkat;
            $res = [
                'datas' => $DetailPerTanggal->trx($id, $year)
            ];
            return $res;
        } elseif ($wilayah === "asahan") {
            $DetailPerTanggal = new SummaryAsahan;
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
