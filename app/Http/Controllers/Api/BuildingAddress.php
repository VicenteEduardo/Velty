<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BuildingAddres;
use Illuminate\Http\Request;

class BuildingAddress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $buildings = BuildingAddres::OrderBy('City', 'asc')->paginate(8);
            return response()->json($buildings, 200);
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
            $buildingAddres = BuildingAddres::create([
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'number' => $request->number,
                'Complement' => $request->Complement,
                'City' => $request->City,
                'uf' => $request->uf,
                'url_map' => $request->url_map,
            ]);
            return response()->json(($buildingAddres), 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register building Address"
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

            $Building = BuildingAddres::find($id);
            return  response()->json(($Building), 200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register  building Address"
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

            BuildingAddres::find($id)->update([
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'number' => $request->number,
                'Complement' => $request->Complement,
                'City' => $request->City,
                'uf' => $request->uf,
                'url_map' => $request->url_map,
           ]);

           return response()->json(BuildingAddres::find($id), 200);
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

            BuildingAddres::find($id)->delete();
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
