<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\hardware;
use App\network;
use App\newsoft;
use App\softclient;

class DashboardController extends Controller
{
    //
    public function index(Request $request)
	 {
        $tahun=$request->tahun;
        if (isset($tahun)){
            $thn=$tahun;
        } else{
            $thn='2020';
        }
        $tahun = $thn;

        $hardware = hardware::all();
        $network = network::all();
        $newsoft = newsoft::all();
        $softclient = softclient::all();

        $dataChart = array();
        $totalHardware = array();
        $totalNewSoft = array();
        $totalNetwork = array();
        $totalSoftClient = array();

        for($i = 1; $i < 13; $i++){
            $cariHardware = DB::table('hardware')->whereMonth('tgl_perbaikan', $i)->whereYear('tgl_perbaikan',$thn)->get();
            if(count($cariHardware) > 0){
                $hardwarePerBulan = count($cariHardware);
                array_push($totalHardware, $hardwarePerBulan);
            }else{
                array_push($totalHardware, 0);
            }

            $cariNewSoft = DB::table('newsofts')->whereMonth('tgl_ssoft', $i)->whereYear('tgl_ssoft',$thn)->get();
            if(count($cariNewSoft) > 0){
                $newSoftPerBulan = count($cariNewSoft);
                array_push($totalNewSoft, $newSoftPerBulan);
            }else{
                array_push($totalNewSoft, 0);
            }

            $cariNetwork = DB::table('networks')->whereMonth('tgl_mpemasangan', $i)->whereYear('tgl_mpemasangan',$thn)->get();
            if(count($cariNetwork) > 0){
                $networkPerBulan = count($cariNetwork);
                array_push($totalNetwork, $networkPerBulan);
            }else{
                array_push($totalNetwork, 0);
            }

            $cariSoftClient = DB::table('softclients')->whereMonth('tgl_ssoftclient', $i)->whereYear('tgl_ssoftclient',$thn)->get();
            if(count($cariSoftClient) > 0){
                $softClientPerBulan = count($cariSoftClient);
                array_push($totalSoftClient, $softClientPerBulan);
            }else{
                array_push($totalSoftClient, 0);
            }
        }

        // dd($totalHardware);

        $arrayHardware = array(
            'name' => 'Hardware',
            'data' => $totalHardware
        );
        array_push($dataChart, $arrayHardware);

        $arrayNetwork = array(
            'name' => 'Network',
            'data' => $totalNetwork
        );
        array_push($dataChart, $arrayNetwork);

        $arraySoftClient = array(
            'name' => 'Software Client',
            'data' => $totalSoftClient
        );
        array_push($dataChart, $arraySoftClient);

        $arrayNewSoft = array(
            'name' => 'Software Baru',
            'data' => $totalNewSoft
        );
        array_push($dataChart, $arrayNewSoft);

        return view('dashboard', compact('hardware','network','newsoft','softclient', 'dataChart','tahun'));
     }
   

}
