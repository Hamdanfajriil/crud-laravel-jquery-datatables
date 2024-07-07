<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function dt()
    {
        $users = DB::table('users')
            ->select([
                'uuid as id',
                'name',
                'email',
                'nik'
            ])
            ->whereNull('deleted_at');

            // $users['nik']=bcrypt($users['nik']);

        return DataTables::query($users)->addIndexColumn()->make(true);
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
            $user = User::create([
                'name'  => $request->name,
                'email' => $request->email,
                'nik'   => $request->nik,
            ]);

            return response([
                "data"      => $user,
                "message"   => 'Data Tersimpan'
            ], 200);
        } catch (Exception $e) {
            return response([
                "message"=> $e->getMessage(),
            ], 500);
        }
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
            $user = User::where('uuid', $id)->update([
                'name'  => $request->name,
                'email' => $request->email,
                'nik'   => $request->nik,
            ]);

            return response([
                "data"      => $user,
                "message"   => 'Data Terubah'
            ], 200);
        } catch (Exception $e) {
            return response([
                "message"=> $e->getMessage(),
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
        try {
            $user = User::where('uuid', $id)->delete();

            return response([
                "message"   => 'Data Terhapus'
            ], 200);
        } catch (Exception $e) {
            return response([
                "message"=> $e->getMessage(),
            ], 500);
        }
    }
}
