<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\tiket_transportasi;
use Exception;
use Illuminate\Http\Request;

class tiket_transportasi_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = tiket_transportasi::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success',$data);
        }else {
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
    public function store(Request $request)
    {
        try{
            $request->validate([
                'id_tiket' => 'required',
                'id_transportasi' => 'required',
                'nama_pelanggan' => 'required',
                'nomor_kursi' => 'required',
                'tanggal' => 'required',
                'asal_keberangkatan' => 'required',
                'tujuan_keberangkatan' => 'required',
            ]);

            $tiket_transportasi = tiket_transportasi::create([
                'id_tiket' => $request->id_tiket,
                'id_transportasi' => $request->id_transportasi,
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_kursi' => $request->nomor_kursi,
                'tanggal' => $request->tanggal,
                'asal_keberangkatan' => $request->asal_keberangkatan,
                'tujuan_keberangkatan' => $request->tujuan_keberangkatan,
            ]);

            $data = tiket_transportasi::where('id','=',$tiket_transportasi->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success',$data);
            }else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error){
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
        $data = tiket_transportasi::where('id','=', $id)->get();

        if($data){
            return ApiFormatter::createApi(200, 'Success',$data);
        }else {
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
        try{
            $request->validate([
                'id_tiket' => 'required',
                'id_transportasi' => 'required',
                'nama_pelanggan' => 'required',
                'nomor_kursi' => 'required',
                'tanggal' => 'required',
                'asal_keberangkatan' => 'required',
                'tujuan_keberangkatan' => 'required',
            ]);

            $tiket_transportasi = tiket_transportasi::findOrFail($id);

            $tiket_transportasi->update([
                'id_tiket' => $request->id_tiket,
                'id_transportasi' => $request->id_transportasi,
                'nama_pelanggan' => $request->nama_pelanggan,
                'nomor_kursi' => $request->nomor_kursi,
                'tanggal' => $request->tanggal,
                'asal_keberangkatan' => $request->asal_keberangkatan,
                'tujuan_keberangkatan' => $request->tujuan_keberangkatan,
            ]);

            $data = tiket_transportasi::where('id','=',$tiket_transportasi->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success',$data);
            }else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error){
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
            $tiket_transportasi = tiket_transportasi::findOrFail($id);

            $data = $tiket_transportasi->delete();
            
            if($data){
                return ApiFormatter::createApi(200, 'Success Destroy');
            }else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
