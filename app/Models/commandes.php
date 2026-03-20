<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class commandes extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'date'];
    
    public function client()
    {
        return $this->belongsTo(clients::class);
    }

    public function details()
    {
        return $this->hasMany(details_commandes::class);
    }
}

