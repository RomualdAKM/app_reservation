<?php

namespace App\Http\Controllers;

use App\Models\Motivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MotivationController extends Controller
{
    public function create_motivation(Request $request){

        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'publication_date' => 'required|date|after_or_equal:today',
        ]);
    
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }
        $logo = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $logo = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path('images/motivation');
            $image->move($upload_path, $logo);
        } else {
            $logo = null;
        }

        $motivation = new Motivation();
       
        $motivation->text = $request->text;
        $motivation->publication_date = $request->publication_date;
        $motivation->status = 'Non Envoyer';
       
        $motivation->image = $logo; // Associez le nom du fichier

        $motivation->save();

        $response = [
            'success' => true,
            'message' => "motivation registered successfully"
        ];

        return response()->json($response, 200);

    }

    public function edit_motivation(Request $request,$id){

        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'publication_date' => 'required|date|after_or_equal:today',
        ]);
        
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 200);
        }
        $logo = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $logo = time() . '.' . $image->getClientOriginalExtension();
            $upload_path = public_path('images/motivation');
            $image->move($upload_path, $logo);
        } else {
            $logo = null;
        }

        $motivation =  Motivation::find($id);

        $motivation->text = $request->text;
        $motivation->publication_date = $request->publication_date;
        $motivation->status = 'Non Envoyer';
        
        $motivation->image = $logo; // Associez le nom du fichier

        $motivation->save();

        $response = [
            'success' => true,
            'message' => "motivation edit successfully"
        ];

        return response()->json($response, 200);

    }


    public function motivations(){

        $motivations = Motivation::all();
        
         return response()->json([
            'motivations' => $motivations
         ]);
    }

    public function get_motivation($id){

        $motivation = Motivation::find($id);

        return response()->json([
            'motivation' => $motivation
        ]);
    }


    public function delete_motivation($id){
       // dd($id);

        $motivation = Motivation::find($id);

        $motivation->delete();
    }
}
