<?php

namespace App\Http\Controllers;

use App\Models\PetCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetCategoryController extends Controller
{
    public function index()
    {
        $categories = PetCategory::all();
        return view('pet_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pet_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['image'] = $file->storeAs('categories', $filename, 'public'); // Lưu file trong disk 'public'
        }

        PetCategory::create($data);

        return redirect()->route('pet_categories.index')->with('success', 'Danh mục đã được thêm!');
    }

    public function edit($id)
    {
        $category = PetCategory::findOrFail($id);
        return view('pet_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = PetCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'description']);

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $data['image'] = $file->storeAs('categories', $filename, 'public');
        }

        $category->update($data);

        return redirect()->route('pet_categories.index')->with('success', 'Danh mục đã được cập nhật!');
    }

    public function destroy($id)
    {
        $category = PetCategory::findOrFail($id);

        // Xóa ảnh nếu có
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('pet_categories.index')->with('success', 'Danh mục đã bị xóa!');
    }
}
