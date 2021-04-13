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
            ))->latest()->get();
        
        return view("showRegister", ["register" => $registers, "stacks" => Stack::all()]);
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

    public function show(Register $registers)
    {
        dd(["register" => $registers, "stack" => Stack::all()]);
        //return view("showRegister", ["register" => $registers, "stack" => Stack::all()]);
    }


    public function edit(Register $registers)
    {
        return view("editRegister", compact("registers"));
    }


    public function update(Request $request, Register $registers)
    {
        $registers->update($this->validateRegister());

        return redirect("/registers/" . $register->id);
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
