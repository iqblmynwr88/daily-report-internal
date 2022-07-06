<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SummaryMedan extends Model
{
    protected $connection = "dbmedan";
    protected $collection = "summaries";
    protected $local_key = "merchant._id";

    public function merge($tahun, $bulan)
    {
        $data_ = SummaryMedan::where('year',$tahun,true)->get();
        foreach ($data_ as $data) {
            $data2 = TransactionMedan::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
            foreach ($data2 as $sub2) {
                $isi[] = [
                    'id' => $data['merchant']['_id'],
                    'name' => $data['merchant']['name'],
                    'nop' => $data['merchant']['nop'],
                    'address' => $data['merchant']['address'],
                    'information' => $data['merchant']['information'],
                    'status' => $data['merchant']['status'],
                    'tax_category' => $data['merchant']['tax_category'],
                    'summaries' => $data[$bulan],
                    'perangkat' => $sub2['pmt'],
                    'bulan' => date("F",strtotime($bulan)),
                    'tahun' => $data['year']
                ];
            }
        }

        return $isi;
    }
    
    public function SimpanKeterangan($id, $keterangan, $tahun, $bulan)
    {   

        SummaryMedan::where('year',$tahun,true)->where('merchant._id',$id,true)->unset($bulan.'.'.'keterangan');
        SummaryMedan::where('year',$tahun,true)->where('merchant._id',$id,true)->push($bulan.'.'.'keterangan',$keterangan);
        
        $data_ = SummaryMedan::where('year',$tahun,true)->where('merchant._id',$id,true)->get();
        foreach ($data_ as $data) {
            $data2 = TransactionMedan::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
            foreach ($data2 as $sub2) {
                $isi[] = [
                    'id' => $data['merchant']['_id'],
                    'name' => $data['merchant']['name'],
                    'nop' => $data['merchant']['nop'],
                    'address' => $data['merchant']['address'],
                    'information' => $data['merchant']['information'],
                    'status' => $data['merchant']['status'],
                    'tax_category' => $data['merchant']['tax_category'],
                    'summaries' => $data[$bulan],
                    'perangkat' => $sub2['pmt'],
                    'bulan' => date("F",strtotime($bulan)),
                    'tahun' => $data['year']
                ];
            }
        }
        return $isi;
    }

    public function GetDataByPmt($pmt, $tahun, $bulan)
    {
        $data_ = SummaryMedan::where('year',$tahun,true)->get();
        foreach ($data_ as $data) {
            $data2 = TransactionMedan::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
            foreach ($data2 as $sub2) {
                if ($sub2['pmt'] === $pmt) {
                    $isi[] = [
                        'id' => $data['merchant']['_id'],
                        'name' => $data['merchant']['name'],
                        'nop' => $data['merchant']['nop'],
                        'address' => $data['merchant']['address'],
                        'information' => $data['merchant']['information'],
                        'status' => $data['merchant']['status'],
                        'tax_category' => $data['merchant']['tax_category'],
                        'summaries' => $data[$bulan],
                        'perangkat' => $sub2['pmt'],
                        'bulan' => date("F",strtotime($bulan)),
                        'tahun' => $data['year']
                    ];
                }
            }
        }
        return $isi;
    }

    public function trx($merchant, $year)
    {
        return SummaryMedan::where('merchant._id',$merchant,true)->where('year',$year,true)->get();
    }

    public function getPerangkat_()
    {
        return TransactionMedan::groupBy('pmt')->get(['pmt']);
    }

    function ObjectID($id)
    {
        return $id;
    }
}