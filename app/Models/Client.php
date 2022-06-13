<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'company',
        'company_website',
        'company_logo',
        'connect_by',
        'social_profile',
        'market_place_profile',
        'picture',
        'communication_medium',
        'communication_link',
        'date_of_birth',
        'gender',
        'user_id'
    ];


    /**
     * one client has multiple projects
     * One to Many relation
     */
    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'client_id');
    }
}
