<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::all();

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
                'nama_pelanggan' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'asal_daerah' => 'required',
                'no_hp' => 'required',
                'email' => 'required'
            ]);

            $pelanggan = Pelanggan::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'asal_daerah' => $request->asal_daerah,
                'no_hp' => $request->no_hp,
                'email' => $request->email
            ]);

            $data = Pelanggan::where('id','=',$pelanggan->id)->get();

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
        $data = Pelanggan::where('id','=',$id)->get();

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
                'nama_pelanggan' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'asal_daerah' => 'required',
                'no_hp' => 'required',
                'email' => 'required'
            ]);

            $pelanggan = Pelanggan::findOrfail($id);

            $pelanggan->update([
                'nama_pelanggan' => $request->nama_pelanggan,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'asal_daerah' => $request->asal_daerah,
                'no_hp' => $request->no_hp,
                'email' => $request->email
            ]);

            $data = Pelanggan::where('id','=',$pelanggan->id)->get();

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

            $pelanggan = Pelanggan::findOrfail($id);

            $data = $pelanggan->delete();

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
