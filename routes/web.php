<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/organisations','OrganisationController@landingPageForOrganiations')->name('organisations');

Route::post('/addingAnOrganiation','OrganisationController@addingAnOrganiation');

Route::post('/updateOrganisation','OrganisationController@updateOrganisation');

Route::post('/deleteOrganisation','OrganisationController@deletingAnOrganisation');

Route::get('/opportunitiesPostedByMe','OpportunityController@apportunitiesAddedByMe');

Route::post('/addOpportunity','OpportunityController@addOpportunity');

Route::post('/updatePosition','OpportunityController@updateOpportunity');

Route::post('/deleteOpportunity','OpportunityController@deleteOpportunity');





