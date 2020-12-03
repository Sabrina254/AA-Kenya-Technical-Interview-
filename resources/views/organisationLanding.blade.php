@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">All Organisations.</h3>
    <div style="text-align: right">
        
        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" type="button"> <i class="fa fa-plus"></i> Add Organisation.</button>               
</div>

<div role="dialog" tabindex="-1" class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-lg" role="document">
        <form action="/addingAnOrganiation" method="post">
            {{ csrf_field() }}
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center modal-title">Add Organiation.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <h5>Organisation Name :</h5>
                    </div>
                    <div class="col"><input type="text" required name="org_name" placeholder="Oranisation Name" /></div>
                </div>
                <div class="row" style="margin-top:2%;">
                    <div class="col">
                        <h5>Location :</h5>
                    </div>
                    <div class="col"><input type="text" name="org_location" required placeholder="Oranisation Location" /></div>
                </div>
                <div class="row" style="margin-top:2%;">
                    <div class="col">
                        <h5>Address :</h5>
                    </div>
                    <div class="col"><input type="text" name="org_address" required placeholder="Oranisation Address" /></div>
                </div>
                <div class="row" style="margin-top:2%;">
                    <div class="col">
                        <h5>Short Decription:</h5>
                    </div>
                    <div class="col"><textarea rows="3" cols="20" required name="org_short_description" class="form-control-lg"></textarea></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Save</button></div>
        </div>
    </form>
    </div>
</div>      
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            @if (count($organisations) < 1)
            <h3 style="text-align: center">There Are No Organisations Yet, Click Add Organisation.</h3>
            @else
            <h5 style="text-align: center;color:blue"> We Have : {{count($organisations)}} Organisations Registedred In Our Portal</h5>
            @foreach ($organisations as $organisation)
            <div class="card" style="margin-top: 1.5%;">
                <div class="card-header">{{$organisation->name}} 
                    <div style="display: inline; float:right;">
                        <div role="group" class="btn-group">
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="{{"#details".$organisation->id}}" type="button"><i class="fa fa-list-alt"></i>Details</button>

                            {{-- Modal For Details:  --}}
                            <div role="dialog" tabindex="-1" id="{{"details".$organisation->id}}" class="modal fade">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Details For:</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Name:</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$organisation->name}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Location:</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$organisation->location}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Decription:</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$organisation->description}}</h5>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Address:</h5>
                                                </div>
                                                <div class="col">
                                                    <h5>{{$organisation->address}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-info" type="button" data-dismiss="modal">Close</button></div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="{{"#edit".$organisation->id}}" type="button"><i class="fa fa-edit"></i>Edit</button>
                            
                            
                            <div role="dialog" tabindex="-1" id="{{"edit".$organisation->id}}"  class="modal fade">
                                <div class="modal-dialog modal-lg" role="document">
                                    <form action="/updateOrganisation" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="org_id" value="{{$organisation->id}}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Details For: {{$organisation->name}}</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                     
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Name:</h5>
                                                </div>
                                                <div class="col"><input type="text" name="org_name" required value="{{$organisation->name}}" /></div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Location:</h5>
                                                </div>
                                                <div class="col"><input type="text" value="{{$organisation->location}}" required name="org_location" /></div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Decription:</h5>
                                                </div>
                                                <div class="col"><textarea required name="org_description">{{$organisation->description}}</textarea></div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <h5>Address:</h5>
                                                </div>
                                                <div class="col"><input type="text" required value="{{$organisation->address}}" name="org_address" /></div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                            <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Update</button></div>                                    
                                    </div>
                                </form>
                                </div>
                            </div>


                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{"#delete".$organisation->id}}" type="button"><i class="fa fa-trash"></i>Delete</button>

                            <div role="dialog" tabindex="-1" id="{{"delete".$organisation->id}}" class="modal fade">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="text-center modal-title">Confirmation.</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <p><br />Are You Sure You Want To Delete: {{$organisation->name}}<br /><br /></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                            <form action="/deleteOrganisation" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="idOfDeletingOrganisations" value="{{$organisation->id}}"/>
                                            <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Yes</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>

                <div class="card-body">                   
                    <h4 style="text-align: center;">{{$organisation->name}}</h4>
                    <p>{{$organisation->description}}</p>

                    <br>
                    <span>Number Of Opportunities: {{count($organisation->oranisationHasManyOpportunities)}}</span>
                    <br>
                    <span>Created By: {{$organisation->organisationWasCreatedByUser->name}}</span>
                </div>
            </div>
            @endforeach
           
            @endif           
        </div>
    </div>
</div>
@endsection
