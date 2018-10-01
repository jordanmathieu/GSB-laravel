<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    // TABLE NAME: Laravel is expecting etat
    protected $table = "Etats";

    // PRIMARY_KEY TYPE: Laravel is expecting an int, autoincrement
    public $incrementing = false;
    protected $keyType = "string";

    // TIMESTAMPS: Laravel is expecting created_at and updated_at
    public $timestamps = false;
}
