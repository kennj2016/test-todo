<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Task extends Model
{
    public function user()
    {



        return $this->belongsTo(User::class, 'user_id');
    }

    public function getExpireDateAttribute() // notice that the attribute name is in CamelCase.
    {
        return Carbon::parse($this->expire_time)->format('Y-m-d\TH:i');
    }
    public function getStatusAttribute() // notice that the attribute name is in CamelCase.
    {
        return $this->is_completed ? 'Completed' : 'Pending';
    }
}
