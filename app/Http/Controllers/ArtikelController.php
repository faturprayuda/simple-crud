<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $artikel = Artikel::all();
            return response()->json([
                'data' => $artikel,
                'status' => 200
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'data' => [
                    'message' => $e->getMessage(),
                ],
                'status' => 500
            ], 500);
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

        try {
            $request->validate([
                'judul' => 'required',
                'deskripsi' => 'required',
                'user_id' => 'required',
                'kategori_id' => 'required',
            ]);

            Artikel::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'user_id' => $request->user_id,
                'kategori_id' => $request->kategori_id,
            ]);

            return response()->json([
                'data' => [
                    'message' => 'success'
                ],
                'status' => 200
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'data' => [
                    'message' => $e->getMessage(),
                ],
                'status' => 500
            ], 500);
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
        $artikel = Artikel::find($id);
        return response()->json([
            'data' => $artikel,
            'status' => 200
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
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
            $artikel = Artikel::find($id);

            Artikel::find($id)
                ->update([
                    'judul' => $request->judul ?? $artikel->judul,
                    'deskripsi' => $request->deskripsi ?? $artikel->deskripsi,
                    'user_id' => $request->user_id ?? $artikel->user_id,
                    'kategori_id' => $request->kategori_id ?? $artikel->kategori_id,
                ]);

            return response()->json([
                'data' => [
                    'message' => 'success'
                ],
                'status' => 200
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'data' => [
                    'message' => $e->getMessage(),
                ],
                'status' => 500
            ], 500);
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
        Artikel::find($id)->delete();
        return response()->json([
            'data' => [
                'message' => 'success'
            ],
            'status' => 200
        ], 200);
    }
}
