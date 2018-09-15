<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // Table name
 protected $table = 'posts';
 // Primary Key
 public $primaryKey = 'id';
 // Timestamps
 public $timestamps = true;

 public function user(){
   return $this->belongsTo('App\User');
 }
// Disable updated_at on create post
 public function setUpdatedAt($value)
   {
     return NULL;
   }

}
