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
        return view("editRegister", compact('register'));
    }


    public function edit(Register $register)
    {
        return redirect()->route('registers.show', ["register" => $register->id]);
    }


    public function update(Request $request, Register $registers)
    {

       //$registers->stacks()->attach(request("stacks"));
       /* return redirect("/registers/" . $registers->id); */
    }

    public function destroy(Register $registers)
    {
        //
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
