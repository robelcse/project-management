<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'task_id',
        'remaining',
        'working_hour',
        'developer_id',
        'work_description'
    ];


    /**
     * Each taskprogress belongsto single developer
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'developer_id');
    }

    /**
     * Each taskprogress belongsto single project
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

    /**
     * Each taskprogress belongsto single task
     */
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'task_id');
    }
}
