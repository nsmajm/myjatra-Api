<?php

namespace App\Http\Controllers;

use App\Model\TermsModel;
use App\Model\UserTermsStatusModel;
use Illuminate\Http\Request;

class TermsController extends Controller
{
   public function activeTerms(){
       $terms = TermsModel::select('terms_id','terms_details')->where('status','1')->first();
       return response()->json($terms);
   }
   public function saveUserTermsStatus(Request $request){
       $terms = UserTermsStatusModel::where('user_id',auth()->user()->id)->where('terms_id',$request->terms_id)->first();
       if(!$terms){
           $termsModel = new UserTermsStatusModel();
           $termsModel->terms_id= $request->terms_id;
           $termsModel->user_id =auth()->user()->id;
           $termsModel->status ='1';
           $termsModel->save();
           return response()->json('user accept the terms and condition');
       }
       else{
           return response()->json('already_accepted');
       }
   }
}
