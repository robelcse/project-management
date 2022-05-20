<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Developer;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProjectController extends Controller
{

    /**
     * Get the list of project
     * 
     * @return Array of object
     */
    public function getAllProject()
    {
        $projects = Project::with('tasks')->orderBy('project_id', 'desc')->get();

        foreach ($projects as $project) {

            //find completed task
            $project->completed_task =  Task::where('project_id', $project->project_id)->where('status', 3)->count();


            //calculate paracentage how much completed and how much remaining
            $tasks = Task::where('project_id', $project->project_id)->get();
            $total = 0;
            foreach ($tasks as $task) {
                $total += $task->task_done;
            }
            if (count($tasks) > 0) {
                $project->total_done = round($total / count($tasks), 2);
            } else {
                $project->total_done = 0;
            }
        }

        // return $projects;
        return view('Project.index', compact('projects'));
    }

    /**
     * View page for create project
     * 
     * @return \Illuminate\Http\View
     */
    public function createProject()
    {
        $clients = Client::orderBy('client_id', 'desc')->get();
        $developers = Developer::orderBy('developer_id', 'desc')->get();
        return view('Project.create', compact('clients', 'developers'));
    }

    /**
     * Store the project information
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     */
    public function storeProject(Request $request)
    {

        $request->validate([
            'project_name' => 'required',
            'description'  => 'required',
            'client_id'    => 'required',
            'developer_id' => 'required',
            'budget'       => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required',
            'technologies' => 'required',

        ]);

        $project = Project::create($request->all());
        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Show project information for edit
     * 
     * @param int $id
     * 
     * @return Object
     */
    public function editProject($id)
    {
        $project = Project::where('project_id', $id)->first();
        return view('Project.edit', compact('project'));
    }

    /**
     * Update project information
     * 
     * @param \Illuminate\Http\Request
     * @param int $id 
     *
     * @return Boolean
     */
    public function updateProject(Request $request, $id)
    {
        $request->validate([
            'project_name' => 'required',
            'description'  => 'required',
            'client_id'    => 'required',
            'developer_id' => 'required',
            'budget'       => 'required',
            'start_date'   => 'required',
            'end_date'     => 'required',
            'technologies' => 'required',

        ]);
        $project = Project::where('project_id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove specific project from storage
     * 
     * @param int $id
     * 
     * @return Boolean
     */
    public function deleteProject($id)
    {
        $project = Project::where('project_id', $id)->first();
        $project->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
