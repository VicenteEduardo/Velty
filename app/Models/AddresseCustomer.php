<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddresseCustomer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'addresse_customers';

    protected $guarded = ['id'];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function Customers()
    {
        return $this->belongsTo(Customer::class, 'fk_customer');
    }
}
