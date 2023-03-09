<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{   
    protected $fillable =['VotingCode','TransactionId','Votes'];
    use HasFactory;

    public function contestants(){

        return $this->belongsTo(Contestant::class,'VotingCode','VotingCode');
    }
    public function amounts(){

        return $this->hasOne(Payment::class,  'TransactionId')->onDelete('cascade');
    }
}
