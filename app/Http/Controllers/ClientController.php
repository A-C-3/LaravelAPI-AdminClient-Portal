<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function registerClient(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15',
            'interests' => 'array',
        ]);

        $client = User::create([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_no' => $request->contact_no,
            'role_id' => 2, // Client role
            'created_by' => Auth::id(),
        ]);

        if ($request->has('interests')) {
            $client->interests()->attach($request->interests);
        }

        return response()->json($client, 201);
    }

    public function getClients()
    {
        $clients = User::where('created_by', Auth::id())->where('role_id', 2)->get();
        return response()->json($clients);
    }

    public function getClientById($id)
    {
        $client = User::with('interests')
                      ->where('created_by', Auth::id())
                      ->where('id', $id)
                      ->where('role_id', 2)
                      ->firstOrFail();

        return response()->json($client);
    }

    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
            'interests' => 'array',
        ]);
    
        $client = User::where('created_by', Auth::id())
                      ->where('id', $id)
                      ->firstOrFail();
    
        $client->update($request->only('first_name', 'last_name', 'contact_no', 'email'));
    
        if ($request->has('interests')) {
            $client->interests()->sync($request->interests);
        }
    
        return response()->json($client);
    }

    public function deleteClient($id)
    {
        $client = User::where('created_by', Auth::id())->where('id', $id)->firstOrFail();
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully']);
    }
}
