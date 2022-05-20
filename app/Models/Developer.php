<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'social_profile',
        'market_place_profile',
        'date_of_birth',
        'skills',
        'gender',
        'picture',
        'communication_medium'
    ];


    /**
     * one developer has multiple task
     * One to Many relation
     */
    public function tasks()
    {
        return $this->hasMany(Task::class,'developer_id','developer_id');
    }

    /**
     * one developer can be assigned in multiple project
     * One to Many relation
     */
    public function projects()
    {
        return $this->hasMany(Project::class,'developer_id','developer_id');
    }
}
