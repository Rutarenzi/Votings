<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Swift_Events_CommandEvent;
use App\Models\Branch;
use App\Models\EventCategory;
class Event extends Model
{
    protected $fillable = ['Name','EventDate','Branch_id','Venue','Image','Status'];
    use HasFactory;

    public function branch(){

        return $this->belongsTo(Branch::class,'Branch_id');
    }
    public function eventCategory(){

        return $this->hasMany(EventCategory::class,'event_id');
    }
    public function contestants(){

        return $this->hasMany(Contestant::class, 'event_id');
    }

    public static function boot(){
        parent::boot();

        static::deleting(function($Event){
            
            // $Event->eventCategory()->delete();
            $Event->contestants()->delete();
        });

    }
}
