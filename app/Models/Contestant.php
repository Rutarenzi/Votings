<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventCategory;

class Contestant extends Model
{   
    protected $fillable = ['Name','event_id','event_category_id','VotingCode','image'];
    use HasFactory;

    public function event(){

        return $this->belongsTo(Event::class,'event_id');
    }

    public function eventCategory(){

        return $this->belongsToMany(EventCategory::class,'event_category_id');
    }

    public function votes(){

        return $this->hasMany(Vote::class,'VotingCode', 'VotingCode');
    }

    
}
