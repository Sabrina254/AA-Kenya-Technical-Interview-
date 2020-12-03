<?php

namespace App\Http\Controllers;

use App\Opportunity;
use Illuminate\Http\Request;
use Auth;
use App\Organisation;
use RealRashid\SweetAlert\Facades\Alert;
class OpportunityController extends Controller
{
  
    public function apportunitiesAddedByMe(){

        $userId = Auth::user()->id; 

        $allopportunities = Opportunity::where('createdByUserId',$userId)->get();
        $allOrganisations = Organisation::all();

        // foreach ($allopportunities as $allopportunity) {

        //     # code...
        // }

        return view('OpportunitiesAddedByMe',['allopportunities'=>$allopportunities,'allOrganisations'=>$allOrganisations]);
    }

    public function addOpportunity(Request $request){

        $newOpportunity = new Opportunity();
        
        $newOpportunity->createdByUserId = Auth::user()->id;
        $newOpportunity->organisationId  = $request->pos_org;
        $newOpportunity->name            = $request->pos_name;
        $newOpportunity->description     = $request->pos_des;
        $newOpportunity->salary          = $request->pos_salary;
        $newOpportunity->stage = $request->pos_stage;

        $newOpportunity->save();
        
        Alert::success( '  Opportunity Successfully been Added .', '');                
        return back();

    }

    public function updateOpportunity(Request $request){

        $opportunities = Opportunity::where('id',$request->pos_id)->get();

        foreach ($opportunities as $opportunity) {

            $opportunity->organisationId  = $request->pos_org;
            $opportunity->name            = $request->pos_name;
            $opportunity->description     = $request->pos_des;
            $opportunity->salary          = $request->pos_salary;
            $opportunity->stage = $request->pos_stage;

        $opportunity->save();
            # code...
        }
        
        Alert::success( '  Opportunity Successfully been Updated .', '');                
        return back();

    }

    public function deleteOpportunity(Request $request){

        $opportunities = Opportunity::where('id',$request->pos_id)->get();

        foreach ($opportunities as $opportunity) {                   

                $opportunity->delete();
                    # code...
                }
        
        Alert::success( '  Opportunity Successfully been Deleted .', '');                
        return back();
    }
}
