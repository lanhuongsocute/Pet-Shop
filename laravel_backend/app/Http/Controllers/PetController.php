<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\PetCategory; // Import model PetCategory
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index()
    {
        // Lấy danh sách thú cưng
        $pets = Pet::with('category')->get(); // Eager loading danh mục
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        // Lấy danh mục thú cưng để hiển thị trong dropdown
        $categories = PetCategory::all();
        return view('pets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:pet_categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pets', 'public');
        }

        // Tạo thú cưng
        Pet::create($data);

        return redirect()->route('pets.index')->with('success', 'Thú cưng đã được thêm!');
    }

    public function edit($id)
    {
        // Lấy thông tin thú cưng và danh mục
        $pet = Pet::findOrFail($id);
        $categories = PetCategory::all();
        return view('pets.edit', compact('pet', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Lấy thú cưng cần cập nhật
        $pet = Pet::findOrFail($id);

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:pet_categories,id',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['name', 'type', 'category_id', 'price', 'description']);

        // Cập nhật ảnh nếu có upload
        if ($request->hasFile('image')) {
            if ($pet->image && Storage::disk('public')->exists($pet->image)) {
                Storage::disk('public')->delete($pet->image);
            }
            $data['image'] = $request->file('image')->store('pets', 'public');
        }

        // Cập nhật thông tin thú cưng
        $pet->update($data);

        return redirect()->route('pets.index')->with('success', 'Thú cưng đã được cập nhật!');
    }

    public function destroy($id)
    {
        // Lấy thú cưng cần xóa
        $pet = Pet::findOrFail($id);

        // Xóa ảnh nếu tồn tại
        if ($pet->image && Storage::disk('public')->exists($pet->image)) {
            Storage::disk('public')->delete($pet->image);
        }

        // Xóa thú cưng
        $pet->delete();

        return redirect()->route('pets.index')->with('success', 'Thú cưng đã bị xóa!');
    }
}
