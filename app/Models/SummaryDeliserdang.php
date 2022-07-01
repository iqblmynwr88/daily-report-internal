<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class SummaryDeliserdang extends Model
{
    protected $connection = "dbdeliserdang";
    protected $collection = "summaries";
    protected $local_key = "merchant._id";

    public function merge($tahun, $bulan)
    {
        $data_ = SummaryDeliserdang::where('year',$tahun,true)->get();
        foreach ($data_ as $data) {
            $data2 = TransactionDeliserdang::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
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
                    'bulan' => date("F",strtotime($bulan))
                ];
            }
        }
        return $isi;
    }

    public function GetDataByPmt($pmt, $tahun, $bulan)
    {
        $data_ = SummaryDeliserdang::where('year',$tahun,true)->get();
        foreach ($data_ as $data) {
            $data2 = TransactionDeliserdang::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
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
                        'bulan' => date("F",strtotime($bulan))
                    ];
                }
            }
        }
        return $isi;
    }

    public function trx($merchant, $year)
    {
        return SummaryDeliserdang::where('merchant._id',$merchant,true)->where('year',$year,true)->get();
    }

    public function getPerangkat_()
    {
        return TransactionDeliserdang::groupBy('pmt')->get(['pmt']);
    }
}
