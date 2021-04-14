<?php

namespace App\Http\Controllers;

use App\Models\Stack;
use Illuminate\Http\Request;

class StackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stacks = Stack::simplePaginate(5);
        return view("createStack", ["stacks" => $stacks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('stacks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $stack = new Stack(request(["name"]));
        $stack->save();
        return redirect()->route('stacks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function show(Stack $stack)
    {
        return view("editStack", compact('stack'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function edit(Stack $stack)
    {
        return redirect()->route('stacks.show', ["stack" => $stack->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stack $stack)
    {
        $stack->name = $request->name;
        $stack->save();
        return redirect()->route('stacks.index');      
        /* $stack->name = $request; */
    }

    public function destroy(Stack $stack)
    {
        $stack->delete($stack);
        return redirect()->route('stacks.index');
    }
}
