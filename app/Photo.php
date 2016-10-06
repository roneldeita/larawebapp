<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $fillable = ['file'];

	protected $user_img_dir = '/images/users_photo/';

    public function getFileAttribute($value){

    	return $this->user_img_dir . $value;

    }
}
