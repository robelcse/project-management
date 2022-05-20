<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskProgress;
use Illuminate\Http\Request;

class TaskprogressController extends Controller
{

    /**
     * Get the list of taskprogress
     * 
     * @return Array
     */
    public function getAllTaskProgress()
    {
        $taskprogresses = TaskProgress::orderBy('id', 'desc')->get();
        return view('Taskprogress.index', compact('taskprogresses'));
    }

    /**
     * Show view page to create taskprogress
     * 
     * @return \Illuminate\Http\View
     */
    public function createTaskProgress()
    {
        return view('Taskprogress.create');
    }

    /**
     * Get taskprogress by taskId
     * 
     * @param int $taskId
     * 
     * @return Array
     */
    public function getAllTaskProgressByTaskId($taskId)
    {
        $taskprogresses = TaskProgress::with(['project', 'task', 'developer'])->orderBy('id', 'desc')->where('task_id', $taskId)->get();
        $task = Task::with('project')->where('task_id', $taskId)->first();
        return view('Taskprogress.index', compact('taskprogresses', 'task'));
    }

    /**
     * Store new taskprogress
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return Boolean
     */
    public function storeTaskProgress(Request $request)
    {

        $request->validate([
            'work_description' => 'required',
            'working_hour' => 'required',
            'remaining' => 'required'
        ]);

        if ($request->remaining == 0) {
            $task_id = $request->task_id;
            $task = Task::where('task_id', $task_id)->update(['status' => 3]);
        }


        $task_done = 100 - $request->remaining;

        //update task_done file of tast table
        Task::where('task_id', $request->task_id)->update(['task_done' => $task_done]);


        $taskprogresses = TaskProgress::create($request->all());
        return redirect()->back()->with('success', 'Taskprogress created successfully');
    }

    /**
     * Edit taskprogress
     * 
     * @param int $id
     * 
     * @return Object
     */
    public function editTaskProgress($id)
    {
        $taskprogress = TaskProgress::findOrfail($id);
        return view('Taskprogress.edit', compact('taskprogress'));
    }

    /**
     * Update taskprogress
     * 
     * @param \Illuminate\Http\Request
     * @param int $id
     * 
     * @return Boolean
     */
    public function updateTaskProgress(Request $request, $id)
    {
        $taskprogress = TaskProgress::where('id', $id)->update($request->except(['_method', '_token']));
        return redirect()->route('taskprogress.index')->with('success', 'Taskprogress updated successfully.');
    }

    /**
     * Remove taskprogress from storage
     * 
     * @param int $id
     * 
     * @return Boolean
     */
    public function deleteTaskProgress($id)
    {
        $taskprogress = TaskProgress::findOrfail($id);
        $taskprogress->delete();
        return redirect()->route('taskprogress.index')->with('success', 'Taskprogress deleted successfully.');
    }
}
