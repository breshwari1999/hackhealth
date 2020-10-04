<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class useregistration extends Model
{
 protected $table="userreg";

 public function docs()
 {
   return $this->belongsToMany(doctorreg::class)->withTimestamps();
 }
}
