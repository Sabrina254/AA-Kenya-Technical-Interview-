<?php

namespace App\Http\Controllers;

use App\Organisation;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class OrganisationController extends Controller
{

    public function landingPageForOrganiations(){


        $organisations = Organisation::all();
        return view('organisationLanding',['organisations'=>$organisations]);

    }

    public function addingAnOrganiation(Request $request){

        // return $request;
        $newOrgansiation = new Organisation();
        $newOrgansiation->createdByUserId = Auth::user()->id;
        $newOrgansiation->name =  $request->org_name;
        $newOrgansiation->description = $request->org_short_description;
        $newOrgansiation->location = $request->org_location;
        $newOrgansiation->address = $request->org_address;

        $newOrgansiation->save();

        Alert::success( $request->org_name.'  Has Successfully been Added .', '');
        // Alert::success('Success Title', 'Success Message');
        
        return back();


    }

    public function updateOrganisation(Request $request){        

        $organisations = Organisation::where('id',$request->org_id)->get();

        foreach ($organisations as $organisation) {
            $organisation->name = $request->org_name;
            $organisation->description = $request->org_description;
            $organisation->location = $request->org_location;
            $organisation->address = $request->org_address;

            $organisation->save();
            # code...
        }

        Alert::success('Organsiation Successfully Updated.', '');
        return back();

    }

    public function deletingAnOrganisation(Request $request){

        
        $organisations = Organisation::where('id',$request->idOfDeletingOrganisations)->get();

        foreach ($organisations as $organisation) {
            $organisation->delete();
            # code...
        }

        Alert::error('Organsiation Successfully Deleted.', '');
        return back();

    }
}
