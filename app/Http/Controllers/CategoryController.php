<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::create($validatedData);

        return redirect()->route('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::find($id);
        $oldName = $category->name; //para manipulação da mensagem de sucesso
        $category->update($validatedData);

        $newName = $category->name; //para manipulação da mensagem de sucesso

        // Armazenar dados na sessão
        session()->flash('success', [
            'message' => 'Category updated!',
            'oldName' => $oldName,
            'newName' => $newName,
        ]);

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
    }
}
