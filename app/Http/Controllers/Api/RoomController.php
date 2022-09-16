<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customers = Room::with('builders')->paginate(8);
            return response()->json($Customers, 200);
      die();
        try {
            $Customers = Room::with('builders')->paginate(8);
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

            $Room = Room::create([
                'name' => $request->name,
                'cover_image' => $request->cover_image,
                'description' => $request->description,
                'fk_building' => $request->fk_building,
               
            ]);
            die();
            return response()->json(Room::with('builders')->find($Room->id), 201);
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

            $room = Room::find($id);
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

            Room::find($id)->update([
                'name' => $request->name,
                'cover_image' => $request->cover_image,
                'description' => $request->description,
                'fk_building' => $request->fk_building,
            ]);

            return response()->json(Room::find($id), 200);
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

             Room::find($id)->delete();
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
