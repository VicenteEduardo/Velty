<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTypo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'room_typos';

    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->belongsTo(Room::class, 'fk_room');
    }
    protected $dates = ['deleted_at'];
}
