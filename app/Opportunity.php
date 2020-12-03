<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //
    protected $guarded = ['id'];

    public function opportunityWasCreatedByUser()
    {
        return $this->belongsTo('App\User', 'createdByUserId', 'id');
    }

    public function opportunityBelongsToOrganiation()
    {
        return $this->belongsTo('App\Organisation', 'organisationId', 'id');
    }
}
