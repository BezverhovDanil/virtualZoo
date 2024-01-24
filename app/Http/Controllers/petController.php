<?php

namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;

class petController extends Controller
{
    public function addPet(Request $request)
    {
    if (auth()->check()) {
        $request->validate([
            'species' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,img|max:2048',
        ]);

        
        $pet = new Pet;
        $pet->species = $request->input('species');
        $pet->name = $request->input('name');
        $pet->age = $request->input('age');
        $pet->description = $request->input('description');

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pets'), $imageName);
            $pet->image = 'images/pets/' . $imageName;
        }

        $pet->save();

        echo('Питомцы были успешно добавлены');
    } else {
        echo("Вам нужно авторизоваться");
    }
    }

    public function listPets()
    {
        $pets = Pet::all();
        return view('pets.list', compact('pets'));
    }
    public function Slider()
    {
        $pets = Pet::all();
        
        \Log::info('Slider method called with pets: ' . json_encode($pets));
        return view('welcome', compact('pets'));
    }
    public function showPetForm()
    {
        return view('pets.add');
    }

    public function deletePet($id)
{
    
    if (auth()->check()) {
        $pet = Pet::find($id);
        $pet->delete();

        echo('Питомец удален');
    } else {
        echo('Чтобы удалить питомца вам нужно авторизоваться');
    }
}
}
