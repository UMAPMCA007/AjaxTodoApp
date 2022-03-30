<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        return view('todo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'todo'=>'required'
        ]);
        $todo=new Todo();
        $todo->todo_name=$request->todo;
        $todo->completed= 0;
        $todo->save();
        return response()->json(['success'=>'data saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $todos=Todo::orderBy('id','asc')->get();
        return response()->json(['status'=>200,'todos'=>$todos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data=$request->all();
        $id=$request->id;
        $todo=Todo::find($id);
        $todo->todo_name=$request->todo;
        $todo->save();
        return response()->json(['status'=>200,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $id=$request->id;
       $todo=Todo::find($id);
       if($todo->completed	== 0){
          $todo->completed	= 1;
       }else{
           $todo->completed	= 0;
       }
        $todo->save();
       return response()->json(['success'=>200,'res'=>$todo]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        Todo::destroy($id);
        return response()->json(['status'=>200]);
    }
}
