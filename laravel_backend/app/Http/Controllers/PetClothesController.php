<?php

namespace App\Http\Controllers;

use App\Models\PetClothes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetClothesController extends Controller
{
    public function index()
    {
        $petClothes = PetClothes::all();
        return view('pet-clothes.index', compact('petClothes'));
    }

    public function create()
    {
        return view('pet-clothes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pet-clothes', 'public');
        }

        PetClothes::create($data);

        return redirect()->route('pet-clothes.index')->with('success', 'Thời trang thú cưng đã được thêm!');
    }

    public function edit($id)
    {
        $clothes = PetClothes::findOrFail($id);
        return view('pet-clothes.edit', compact('clothes'));
    }

    public function update(Request $request, $id)
    {
        $clothes = PetClothes::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($clothes->image) {
                Storage::disk('public')->delete($clothes->image);
            }
            $data['image'] = $request->file('image')->store('pet-clothes', 'public');
        }

        $clothes->update($data);

        return redirect()->route('pet-clothes.index')->with('success', 'Thời trang thú cưng đã được cập nhật!');
    }

    public function destroy($id)
    {
        $clothes = PetClothes::findOrFail($id);
        if ($clothes->image) {
            Storage::disk('public')->delete($clothes->image);
        }
        $clothes->delete();

        return redirect()->route('pet-clothes.index')->with('success', 'Thời trang thú cưng đã bị xóa!');
    }
}
