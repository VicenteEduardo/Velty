<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AddresseCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Customers = Customer::with('AddresseCustomers')->OrderBy('fantasyName', 'asc')->paginate(8);
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

            $Customer=Customer::create([
                'socialReason'=>$request->socialReason,
                'fantasyName'=>$request->fantasyName,
                'cnpj'=>$request->cnpj,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'birthData'=>$request->birthData,] );

          AddresseCustomer::create([
                'cep'=>$request->cep,
                'logradouro'=>$request->logradouro,
                'number'=>$request->number,
                'Complement'=>$request->Complement,
                'City'=>$request->City,
                'uf'=>$request->uf,
                'fk_customer'=>$Customer->id,
                ] );
                return response()->json(Customer::with('AddresseCustomers')->find($Customer->id), 201);
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

            $Customer=Customer::with('AddresseCustomers')->find($id);
                return  response()->json(($Customer),200);
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

            $Customer=Customer::find($id)->update([
                'socialReason'=>$request->socialReason,
                'fantasyName'=>$request->fantasyName,
                'cnpj'=>$request->cnpj,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'birthData'=>$request->birthData,] );

                return response()->json(Customer::find($id), 200);
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

            $Customer=Customer::find($id)->delete();
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
