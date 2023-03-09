<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = ['Name','Description','Status'];
    use HasFactory;
    
    public function events(){

        return $this->hasMany(Event::class, 'Branch_id');
    }
    
    public static function boot(){
        parent::boot();

        static::deleting(function($Branch){
                 $Branch->events()->delete();
        });
    }
}
