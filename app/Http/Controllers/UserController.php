<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $user = User::all();
            return response()->json([
                'data' => $user,
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
                'name' => 'required',
                'email' => 'required|unique:users,email'
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
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
        $user = User::find($id);
        return response()->json([
            'data' => $user,
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
                'nama' => 'required'
            ]);

            $user = User::find($id);

            User::find($id)
                ->update([
                    'name' => $request->nama ?? $user->name,
                    'email' => $request->email ?? $user->email,
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
        User::find($id)->delete();
        return response()->json([
            'data' => [
                'message' => 'success'
            ],
            'status' => 200
        ], 200);
    }
}
