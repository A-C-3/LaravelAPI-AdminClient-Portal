<?php

namespace App\Http\Controllers;

use App\Models\Interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    public function index()
    {
        return response()->json(Interest::all());
    }

    public function show($id)
    {
        $interest = Interest::findOrFail($id);
        return response()->json($interest);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $interest = Interest::create([
            'name' => $request->name,
        ]);

        return response()->json($interest, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $interest = Interest::findOrFail($id);
        $interest->update([
            'name' => $request->name,
        ]);

        return response()->json($interest);
    }

    public function destroy($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();

        return response()->json(['message' => 'Interest deleted successfully']);
    }
}
