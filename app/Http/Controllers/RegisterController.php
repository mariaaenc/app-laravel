<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Stack;

class RegisterController extends Controller
{
    public function index()
    {
        if(request("stacks")){
            $registers = Stack::where("name", request("stacks"))->firstOrFail()->registers;
        }
        else{
            $registers = Register::latest()->get();
        }
        
        return view("showRegister", ["register" => $registers]);
    }

    public function create()
    {
        return view("createRegister", [
            "stacks" => Stack::all()
        ]);
    }

    public function store()
    {
       $registers = Register::create($this->validateRegister());
       dd($registers);
       $registers->stacks()->attach(request("stacks"));
       return redirect(route("registers.index"));
    }

    public function show(Register $registers)
    {
        return view("showRegister", ["register" => $registers]);
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

    public function validateRegister(){
        return request()->validate([
            "name" => "required",
            "email" => "required",
            "cpf" => "required",
            "address" => "required",
            "date-birth" => "required",
            "stacks" => "exists:stacks,id"
        ]);
    }
}
