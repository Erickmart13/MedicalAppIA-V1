<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices=Office::all();
        return view('offices.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offices=Office::all();
        return view('offices.create', compact('offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules= [
            'name'=> 'required|string|unique:specialties,name|min:3'
        ];

        $messages=[
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.unique' => 'La especialidad ya existe.',
            'name.min'=> 'El nombre debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $notification='El consultorio se ha creado correctamente.';

        Office::create([
            'code'=>$request->code,
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'active' => $request->active,
        ]);
        
      

        return redirect('/offices')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $office= Office::findOrFail($id);
        return view('offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {$rules= [
        'name'=> 'required|string|unique:specialties,name|min:3'
    ];

    $messages=[
        'name.required' => 'El nombre de la especialidad es obligatorio.',
        'name.unique' => 'La especialidad ya existe.',
        'name.min'=> 'El nombre debe tener más de 3 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    DB::transaction(function () use ($request, $id) {

        $office= Office::findOrFail($id);
    $office->update([
        'code'=>$request->code,
        'name' => $request->name,
        'description' => $request->description,
        'location' => $request->location,
        'active' => $request->active,
    ]);
    $office= Office::findOrFail($id);

});
    $notification='El consultorio se ha actualizado correctamente.';

    return redirect('/offices')->with(compact('notification'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $office = Office::findOrFail($id);
        // $person = $doctor->person;
        $officeName =$office->name;
        
        $office->delete();
        $notificationDelete = "El consultorio médico $officeName se ha eliminado correctamente";
        return redirect('/offices')->with(compact('notificationDelete'));
    }
}
