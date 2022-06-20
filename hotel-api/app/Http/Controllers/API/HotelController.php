<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Hotel::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
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
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nama_kamar' => 'required',
                'gambar_kamar' => 'required',
                'fasilitas_kamar' => 'required',
                'harga_kamar' => 'required',
                'jumlah_kamar' => 'required',
                'tanggal_check_in' => 'required',
                'tanggal_check_out' => 'required',
            ]);

            $hotel = Hotel::create([
                'nama_kamar' => $request->nama_kamar,
                'gambar_kamar' => $request->gambar_kamar,
                'fasilitas_kamar' => $request->fasilitas_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
                'tanggal_check_in' => $request->tanggal_check_in,
                'tanggal_check_out' => $request->tanggal_check_out,
            ]);

            $data = Hotel::where('id','=',$hotel->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else{
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
        $data = Hotel::where('id','=',$id)->get();

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
                'nama_kamar' => 'required',
                'gambar_kamar' => 'required',
                'fasilitas_kamar' => 'required',
                'harga_kamar' => 'required',
                'jumlah_kamar' => 'required',
                'tanggal_check_in' => 'required',
                'tanggal_check_out' => 'required'
            ]);

            $hotel = Hotel::findOrfail($id);

            $hotel->update([
                'nama_kamar' => $request->nama_kamar,
                'gambar_kamar' => $request->gambar_kamar,
                'fasilitas_kamar' => $request->fasilitas_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar,
                'tanggal_check_in' => $request->tanggal_check_in,
                'tanggal_check_out' => $request->tanggal_check_out
            ]);

            $data = Hotel::where('id','=',$hotel->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success',$data);
            }else{
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
        try{

            $hotel = Hotel::findOrfail($id);

            $data = $hotel->delete();

            if($data){
                return ApiFormatter::createApi(200, 'Success Destroy data');
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error){
        return ApiFormatter::createApi(400,'Failed');
        }
    }
}
