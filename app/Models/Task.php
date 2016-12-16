<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * 这些属性能被批量赋值。
     *
     * @var array
     */
    protected $fillable = ['name'];
}
