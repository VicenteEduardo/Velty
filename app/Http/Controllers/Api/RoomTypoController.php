<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RoomTypo;
use Illuminate\Http\Request;

class RoomTypoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $Customers = RoomTypo::with('rooms')->paginate(8);
            return response()->json($Customers, 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to interpret a request. Check the syntax of the information sent."
            ], 400);
        }
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

            $roomTypo = RoomTypo::create([
                'name' => $request->name,
                'fk_room' => $request->fk_room,
                'descritpion' => $request->descritpion,


            ]);

            return response()->json(RoomTypo::with('rooms')->find($roomTypo->id), 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register customer"
            ], 400);
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
        try {

            $room = RoomTypo::with('rooms')->find($id);
            return  response()->json(($room), 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register customer"
            ], 400);
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

            RoomTypo::find($id)->update([
                'name' => $request->name,
                'fk_room' => $request->fk_room,
                'descritpion' => $request->descritpion,
            ]);

            return response()->json(RoomTypo::with('rooms')->find($id), 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Error updating data"
            ], 400);
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

            RoomTypo::find($id)->delete();
            return response()->json([
                "message" => "data deleted successfully"
            ], 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Error updating data"
            ], 400);
        }
    }
}
