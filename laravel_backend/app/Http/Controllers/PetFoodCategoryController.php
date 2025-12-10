<?php

namespace App\Http\Controllers;

use App\Models\PetFoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetFoodCategoryController extends Controller
{
    public function index()
    {
        $categories = PetFoodCategory::all();
        return view('pet_food_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pet_food_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pet_food_categories', 'public');
        }

        PetFoodCategory::create($data);

        return redirect()->route('pet-food-categories.index')->with('success', 'Danh mục đã được thêm!');
    }

    public function edit($id)
    {
        $category = PetFoodCategory::findOrFail($id);
        return view('pet_food_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = PetFoodCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('pet_food_categories', 'public');
        }

        $category->update($data);

        return redirect()->route('pet-food-categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function destroy($id)
    {
        $category = PetFoodCategory::findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('pet-food-categories.index')->with('success', 'Danh mục đã bị xóa!');
    }
}
