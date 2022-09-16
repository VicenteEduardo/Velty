<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'buildings';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

  
    public function customers()
    {
        return $this->belongsTo(Customer::class, 'fk_customer');
    }
}
