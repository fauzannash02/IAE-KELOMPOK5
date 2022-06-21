<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transportasi;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\Mailer\Transport;

class TransportasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transportasi::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success',$data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
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
    public function store(Request $request){
        try {
            $request->validate([
                'IDTransportasi' => 'required',
                'IDRute' => 'required',
                'IDJadwal' => 'required',
                'IDClass' => 'required',
                'Armada' => 'required',
                'RutedanTujuan' => 'required',
                'JadwalKeberangkatan' => 'required',
                'JumlahSeat' => 'required',
                'TipeClass' => 'required',
                'Harga' => 'required'
            ]);

            $transportasi = Transportasi::create([
                'IDTransportasi' => $request->IDTransportasi,
                'IDRute' => $request->IDRute,
                'IDJadwal' => $request->IDJadwal,
                'IDClass' => $request->IDClass,
                'Armada' => $request->Armada,
                'RutedanTujuan' => $request->RutedanTujuan,
                'JadwalKeberangkatan' => $request->JadwalKeberangkatan,
                'JumlahSeat' => $request->JumlahSeat,
                'TipeClass' => $request->TipeClass,
                'Harga' => $request->Harga
            ]);

            $data = Transportasi::where('id', '=', $transportasi->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success',$data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transportasi::where('id','=',$id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success',$data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
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
        try {
            $request->validate([
                'IDTransportasi' => 'required',
                'IDRute' => 'required',
                'IDJadwal' => 'required',
                'IDClass' => 'required',
                'Armada' => 'required',
                'RutedanTujuan' => 'required',
                'JadwalKeberangkatan' => 'required',
                'JumlahSeat' => 'required',
                'TipeClass' => 'required',
                'Harga' => 'required'
            ]);

            $transportasi = Transportasi::findOrFail($id);

            $transportasi->update([
                'IDTransportasi' => $request->IDTransportasi,
                'IDRute' => $request->IDRute,
                'IDJadwal' => $request->IDJadwal,
                'IDClass' => $request->IDClass,
                'Armada' => $request->Armada,
                'RutedanTujuan' => $request->RutedanTujuan,
                'JadwalKeberangkatan' => $request->JadwalKeberangkatan,
                'JumlahSeat' => $request->JumlahSeat,
                'TipeClass' => $request->TipeClass,
                'Harga' => $request->Harga
            ]);

            $data = Transportasi::where('id', '=', $transportasi->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success',$data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $transportasi = Transportasi::findOrFail($id);
            
            $data = $transportasi->delete();
            
            if($data){
                return ApiFormatter::createApi(200, 'Success Destroy Data');
            }else{
                return ApiFormatter::createApi(400, 'Failed');
        }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
