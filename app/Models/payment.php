<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $fillable =['TransactionId','Usernumber','Amount'];
    use HasFactory;

    public function voter(){

        return $this->belongsTo(Vote::class,'TransactionId');
    }
}
