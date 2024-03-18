<?php

namespace App\Http\Controllers;

use App\Models\File201;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class File201Controller extends Controller
{
    public function index()
    {
        $files = File201::all();

        return inertia('File201/Index', compact('files'));
    }

    public function create()
    {
        return inertia('File201/Create', ['civil' => []]);

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'extension_name' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'civil_status' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact_details' => ['required', 'string', 'max:255']
        ]);

        File201::create([...$validated, 'has_middle_name' => !!$validated['middle_name']]);

        return redirect()->route("file201.index")->with('success', "Record has been successfully created.");
    }


    public function edit(File201 $file)
    {
        return inertia('File201/Edit', [
            'file' => $file,
        ]);
    }

    public function update(Request $request, File201 $file)
    {
        $validated = $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'extension_name' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'civil_status' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'contact_details' => ['required', 'string', 'max:255']
        ]);


        $file->update(([...$validated, 'has_middle_name' => !!$validated['middle_name']]));

        return redirect()->route("file201.index")->with('success', "Record has been successfully updated.");
    }

    public function destroy(File201 $file)
    {
        $file->delete();

        return redirect()->back()->with('success', "Record has been successfully deleted.");
    }
}
