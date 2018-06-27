<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  // Only allow the task field to get updated via mass assignment
  protected $fillable = ["task", "completed"];
}
