<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use stdClass;

class SummaryAsahan extends Model
{
    protected $connection = "dbasahan";
    protected $collection = "summaries";

    public function DetailWilayah($id, $tanggal_awal, $tanggal_akhir)
    {
        $amt = 0;
        $tax = 0;
        $lembar = 0;
        $detail = TransactionAsahan::where('merchant._id',$id,true)->take(1)->get();
        foreach ($detail as $trxDet) {
            $trx = DetailTrxAsahan::where('idMerchant',$trxDet['merchant']['_id'])->whereRaw(['trxDate' => ['$gt' => $tanggal_awal, '$lt' => $tanggal_akhir],],true)->get();
            foreach ($trx as $res) {
                $lembar++;
                $amt += $res['trxAmount'];
                $tax += $res['trxTax'];
            }
        }
        return ($lembar."|".$amt."|".$tax);
    }
    
    public function merge($tahun, $bulan, $start, $length, $keyword)
    {
        try {
            if (empty($keyword) || $keyword === "") {
                $total = SummaryAsahan::where('year',$tahun,true)->groupBy('merchant')->get();
                $data_ = SummaryAsahan::where('year',$tahun,true)->orderBy('merchant.name', 'asc')->skip($start)->take($length)->get();
            } else {
                $total = SummaryAsahan::where('year',$tahun,true)->where('merchant.name','like','%'.$keyword.'%')->groupBy('merchant')->get();
                $data_ = SummaryAsahan::where('year',$tahun,true)->where('merchant.name','like','%'.$keyword.'%')->orderBy('merchant.name', 'asc')->skip($start)->take($length)->get();
            }
            foreach ($data_ as $data) {
                $data2 = TransactionAsahan::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
                foreach ($data2 as $sub2) {
                    $start++;
                    $isi[] = [
                        'id' => $data['merchant']['_id'],
                        'name' => $data['merchant']['name'],
                        'nop' => $data['merchant']['nop'],
                        'address' => $data['merchant']['address'],
                        'information' => $data['merchant']['information'],
                        'tax_category' => $data['merchant']['tax_category'],
                        'summaries' => [
                            'data' => $data[$bulan],
                            'status' => $data['merchant']['status'],
                        ],
                        'perangkat' => $sub2['pmt'],
                        'bulan' => date("F",strtotime($bulan)),
                        'tahun' => $data['year'],
                        'DT_RowIndex' => $start
                    ];
                }
            }
            $response = new stdClass();
            $response -> total = count($total);
            $response -> data = $isi;
            $response -> rc = "00";
            $response -> pesan = "Sukses";
            return json_encode($response);
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
            $response = new stdClass();
            $response -> total = 0;
            $response -> data = "";
            $response -> rc = "05";
            $response -> pesan = $pesan;
            return json_encode($response);
        }
    }
    
    public function SimpanKeterangan($id, $keterangan, $tahun, $bulan, $status, $nama)
    {   
        SummaryAsahan::where('year',$tahun,true)->where('merchant._id',$id,true)->unset($bulan.'.'.'keterangan');
        SummaryAsahan::where('year',$tahun,true)->where('merchant._id',$id,true)->push($bulan.'.'.'keterangan',$keterangan);
        MerchantAsahan::where('_id',$id,true)->where('name',$nama,true)->update(['status' => $status]);
        TransactionAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['merchant.status' => $status]);
        TransactionAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['status' => $status]);
        SummaryAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['merchant.status' => $status]);
        
    }

    public function GetDataByPmt($tahun, $bulan, $start, $length, $keyword)
    {
        try {
            if ($keyword === "all") {
                $data_ = SummaryAsahan::where('year',$tahun,true)->orderBy('merchant.name', 'asc')->skip($start)->take($length)->get();
                foreach ($data_ as $data) {
                    $total = SummaryAsahan::where('year',$tahun,true)->groupBy('merchant')->get();
                    $data2 = TransactionAsahan::where('merchant.name',$data['merchant']['name'])->take(1)->get();
                    foreach ($data2 as $sub2) {
                        $start++;
                        $isi[] = [
                            'id' => $data['merchant']['_id'],
                            'name' => $data['merchant']['name'],
                            'nop' => $data['merchant']['nop'],
                            'address' => $data['merchant']['address'],
                            'information' => $data['merchant']['information'],
                            'tax_category' => $data['merchant']['tax_category'],
                            'summaries' => [
                                'data' => $data[$bulan],
                                'status' => $data['merchant']['status'],
                            ],
                            'perangkat' => $sub2['pmt'],
                            'bulan' => date("F",strtotime($bulan)),
                            'tahun' => $data['year'],
                            'DT_RowIndex' => $start
                        ];
                    }
                }
            } else {
                $awal = TransactionAsahan::where('pmt',$keyword)->orderBy('merchant.name', 'asc')->groupBy('merchant')->skip($start)->take($length)->get();
                foreach ($awal as $dt_awal) {
                    $data_ = SummaryAsahan::where('year',$tahun)->where('merchant.name',$dt_awal['merchant']['name'])->orderBy('merchant.name', 'asc')->get();
                    foreach ($data_ as $data) {
                        $total = TransactionAsahan::where('pmt',$keyword)->groupBy('merchant')->get();
                        $data2 = TransactionAsahan::where('merchant.name',$data['merchant']['name'])->where('pmt',$keyword)->take(1)->get();
                        foreach ($data2 as $sub2) {
                            $start++;
                            $isi[] = [
                                'id' => $data['merchant']['_id'],
                                'name' => $data['merchant']['name'],
                                'nop' => $data['merchant']['nop'],
                                'address' => $data['merchant']['address'],
                                'information' => $data['merchant']['information'],
                                'tax_category' => $data['merchant']['tax_category'],
                                'summaries' => [
                                    'data' => $data[$bulan],
                                    'status' => $data['merchant']['status'],
                                ],
                                'perangkat' => $sub2['pmt'],
                                'bulan' => date("F",strtotime($bulan)),
                                'tahun' => $data['year'],
                                'DT_RowIndex' => $start
                            ];
                        }
                    }
                }
            }
            
            $response = new stdClass();
            $response -> total = count($total);
            $response -> data = $isi;
            $response -> rc = "00";
            $response -> pesan = "Sukses";
            return json_encode($response);
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
            $response = new stdClass();
            $response -> total = 0;
            $response -> data = "";
            $response -> rc = "05";
            $response -> pesan = $pesan;
            return json_encode($response);
        }
    }

    public function trx($merchant, $year)
    {
        return SummaryAsahan::where('merchant._id',$merchant,true)->where('year',$year,true)->orderBy('merchant.name', 'asc')->get();
    }

    public function getPerangkat_()
    {
        return TransactionAsahan::groupBy('pmt')->get(['pmt']);
    }

    public function EditMerchant($id, $keterangan, $tahun, $bulan, $status, $nama)
    {
        try {
            SummaryAsahan::where('year',$tahun,true)->where('merchant._id',$id,true)->unset($bulan.'.'.'keterangan');
            SummaryAsahan::where('year',$tahun,true)->where('merchant._id',$id,true)->push($bulan.'.'.'keterangan',$keterangan);
            MerchantAsahan::where('_id',$id,true)->where('name',$nama,true)->update(['status' => $status]);
            TransactionAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['merchant.status' => $status]);
            TransactionAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['status' => $status]);
            SummaryAsahan::where('merchant._id',$id,true)->where('merchant.name',$nama,true)->update(['merchant.status' => $status]);
            return "Proses update sukses, Terima kasih!";
        } catch (\Throwable $th) {
            $pesan = $th->getMessage();
            return $pesan;
        }
    }

    public function ExportData($tahun, $bulan, $perangkat , $wilayah)
    {
        $filename = ucwords($wilayah)."-".$perangkat."-".$bulan."-".$tahun.".xlsx";
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $no = 1;
        $start_awal = 6;

        $sheet->setCellValue('A1', 'REPORT WILAYAH '.strtoupper($wilayah));
        $spreadsheet->getActiveSheet()->mergeCells('A1:F1');
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        
        $sheet->setCellValue('A2', 'TAHUN '.$tahun." - BULAN ".strtoupper(date("F",strtotime($bulan))));
        $spreadsheet->getActiveSheet()->mergeCells('A2:F2');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 55 untuk kolom A5

        $sheet->setCellValue('A3', 'PERANGKAT '.strtoupper($perangkat));
        $spreadsheet->getActiveSheet()->mergeCells('A3:F3');
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(12); // Set font size 55 untuk kolom A5

        $sheet->setCellValue('A5', 'No.');
        $sheet->setCellValue('B5', 'Merchant');
        $sheet->setCellValue('C5', 'Tax Category');
        $sheet->setCellValue('D5', 'Perangkat');
        $sheet->setCellValue('E5', 'Keterangan');
        $sheet->setCellValue('F5', 'Total Amount');

        $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('A5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('A5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('A5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getStyle('B5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('B5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('B5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('B5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('B5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('B5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getStyle('C5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('C5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('C5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('C5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('C5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('C5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getStyle('D5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('D5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('D5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('D5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('D5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('D5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getStyle('E5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('E5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('E5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('E5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('E5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('E5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setBold(TRUE); // Set bold kolom A5
        $spreadsheet->getActiveSheet()->getStyle('F5')->getFont()->setSize(12); // Set font size 55 untuk kolom A5
        $spreadsheet->getActiveSheet()->getStyle('F5')->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('F5')->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('F5')->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $spreadsheet->getActiveSheet()->getStyle('F5')->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40); // Set width kolom B
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(60); // Set width kolom E
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E

        if ($perangkat === "all") {
            $data_ = SummaryAsahan::where('year',$tahun,true)->where('merchant.status',1,true)->orderBy('merchant.name', 'asc')->get();
            foreach ($data_ as $data) {
                count($data[$bulan]) <> "3" ? $keterangan = "-" : $keterangan = $data[$bulan]['keterangan'][0];
                $sheet->setCellValue('A'.$start_awal, $no);
                $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                $sheet->setCellValue('B'.$start_awal, $data['merchant']['name']);
                $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                $sheet->setCellValue('C'.$start_awal, $data['merchant']['tax_category']);
                $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                $data2 = TransactionAsahan::where('merchant.name',$data['merchant']['name'],true)->take(1)->get();
                foreach ($data2 as $sub2) {
                    $sheet->setCellValue('D'.$start_awal, $sub2['pmt']);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                    $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                }
                $sheet->setCellValue('E'.$start_awal, $keterangan);
                $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                $sheet->setCellValue('F'.$start_awal, "Rp ".number_format($data[$bulan]['total']));
                $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                
                $no = $no + 1;
                $start_awal = $start_awal + 1;
            }
        } else {
            $data_ = SummaryAsahan::where('year',$tahun,true)->where('merchant.status',1,true)->orderBy('merchant.name','asc')->get();
            foreach ($data_ as $data) {
                count($data[$bulan]) <> "3" ? $keterangan = "-" : $keterangan = $data[$bulan]['keterangan'][0];
                
                $data2 = TransactionAsahan::where('merchant.name',$data['merchant']['name'],true)->where('pmt',$perangkat)->take(1)->get();
                foreach ($data2 as $sub2) {
                    if ($sub2['pmt'] === $perangkat) {
                        $sheet->setCellValue('A'.$start_awal, $no);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('A'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                        $sheet->setCellValue('B'.$start_awal, $data['merchant']['name']);
                        $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('B'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                        $sheet->setCellValue('C'.$start_awal, $data['merchant']['tax_category']);
                        $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('C'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                        $sheet->setCellValue('D'.$start_awal, $sub2['pmt']);
                        $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('D'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                        $sheet->setCellValue('E'.$start_awal, $keterangan);
                        $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('E'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    
                        $sheet->setCellValue('F'.$start_awal, "Rp ".number_format($data[$bulan]['total']));
                        $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        $spreadsheet->getActiveSheet()->getStyle('F'.$start_awal)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                        
                        $no = $no + 1;
                        $start_awal = $start_awal + 1;
                    }
                }
                
            }
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save($filename);

        return $filename;
    }
}
