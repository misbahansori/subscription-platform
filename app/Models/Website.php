<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;

    /**
     * Get the relation of the subscribed users.
     */
    public function subscribers()
    {
        return $this->hasMany(Subscribers::class);
    }
}
