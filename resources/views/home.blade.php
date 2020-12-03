@extends('layouts.app')

@section('content')
<div class="container">
    <h3 style="text-align: center">All Oportunities Availbale.</h3>
    <div class="row justify-content-center">
        
        @if (count($allopportunities) < 1)
        <h3 style="text-align: center">There Are No Opportunities Yet, Click Add Opportunities Added To Add.</h3>
        @else
        <h5 style="text-align: center;color:blue"> We Have <b>{{count($allopportunities)}}</b>  Opportunities That You Registedred In Our Portal</h5>
        @foreach ($allopportunities as $allopportunity)
        <div class="col-md-8" style="margin:1.2%">
            <div class="card">
                <div class="card-header" style="background-color: #0A966B">
                    
                   <h5 style="text-align: center;">{{$allopportunity->name }}</h5> 

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
