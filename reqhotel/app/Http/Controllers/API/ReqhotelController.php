<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Reqhotel;
use Exception;
use Illuminate\Http\Request;

class ReqhotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Reqhotel::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
        //
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
                'id_kamar' => 'required',
                'nama_kamar' => 'required',
                'fasilitas_kamar' => 'required',
                'harga_kamar' => 'required',
                'jumlah_kamar' => 'required'
            ]);

            $reqhotel = Reqhotel::create([
                'id_kamar' => $request->id_kamar,
                'nama_kamar' => $request->nama_kamar,
                'fasilitas_kamar' => $request->fasilitas_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar
                
            ]);
            $data = Reqhotel::where('id','=', $reqhotel->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch(Exception $error){
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        $data = Reqhotel::where('id','=', $id)->get();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }

        //
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
                'id_kamar' => 'required',
                'nama_kamar' => 'required',
                'fasilitas_kamar' => 'required',
                'harga_kamar' => 'required',
                'jumlah_kamar' => 'required'
            ]);

            $reqhotel = Reqhotel::findorfail($id);

            $reqhotel->update([
                'id_kamar' => $request->id_kamar,
                'nama_kamar' => $request->nama_kamar,
                'fasilitas_kamar' => $request->fasilitas_kamar,
                'harga_kamar' => $request->harga_kamar,
                'jumlah_kamar' => $request->jumlah_kamar
                
            ]);
            
            $data = Reqhotel::where('id','=', $reqhotel->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch(Exception $error){
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        try{
            $reqhotel = Reqhotel::findorfail($id);

            $data = $reqhotel->delete();
    
    
            if($data){
                return ApiFormatter::createApi(200, 'Success Destroy Data');
            }else{
                return ApiFormatter::createApi(400, 'Failed Destroy Data');
            }

        }catch (Exception $error){
            return ApiFormatter::createApi(400, 'Failed Destroy Data');
        }
        //
    }
}
