<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businessinformation;

class BusinessinformationController extends Controller
{
    public function editBusinessinformation(Request $request){
        $incomingFields = $request->validate([
            'business_name' => 'required',
            'description' => 'required',
            'address' => 'nullable',
            'website' => 'nullable'
        ]);

        $incomingFields['business_name']=strip_tags($incomingFields['business_name']);
        $incomingFields['description']=strip_tags($incomingFields['description']);
        $incomingFields['address']=strip_tags($incomingFields['address']);
        $incomingFields['website']=strip_tags($incomingFields['website']);
        $incomingFields['user_id'] = auth()->id();
        Businessinformation::create($incomingFields);
        return redirect('/smallbusiness/businessinformation');
    }
    
}