<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingAddres;

use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {

     

        try {

            $Buildings = Building::with('Customers')->OrderBy('name', 'asc')->paginate(8);
            return response()->json($Buildings, 200);
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

            $BuildingAddress = BuildingAddres::create([
                'cep' => $request->cep,
                'logradouro' => $request->logradouro,
                'number' => $request->number,
                'Complement' => $request->Complement,
                'City' => $request->City,
                'uf' => $request->uf,
                'url_map' => $request->url_map,
            ]);

            $Building =  Building::create([
                'name' => $request->name,
                'cover_image' => $request->cover_image,
                'description' => $request->description,
                'fk_customer' => $request->fk_customer,
                'fk_building_address' => $BuildingAddress->id,

            ]);

            return response()->json(Building::with('customers','buildingAddress')->find($Building->id), 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register Building"
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
            $building = Building::with('customers')->find($id);
            return  response()->json(($building), 200);
   
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register Building"
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

             Building::find($id)->update([
                'name' => $request->name,
                'cover_image' => $request->cover_image,
                'description' => $request->description,
                'fk_customer' => $request->fk_customer,
                'fk_building_address' => $request->fk_building_address,
            ]);

            return response()->json(Building::find($id), 200);
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

            Building::find($id)->delete();
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
