<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $kategori = Kategori::all();
            return response()->json([
                'data' => $kategori,
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
                'kategori' => 'required',
            ]);

            Kategori::create([
                'jenis_kategori' => $request->kategori,
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
        $kategori = Kategori::find($id);
        return response()->json([
            'data' => $kategori,
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
            $request->validate([
                'kategori' => 'required'
            ]);

            $kategori = Kategori::find($id);

            Kategori::find($id)
                ->update([
                    'jenis_kategori' => $request->kategori ?? $kategori->jenis_kategori,
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
        Kategori::find($id)->delete();
        return response()->json([
            'data' => [
                'message' => 'success'
            ],
            'status' => 200
        ], 200);
    }
}
