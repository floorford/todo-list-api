<?php

namespace App\Http\Controllers;
use App\Task;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;

use Illuminate\Http\Request;


class Tasks extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // get all the tasks
    return Task::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(TaskRequest $request)
  {
    // get post request data for the task
    $data = $request->only(["task"]);

    // create an task with data and store in DB
    $task = Task::create($data);

    return new TaskResource($task);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function complete(Request $request, Task $task)
  {
    // get the request data - this is getting information from the app, about its completed status (true/false) and assigning it to the data variable
    $data = $request->only(["completed"]);

    // taking that data (true/false) update the task in the database
    $task->fill($data)->save();

    // return the updated version
    return new TaskResource($task);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(TaskRequest $request, Task $task)
  {
    // get the request data
    $data = $request->only(["task"]);

    // update the task
    $task->fill($data)->save();

    // return the updated version
    return new TaskResource($task);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Task $task)
  {
    $task->delete();

    // use a 204 code as there is no content in the response
    return response(null, 204);
  }
}
