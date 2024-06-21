<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->paginate(5);

        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::create($validatedData);

        session()->flash('createdSuccess', [
            'message' => 'Tag created!',
        ]);

        return redirect()->route('tag.index');
    }

    public function create()
    {
        return view('tags.create');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $tag = Tag::find($id);
        $oldName = $tag->name; //para manipulação da mensagem de sucesso

        $tag->update($validatedData);
        $newName = $tag->name; //para manipulação da mensagem de sucesso

        // Armazenar dados na sessão
        session()->flash('updatedSuccess', [
            'message' => 'Tag updated!',
            'oldName' => $oldName,
            'newName' => $newName,
        ]);

        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if ($tag) {
            $tag->delete();

            // Armazenar dados na sessão
            session()->flash('deletedSuccess', [
                'message' => 'Tag deleted!',
            ]);
            
            return redirect()->route('tag.index');
        }
        
        return redirect()->route('tag.index')->with('error', 'Tag not found');
        
    }
}
