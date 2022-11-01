<?php

namespace App\Http\Controllers;

use App\Models\DetailTrxBatam;
use App\Models\DetailTrxMedan;
use Illuminate\Http\Request;
use stdClass;

class UtilityController extends Controller
{
    //
    public function index()
    {
        return view('doubledata.index', [
            'title' => 'Utility Tools',
            'main_menu' => 'utility',
            'wilayah' => 'All',
            'slug' => '/doubledata',
            'pmt' => '',
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

    public function CekDoubleData($slug)
    {
        # code...
        $eee = '';
        if (request('search')['value'] == "") {
            return response([
                'draw'            => request('draw'),
                'recordsTotal'    => 0,
                'recordsFiltered' => 0,
                'data'            => [],
                'error'           => "Silahkan Pilih Wilayah, dan tanggal untuk data!",
            ]);
        } else {
            $t_search = explode("|",request('search')['value']);
            $code = $t_search[0];
            $wilayah = $t_search[1];
            $tgl_awal = $t_search[2];
            $tgl_akhir = $t_search[3];
            if ($code == 1 && $wilayah == "medan") {
                $isi = DetailTrxBatam::whereRaw(['trxDate' => ['$gt' => $tgl_awal, '$lt' => $tgl_akhir]],['$group' => ['_id' => 'trxId', 'tanggal' => ['first' => '$trxDate'], 'count' => ['$sum' => 1]]],true)->take(1)->get(['trxId','first','deviceId','count']);
                // $isi = DetailTrxMedan::raw(function ($collection) {
                //     $collection->aggregate (
                //         [
                //             ['$match' => ['trxDate' => ['$gt' => '2022-08-01', '$lt' => '2022-08-02']]],
                //             ['$group' => ['_id' => 'trxId', 'count' => ['$sum' => 1] ] ],
                //             ['$match' => ['count' => ['$gt' => 1 ] ] ]
                //         ]
                //     );
                // });
                dd($isi);
                return response([
                    'draw'            => request('draw'),
                    'recordsTotal'    => 0,
                    'recordsFiltered' => 0,
                    'data'            => [],
                    'error'           => $tgl_awal."-".$tgl_akhir,
                ]);
            } elseif ($code == 1 && $wilayah == "batam") {
                // $isi = DetailTrxBatam::whereRaw(['trxDate' => ['$gt' => $tgl_awal, '$lt' => $tgl_akhir]],['$group' => ['_id' => 'trxId', 'tanggal' => ['first' => '$trxDate'], 'deviceId' => ['$sum' => 1]]],true)->take(1)->get(['trxId','trxDate','deviceId']);
                $isi = DetailTrxBatam::raw(function ($collection) {
                    $collection->aggregate (
                        [
                            ['$match' => ['trxDate' => ['$gt' => '2022-10-01', '$lt' => '2022-10-02']]],
                            ['$group' => ['_id' => 'trxId', 'count' => ['$sum' => 1] ] ],
                            ['$match' => ['count' => ['$gt' => 1 ] ] ]
                        ]
                    );
                });
                dd($isi);
                return response([
                    'draw'            => request('draw'),
                    'recordsTotal'    => 0,
                    'recordsFiltered' => 0,
                    'data'            => [],
                    'error'           => "Silahkan Pilih Wilayah, dan tanggal untuk data!",
                ]);
            } elseif ($code == 1 && $wilayah == "karo") {
                return response([
                    'draw'            => request('draw'),
                    'recordsTotal'    => 0,
                    'recordsFiltered' => 0,
                    'data'            => [],
                    'error'           => "Silahkan Pilih Wilayah, dan tanggal untuk data!",
                ]);
            } elseif ($code == 1 && $wilayah == "karo") {
                return response([
                    'draw'            => request('draw'),
                    'recordsTotal'    => 0,
                    'recordsFiltered' => 0,
                    'data'            => [],
                    'error'           => "Silahkan Pilih Wilayah, dan tanggal untuk data!",
                ]);
            } elseif ($code == 0) {
                return response([
                    'draw'            => request('draw'),
                    'recordsTotal'    => 0,
                    'recordsFiltered' => 0,
                    'data'            => [],
                    'error'           => "Silahkan Pilih Wilayah, dan tanggal untuk data!",
                ]);
            }
        }
    }
}
