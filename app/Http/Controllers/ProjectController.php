<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all projects from database
        $projects = Project::paginate(5);

        // Return a view and pass the projects data
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new project
        return view('projects.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image' => 'required|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'project_url' => $request->project_url,
            'image' => $imageName ?? null,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $project = Project::findOrFail($id);

        // Handle image upload if new file is provided
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            // Optionally delete old image here if you want
            // Storage::delete('public/images/' . $project->image);

            $project->image = $imageName;
        }

        // Update other fields
        $project->title = $request->title;
        $project->description = $request->description;
        $project->project_url = $request->project_url;
        $project->status = $request->status;

        $project->save();

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        // Optionally delete the image file
        $imagePath = public_path('images/' . $project->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
