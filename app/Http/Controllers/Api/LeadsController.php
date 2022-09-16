<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactThankyouEmail;

class LeadsController extends Controller
{
    public function store(Request $request) {
        // Leggiamo i dati inviati
        $data = $request->all();

        // Validiamo i dati
        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max: 60000',
        ]);

        // Se la validazione fallisce
        if($validator->fails()) {
            // tornare json in ho success => false, 
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        // Salvo i dati nel db
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        // Inviamo mail di ringraziamento
        Mail::to($data['email'])->send(new ContactThankyouEmail());

        return response()->json([
            'success' => true
        ]);
    }
}