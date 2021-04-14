<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Stack;


class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            "name"=>"nullable",
            "stack"=>["nullable", "integer", "exists:stacks,id"]
        ]);

        $registers = Register::when($request->input("name"), fn($query, $name) => $query->where("name", $name))
            ->when($request->input("stack"), fn($query, $stack) => $query->whereHas(
                "stacks",
                fn($query) => $query->where("stacks.id", $stack)
            ))->latest()->simplePaginate(5);
        
        return view("showRegister", ["registers" => $registers, "stacks" => Stack::all()]);
    }

    public function create()
    {
        return view("createRegister", [
            "stacks" => Stack::all()
        ]);
    }

    public function store(Request $request)
    {
       $registers = Register::create(Arr::except($this->validateRegister($request), "stacks"));
       $registers->stacks()->attach(request("stacks"));
       return redirect(route("registers.index"));
    }

    public function show(Register $register)
    {
        $allStacks = Stack::all();
        $stacks = $register->stacks;
        return view("editRegister", compact('register', 'stacks', 'allStacks'));
    }


    public function edit(Register $register)
    {
        return redirect()->route('registers.show', ["register" => $register->id]);
    }


    public function update(Request $request, Register $register)
    {
        $register->update(Arr::except($this->validateRegister($request), "stacks"));
        $newStacks = $request->input("stacks");
        if ($newStacks) {
            $register->stacks()->sync($newStacks);
            /* $registerStacks = $register->stacks->pluck("id");
            $toDelete = array_diff($registerStacks, $newStacks);
            $register->stacks()->detach($toDelete);
            $toAttach = array_diff($newStacks, $registerStacks);
            $register->stacks()->attach($toAttach); */
        }
        return redirect("/registers/" . $register->id);
    }

    public function destroy(Register $register)
    {
        $register->delete();
        return redirect(route("registers.index"));
    }

    public function validateRegister(Request $request){
        return request()->validate([
            "name" => "required",
            "email" => "required",
            "cpf" => "required",
            "address" => "required",
            "date_birth" => "required",
            "stacks" => "exists:stacks,id"
        ]);
    }
}
