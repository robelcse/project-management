<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'description',
        'client_id',
        'developer_id',
        'budget',
        'start_date',
        'end_date',
        'technologies',
        'live_link',
        'demo_link',
        'git_link',
        'user_id'
    ];

    /**
     * Each project belongto single client
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    /**
     * Each project belongs to single developer
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'developer_id');
    }


    /**
     * Each project can have multiple tasks
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'project_id');
    }
}
