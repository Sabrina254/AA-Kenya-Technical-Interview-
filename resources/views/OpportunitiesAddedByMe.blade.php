@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">All Oportunities I Added.</h3>
    <div style="text-align: right">
        
        <button class="btn btn-success" data-toggle="modal" data-target="#addOpportunity" type="button"> <i class="fa fa-plus"></i> Add Opportunity.</button>               
    </div>
        <div role="dialog" tabindex="-1" id="addOpportunity" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="/addOpportunity" method="post">
                        @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Opportunity</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <h6>Name Of Poition :</h6>
                            </div>
                            <div class="col"><input type="text" name="pos_name" required /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Organiation :</h6>
                            </div>
                            <div class="col">
                                <select name="pos_org" required>
                                    @foreach ($allOrganisations as $allOrganisation)
                                    <option value="{{$allOrganisation->id}}">{{$allOrganisation->name}}</option>
                                    @endforeach
                                    
                                </select></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Description :</h6>
                            </div>
                            <div class="col"><textarea name="pos_des" required></textarea></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Salary :</h6>
                            </div>
                            <div class="col"><input type="number" required name="pos_salary" /></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <h6>Stage:</h6>
                            </div>
                            <div class="col"><select name="pos_stage" required>
                                <option value="Discovery" selected>Discovery</option>
                                <option value="Proposal shared">Proposal shared</option>
                                <option value="Negotiations">Negotiations</option>
                            </select></div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Save</button></div>
                </form>
                </div>
            </div>
        </div>

    <div class="row justify-content-center">
        
        @if (count($allopportunities) < 1)
        <h3 style="text-align: center">There Are No Opportunities Yet, Click Add  To Add.</h3>
        @else
        <h5 style="text-align: center;color:blue"> We Have : {{count($allopportunities)}} Opportunities That You Registedred In Our Portal</h5>
        @foreach ($allopportunities as $allopportunity)
        <div class="col-md-8" style="margin:1.2%">
            <div class="card">
                <div class="card-header">{{$allopportunity->name }}
                    <div style="float: right" role="group" class="btn-group">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="{{"#detailOpportunity".$allopportunity->id}}" type="button"><i class="fa fa-list-alt"></i>Details</button>

                        <div role="dialog" id="{{"detailOpportunity".$allopportunity->id}}" tabindex="-1" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Opportunity Details.</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <h6>Name Of Poition :</h6>
                                            </div>
                                            <div class="col">
                                                <h6>{{$allopportunity->name}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Organiation :</h6>
                                            </div>
                                            <div class="col">
                                                <h6>{{$allopportunity->opportunityBelongsToOrganiation->name}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Description :</h6>
                                            </div>
                                            <div class="col">
                                                <h6>{{$allopportunity->description}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Salary :</h6>
                                            </div>
                                            <div class="col">
                                                <h6>{{$allopportunity->salary}}</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Stage:</h6>
                                            </div>
                                            <div class="col">
                                                <h6>{{$allopportunity->stage}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-close"></i>Close</button><button class="btn btn-success" type="button"><i class="fa fa-check"></i>Save</button></div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="{{"#updateOpportunity".$allopportunity->id}}" type="button"><i class="fa fa-edit"></i>Edit</button>

                        {{-- EDIT MODAL. --}}

                        <div role="dialog" id="{{"updateOpportunity".$allopportunity->id}}" tabindex="-1" class="modal fade">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <form action="/updatePosition" method="post">
                                        @csrf
                                    
                                        <input type="hidden" name="pos_id" value="{{$allopportunity->id}}">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Opportunity</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <h6>Name Of Poition :</h6>
                                            </div>
                                            <div class="col"><input type="text" value="{{$allopportunity->name}}" name="pos_name" required /></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Organiation :</h6>
                                            </div>
                                            <div class="col">
                                                {{-- <select name="pos_org" required><option value="14">This is item 3</option></select> --}}
                                                <select name="pos_org" required>
                                                    @foreach ($allOrganisations as $allOrganisation)
                                                    <option value="{{$allOrganisation->id}}">{{$allOrganisation->name}}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Description :</h6>
                                            </div>
                                            <div class="col"><textarea name="pos_des" required> {{$allopportunity->description}}</textarea></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Salary :</h6>
                                            </div>
                                            <div class="col"><input type="number" required name="pos_salary"  value="{{$allopportunity->salary}}"/></div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Stage:</h6>
                                            </div>
                                            <div class="col"><select name="pos_stage" required><option value="Discovery" selected>Discovery</option><option value="Proposal shared">Proposal shared</option><option value="Negotiations">Negotiations</option></select></div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-close"></i>Close</button>
                                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Save</button></div>
                                </form>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{"#deleteOpportunity".$allopportunity->id}}" type="button"><i class="fa fa-trash"></i>Delete</button>

                        <div role="dialog" tabindex="-1" class="modal fade" id="{{"deleteOpportunity".$allopportunity->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-center modal-title">Confirmation.</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <p><br />Are You Sure You Want To Delete: <b>{{$allopportunity->name}}</b> <br /><br /></p>
                                    </div>
                                    <form action="/deleteOpportunity" method="post">
                                        @csrf
                                    <input type="hidden" value="{{$allopportunity->id}}" name="pos_id">
                                    <div class="modal-footer"><button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
                                        <button class="btn btn-success" type="submit"><i class="fa fa-check"></i>Yes</button></div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                   <h5 style="text-align: center;text-decoration:underline;">
                    {{$allopportunity->name}}
                    </h5> 
                   <h5 style="text-align: center;">Organiation: <b>{{$allopportunity->opportunityBelongsToOrganiation->name}}</b></h5>
<br>
                   <h5 style="text-align: center;color:blue;text-decoration:underline;">Job Description:</h5>
                   <h6 style="text-align: center">
                    {{$allopportunity->description}}
                   </h6>

                   <h5 style="text-align: center;color:blue;text-decoration:underline;">Salary:</h5>
                   <h6 style="text-align: center">
                    {{$allopportunity->salary." Ksh/="}}
                   </h6>

                   <h5 style="text-align: center;color:blue;text-decoration:underline;">Posted By:</h5>
                   <h6 style="text-align: center">
                    {{$allopportunity->opportunityWasCreatedByUser->name}}
                   </h6>

                   
                </div>
            </div>
        </div>
        @endforeach
        
        @endif

       
    </div>
</div>
@endsection
