<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable = ['file'];

	protected $img_dir = '/images/';

    public function getFileAttribute($value){

    	return $this->img_dir . $value;

    }
}
