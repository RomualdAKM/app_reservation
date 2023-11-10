<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function create_service(Request $request){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
    
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }
       

        $service = new Service();
       
        $service->nom = $request->nnomm;
        $service->prix = $request->prix;
        $service->description = $request->description;
        $service->image = $request->image;
      

        $service->save();

        $response = [
            'success' => true,
            'message' => "service registered successfully"
        ];

        return response()->json($response, 200);

    }
    public function edit_service(Request $request,$id){

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prix' => 'required',
        ]);
    
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }
       

        $service = Service::find($id);
       
        $service->nom = $request->nom;
        $service->prix = $request->prix;
      

        $service->save();

        $response = [
            'success' => true,
            'message' => "service registered successfully"
        ];

        return response()->json($response, 200);

    }

    public function services(){

        $services = Service::all();
        
         return response()->json([
            'services' => $services
         ]);
    }

    public function get_service($id){

        $service = Service::find($id);

        return response()->json([
            'service' => $service
        ]);

    }

    public function delete_service($id){
        // dd($id);
 
         $service = Service::find($id);
 
         $service->delete();
     }
}
