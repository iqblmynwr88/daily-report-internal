<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class ComunicationRestApiController extends Controller
{
    private $base_url;
    
    public function __construct()
    {
        $this->base_url = config('api.base_url');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {
            return view ('dataparsing.index',[
                'main_menu' => 'parsing',
                'slug' => '/parsing/'.$id,
                'title' => "Data Parsing",
                'wilayah' => $id,
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
            // if ($id === "medan") {
            //     return view ('dataparsing.index',[
            //         'main_menu' => 'parsing',
            //         'slug' => '/parsing/medan',
            //         'title' => "Data Parsing",
            //         'wilayah' => 'medan',
            //         'MDN_IS_ACTIVE' => config('setting.MDN_IS_ACTIVE'),
            //         'BTM_IS_ACTIVE' => config('setting.BTM_IS_ACTIVE'),
            //         'BGL_IS_ACTIVE' => config('setting.BGL_IS_ACTIVE'),
            //         'BJI_IS_ACTIVE' => config('setting.BJI_IS_ACTIVE'),
            //         'DLS_IS_ACTIVE' => config('setting.DLS_IS_ACTIVE'),
            //         'KRO_IS_ACTIVE' => config('setting.KRO_IS_ACTIVE'),
            //         'PKB_IS_ACTIVE' => config('setting.PKB_IS_ACTIVE'),
            //         'PMT_IS_ACTIVE' => config('setting.PMT_IS_ACTIVE'),
            //         'SMS_IS_ACTIVE' => config('setting.SMS_IS_ACTIVE'),
            //         'SML_IS_ACTIVE' => config('setting.SML_IS_ACTIVE'),
            //         'TJP_IS_ACTIVE' => config('setting.TJP_IS_ACTIVE'),
            //         'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
            //         'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
            //         'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
            //     ]);
            // } elseif ($id === "batam") {
            //     return view ('dataparsing.index',[
            //         'main_menu' => 'parsing',
            //         'slug' => '/parsing/batam',
            //         'title' => "Data Parsing",
            //         'wilayah' => 'batam',
            //         'MDN_IS_ACTIVE' => config('setting.MDN_IS_ACTIVE'),
            //         'BTM_IS_ACTIVE' => config('setting.BTM_IS_ACTIVE'),
            //         'BGL_IS_ACTIVE' => config('setting.BGL_IS_ACTIVE'),
            //         'BJI_IS_ACTIVE' => config('setting.BJI_IS_ACTIVE'),
            //         'DLS_IS_ACTIVE' => config('setting.DLS_IS_ACTIVE'),
            //         'KRO_IS_ACTIVE' => config('setting.KRO_IS_ACTIVE'),
            //         'PKB_IS_ACTIVE' => config('setting.PKB_IS_ACTIVE'),
            //         'PMT_IS_ACTIVE' => config('setting.PMT_IS_ACTIVE'),
            //         'SMS_IS_ACTIVE' => config('setting.SMS_IS_ACTIVE'),
            //         'SML_IS_ACTIVE' => config('setting.SML_IS_ACTIVE'),
            //         'TJP_IS_ACTIVE' => config('setting.TJP_IS_ACTIVE'),
            //         'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
            //         'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
            //         'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
            //     ]);
            // } elseif ($id === "pematangsiantar") {
            //     return view ('dataparsing.index',[
            //         'main_menu' => 'parsing',
            //         'slug' => '/parsing/pematangsiantar',
            //         'title' => "Data Parsing",
            //         'wilayah' => 'pematangsiantar',
            //         'MDN_IS_ACTIVE' => config('setting.MDN_IS_ACTIVE'),
            //         'BTM_IS_ACTIVE' => config('setting.BTM_IS_ACTIVE'),
            //         'BGL_IS_ACTIVE' => config('setting.BGL_IS_ACTIVE'),
            //         'BJI_IS_ACTIVE' => config('setting.BJI_IS_ACTIVE'),
            //         'DLS_IS_ACTIVE' => config('setting.DLS_IS_ACTIVE'),
            //         'KRO_IS_ACTIVE' => config('setting.KRO_IS_ACTIVE'),
            //         'PKB_IS_ACTIVE' => config('setting.PKB_IS_ACTIVE'),
            //         'PMT_IS_ACTIVE' => config('setting.PMT_IS_ACTIVE'),
            //         'SMS_IS_ACTIVE' => config('setting.SMS_IS_ACTIVE'),
            //         'SML_IS_ACTIVE' => config('setting.SML_IS_ACTIVE'),
            //         'TJP_IS_ACTIVE' => config('setting.TJP_IS_ACTIVE'),
            //         'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
            //         'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
            //         'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
            //     ]);
            // } elseif ($id === "deliserdang") {
            //     return view ('dataparsing.index',[
            //         'main_menu' => 'parsing',
            //         'slug' => '/parsing/deliserdang',
            //         'title' => "Data Parsing",
            //         'wilayah' => 'deliserdang',
            //         'MDN_IS_ACTIVE' => config('setting.MDN_IS_ACTIVE'),
            //         'BTM_IS_ACTIVE' => config('setting.BTM_IS_ACTIVE'),
            //         'BGL_IS_ACTIVE' => config('setting.BGL_IS_ACTIVE'),
            //         'BJI_IS_ACTIVE' => config('setting.BJI_IS_ACTIVE'),
            //         'DLS_IS_ACTIVE' => config('setting.DLS_IS_ACTIVE'),
            //         'KRO_IS_ACTIVE' => config('setting.KRO_IS_ACTIVE'),
            //         'PKB_IS_ACTIVE' => config('setting.PKB_IS_ACTIVE'),
            //         'PMT_IS_ACTIVE' => config('setting.PMT_IS_ACTIVE'),
            //         'SMS_IS_ACTIVE' => config('setting.SMS_IS_ACTIVE'),
            //         'SML_IS_ACTIVE' => config('setting.SML_IS_ACTIVE'),
            //         'TJP_IS_ACTIVE' => config('setting.TJP_IS_ACTIVE'),
            //         'LGT_IS_ACTIVE' => config('setting.LGT_IS_ACTIVE'),
            //         'LBB_IS_ACTIVE' => config('setting.LBB_IS_ACTIVE'),
            //         'ASA_IS_ACTIVE' => config('setting.ASA_IS_ACTIVE'),
            //     ]);
            // }
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
        }
    }

    public function UpdateKeteranganMerchant($slug)
    {
        $base_url = $this->base_url;
        try {
            $username = session()->get('username');
            $jenisuser = session()->get('jenis_user');
            // Get Param From Slug
            $arr = explode("|", $slug);
            $id = $arr[0];
            $merchantId = $arr[1];
            $device = $arr[2];
            $keterangan = $arr[3];
            $wilayah = $arr[4];
            $key = config('api.key');
            $auth = 'Bearer '.session()->get('token');
            // Send to API
            $result = Http::withHeaders([
                'key' => $key,
                'authorization' => $auth
            ])->post($base_url."Monitoring/PostKeterangan", [
                "username" => $username,
                "jenis_user" => $jenisuser,
                "wilayah" => $wilayah,
                "merchant_id" => $merchantId,
                "device_name" => $device,
                "id" => $id,
                "keterangan" => $keterangan
            ]);
            if ($result->status() === 200) {
                $pesan = $result['desc'];
                return $pesan;
            } else {
                $pesan = $result['desc'];
                return $pesan;
            }
        } catch (\Throwable $th) {

        }
    }

    public function GetAllDataParsing($slug)
    {
        $base_url = $this->base_url;
        try {
            $username = session()->get('username');
            $jenisuser = session()->get('jenis_user');
            $wilayah = $slug;
            if (is_null(request('search')['value'])) {
                if (request('start') === "0") {
                    $page = 1;
                } else {
                    $page = (strval(request('start')) / 10) + 1;
                }
                $lenght = strval(request('length')) * $page;
                $key = config('api.key');
                $auth = 'Bearer '.session()->get('token');
                $result = Http::withHeaders([
                    'key' => $key,
                    'Authorization' => $auth
                ])->post($base_url."Monitoring/GetAllDeviceUseGroupMerchant", [
                    "username" => $username,
                    "jenis_user" => $jenisuser,
                    "wilayah" => $wilayah,
                    "page" => strval(1),
                    "show_count" => strval($lenght)
                ]);
                if ($result->status() === 200) {
                    $data = $result['data']['details'];
                    return DataTables::of($data)->addIndexColumn()->setTotalRecords($result['data']['jml_page'])->make();
                } elseif ($result->status() === 401) {
                    return response([
                        'draw'            => 0,
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $result->status(),
                    ]);
                } else {
                    return response([
                        'draw'            => 0,
                        'recordsTotal'    => 0,
                        'recordsFiltered' => 0,
                        'data'            => [],
                        'error'           => $result['desc'],
                    ]);
                }
            } else {
                // Dilakukan apabila input search tidak kosong, dan akan mengirimkan ke API
                // Lakukan Request to REST API
                $key = config('api.key');
                $auth = config('api.authorization');
                $result = Http::withHeaders([
                    'key' => $key,
                    'authorization' => 'Bearer '. session()->get('token')
                ])->post($base_url."Monitoring/GetDeviceByMerchantName", [
                    "username" => $username,
                    "jenis_user" => $jenisuser,
                    "wilayah" => $wilayah,
                    "merchant_name" => request('search')['value'],
                ]);
                if ($result->status() === 200) {
                    $data = $result['data'];
                    return DataTables::of($data)->addIndexColumn()->make();
                } elseif ($result->status() === 401) {
                    return redirect('/');
                } else {
                    $pesan = $result['desc'];
                }
            }

            
        } catch (\Throwable $th) {
            return redirect('/');
            $pesan = $th->getMessage();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
