<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->get();
        $categories = Category::all();
        return view('admin.subcategories', compact('subcategories', 'categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('subcategories.index')
                ->withErrors($validator)
                ->withInput();
        }

        Subcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')
            ->with('success', x_('Subcategory created successfully.', 'controller'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($validator->fails()) {
            return redirect()->route('subcategories.index')
                ->withErrors($validator)
                ->withInput();
        }

        $subcategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'details' => $request->details,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('subcategories.index')
            ->with('success', x_('Subcategory updated successfully.', 'controller'));
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);

        // Check if the subcategory has any clients
        if ($subcategory->clients()->count() > 0) {
            return redirect()->route('subcategories.index')
                ->with('error', x_('Cannot delete subcategory because it has associated clients.', 'controller'));
        }

        $subcategory->delete();

        return redirect()->route('subcategories.index')
            ->with('success', x_('Subcategory deleted successfully.', 'controller'));
    }
}
