<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Get list of task
     * 
     * @return Array of task
     */
    public function getAllTask()
    {
        $tasks = Task::with('developer')->orderBy('task_id', 'desc')->get();
        return view('Task.index', compact('tasks'));
    }

    /**
     * View page for create task
     * 
     * @return \Illuminate\Http\View
     */
    public function createTask()
    {
        $developers = Developer::orderBy('developer_id', 'desc')->get();
        $projects = Project::orderBy('project_id', 'desc')->get();
        return view('Task.create', compact('developers', 'projects'));
    }

    /**
     * Store task information
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     */
    public function storeTask(Request $request)
    {
        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'start_date'   => 'required',
            'due_date'     => 'required',
            'priority'     => 'required',
            'developer_id' => 'required',
            'project_id' => 'required'
        ]);

        $task = Task::create($request->all());
        return redirect()->route('task.index')->with('success', 'Task created successfully.');
    }

    /**
     * Show task information for edit
     * 
     * @param int $id
     * 
     * @return Object
     */
    public function editTask($id)
    {
        $task = Task::where('task_id', $id)->first();
        $developers = Developer::orderBy('developer_id', 'desc')->get();
        $projects = Project::orderBy('project_id', 'desc')->get();
        return view('Task.edit', compact('task', 'developers', 'projects'));
    }

    /**
     * Update task information
     * 
     * @param \Illuminate\Http\Request
     * @param int $id
     * 
     * @return Boolean
     */
    public function updateTask(Request $request, $id)
    {

        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'start_date'   => 'required',
            'due_date'     => 'required',
            'priority'     => 'required',
            'developer_id' => 'required'
        ]);

        $task = Task::where('task_id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove specefic task from storage
     * 
     * @param int $id
     * 
     * @return Boolean
     */
    public function deleteTask($id)
    {
        $task = Task::where('task_id', $id)->delete();
        return redirect()->route('task.index')->with('success', 'Task deleted successfully.');
    }


    /**
     * Show project wise task list
     * 
     * @param int $project_id
     * 
     * @return Array of task
     */
    public function projectWiseTasks($project_id)
    {
        $tasks = Task::where('project_id', $project_id)->get();
        return view('Project-wise-task.index', compact('tasks', 'project_id'));
    }

    /**
     * Projectwise task create
     * 
     * 
     */
    public function projectWiseTaskCreate($project_id)
    {
        $developers = Developer::orderBy('developer_id', 'desc')->get();
        $projects = Project::orderBy('project_id', 'desc')->get();
        return view('Project-wise-task.create', compact('developers', 'projects', 'project_id'));
    }

    /**
     * Projectwise task store
     * 
     * 
     */
    public function projectWiseTaskStore(Request $request)
    {

        $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'start_date'   => 'required',
            'due_date'     => 'required',
            'priority'     => 'required',
            'developer_id' => 'required',
            'project_id' => 'required'
        ]);

        $project_id = $request->project_id;
        $task = Task::create($request->all());
        return redirect('project/' . $project_id . '/tasks')->with('success', 'Task created successfully.');
    }

    /**
     * Project wise task delete
     * 
     * asdfasdf
     * 
     */
    public function projectWiseTaskDelete($task_id)
    {
        $task = Task::where('task_id', $task_id)->delete();
        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}
