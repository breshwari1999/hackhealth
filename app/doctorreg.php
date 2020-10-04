<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctorreg extends Model
{
    protected $table="docreg";

    public function users()
    {
      return $this->belongsToMany(useregistration::class)->withTimestamps();
    }
}
