<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TodoResource;
use App\Todo;

class ControllerTodos extends Controller
{
  /**
   * GET
   */
  public function list(Request $request){
    return TodoResource::collection(Todo::all());
  }

  /**
   * PUT
   */
  public function update($id, Request $request){
    $t = Todo::find($id);
    $t->label = $request->input('label');
    $t->updated_at = new \DateTime();
    $t->isDone = boolval($request->input('isDone'));
    $t->save();
    return new TodoResource($t);
  }

  /**
   * DELETE
   */
  public function delete($id){
    Todo::destroy($id);
  }

  /**
   * POST
   */
  public function create(Request $request){
    $t = new Todo();
    $t->label = $request->input('label');
    $t->save();
    return new TodoResource(Todo::find($t->id));
  }
}
