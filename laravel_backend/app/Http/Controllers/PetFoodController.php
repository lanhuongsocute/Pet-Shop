<?php

namespace App\Http\Controllers;

use App\Models\PetFood;
use App\Models\PetFoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetFoodController extends Controller
{
    public function index()
    {
        // Lấy danh sách thức ăn cùng danh mục
        $petFoods = PetFood::with('category')->get();
        return view('pet_foods.index', compact('petFoods'));
    }

    public function create()
    {
        // Lấy danh sách tất cả danh mục thức ăn
        $categories = PetFoodCategory::all();
        return view('pet_foods.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:pet_food_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'description', 'category_id']);

        // Xử lý upload hình ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pet_foods', 'public');
        }

        // Lưu dữ liệu vào cơ sở dữ liệu
        PetFood::create($data);

        return redirect()->route('pet-foods.index')->with('success', 'Thức ăn đã được thêm!');
    }

    public function edit($id)
    {
        // Tìm thức ăn cần sửa
        $petFood = PetFood::findOrFail($id);
        $categories = PetFoodCategory::all();

        return view('pet_foods.edit', compact('petFood', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Tìm thức ăn cần cập nhật
        $petFood = PetFood::findOrFail($id);

        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:pet_food_categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'price', 'description', 'category_id']);

        // Xử lý upload hình ảnh nếu có
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($petFood->image && Storage::disk('public')->exists($petFood->image)) {
                Storage::disk('public')->delete($petFood->image);
            }
            $data['image'] = $request->file('image')->store('pet_foods', 'public');
        }

        // Cập nhật dữ liệu
        $petFood->update($data);

        return redirect()->route('pet-foods.index')->with('success', 'Thức ăn đã được cập nhật!');
    }

    public function destroy($id)
    {
        // Tìm thức ăn cần xóa
        $petFood = PetFood::findOrFail($id);

        // Xóa hình ảnh nếu tồn tại
        if ($petFood->image && Storage::disk('public')->exists($petFood->image)) {
            Storage::disk('public')->delete($petFood->image);
        }

        // Xóa dữ liệu
        $petFood->delete();

        return redirect()->route('pet-foods.index')->with('success', 'Thức ăn đã bị xóa!');
    }
}
