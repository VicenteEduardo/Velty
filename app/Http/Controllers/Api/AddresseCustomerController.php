<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddresseCustomer;
use Illuminate\Http\Request;

class AddresseCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $AddresseCustomers = AddresseCustomer::with('Customers')->OrderBy('CEP', 'asc')->paginate(8);
            return response()->json($AddresseCustomers, 200);
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

        $addresseCustomer=  AddresseCustomer::create([
                'cep'=>$request->cep,
                'logradouro'=>$request->logradouro,
                'number'=>$request->number,
                'Complement'=>$request->Complement,
                'City'=>$request->City,
                'uf'=>$request->uf,
                'fk_customer'=>$request->fk_customer,
                ] );
                return response()->json(AddresseCustomer::with('Customers')->find($addresseCustomer->id), 201);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register customer address"
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

            $AddresseCustomer=AddresseCustomer::with('Customers')->find($id);
                return  response()->json(($AddresseCustomer),200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Unable to register customer address"
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

          AddresseCustomer::find($id)->update([
                'cep'=>$request->cep,
                'logradouro'=>$request->logradouro,
                'number'=>$request->number,
                'Complement'=>$request->Complement,
                'City'=>$request->City,
                'uf'=>$request->uf,
                'fk_customer'=>$request->fk_customer,] );

                return response()->json(AddresseCustomer::find($id), 200);
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

            $Customer=AddresseCustomer::find($id)->delete();
            return response()->json([
                "message" => "data deleted successfully"
            ],200);
        } catch (\Throwable $th) {

            return response()->json([
                "message" => "Error updating data"
            ], 400);
        }
    }

}
