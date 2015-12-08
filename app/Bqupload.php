<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bqupload extends Model
{
	protected $table = 'bqupload';

    protected $fillable = ['data','timestamp'];
}
