<?php

namespace App;
use App\Traits\System\UsesUUID;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, UsesUUID, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }
	//settings
	public function settings() {
		return $this->hasMany('App\Models\UserSetting');
	}

	public function teacherProfile()
    {
        return $this->hasOne(TeacherProfile::class);
    }
	public function getSetting($name) {

		$setting = $this->settings()
			->where('user_id', $this->id)
			->where('name', $name)
			->first();

		if ($setting) {
			return $setting->value;
		}

		return null;

	}
	//organisation(s)
	public function organisations() {
		return $this->belongsToMany('App\Models\Organisation', 'pivot_organisation_users');
	}
	
	
	public function organisationGetCurrent() {

		$currentOrganisation = $this->getSetting('currentOrganisation');

		if (! $currentOrganisation) {
			$currentOrganisation = $this->organisations->first()->id;
		}

		return $currentOrganisation;

	}

	public function organisationSetCurrent($uuid) {

		if (! $this->organisations->contains($uuid)) {
			return false; //TODO - Log this!
		} else {
			return $this->putSetting('currentOrganisation', $uuid);
		}

	}

	public function getConfig() {

		$user = $this->only([
            'first_name',
            'last_name',
            'email'
        ]);

		$permissions = [];

        foreach ($this->permissions()->get()->pluck('name') as $permission) {

        	$camelizedKey = str_replace(' ', '', lcfirst(ucwords($permission, ' ')));

			$permissions[$camelizedKey] = true;

        }

		$payload = collect([
			'name' => [
				'first' => $user['first_name'],
				'last' => $user['last_name'],
			],
			'email' => $user['email'],
			
			'roles' => $this->roles()->get()->pluck('name'),
			'permissions' => $permissions
		]);

		return $payload;
	}
}
