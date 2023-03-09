<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Contestant;
class EventCategory extends Model
{
    protected $fillable =['Name','event_id'];
    use HasFactory;

    public function eventer(){

        return $this->belongsTo(Event::class,'event_id');
    }

    public function contestants(){

        return $this->hasMany(Contestant::class,'event_category_id');
    }

}
