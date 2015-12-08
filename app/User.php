<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use DB;

class User extends Model implements AuthenticatableContract,
									AuthorizableContract,
									CanResetPasswordContract
{
	use Authenticatable, Authorizable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'coached_by','app_start_date','who_set','study_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	protected $primaryKey = 'user_id';

	public function bqupload() {
		return $this->HasMany('App\Bqupload');
	}


	public static function valid_bquploads() {
		$bquploads = DB::select('
			SELECT 
				`users`.`user_id`,
				`bqupload`.`timestamp`
			FROM
				`users`
			INNER JOIN
				`bqupload`
			ON 
				`users`.`user_id` = `bqupload`.`user_id`
			GROUP BY 
				`users`.`user_id`,
				MONTH(`bqupload`.`timestamp`),
				YEAR(`bqupload`.`timestamp`)
			HAVING 
				COUNT(`users`.`user_id`) >= 4
			');
		return $bquploads;
	}
}
