<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'project_id',
        'start_date',
        'due_date',
        'priority',
        'status',
        'developer_id'
    ];

    /**
     * Each task belongs too single developer
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'developer_id');
    }

    /** 
     * Each task belong to single project
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'project_id');
    }

}
