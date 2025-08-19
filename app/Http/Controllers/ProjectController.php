
<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())
                          ->orderBy('priority', 'desc')
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);
        
        return view('user.projects', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,on_hold',
            'priority' => 'required|integer|between:1,5',
            'due_date' => 'nullable|date|after:today'
        ]);

        $project = new Project();
        $project->user_id = Auth::id();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->status = $request->status;
        $project->priority = $request->priority;
        $project->due_date = $request->due_date;
        $project->save();

        return redirect()->back()->with('success', 'Project created successfully!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,completed,on_hold',
            'priority' => 'required|integer|between:1,5',
            'due_date' => 'nullable|date'
        ]);

        $project->update($request->all());

        return redirect()->back()->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }

    /**
     * Get project statistics
     */
    public function stats()
    {
        $userId = Auth::id();
        
        $stats = [
            'total' => Project::where('user_id', $userId)->count(),
            'active' => Project::where('user_id', $userId)->where('status', 'active')->count(),
            'completed' => Project::where('user_id', $userId)->where('status', 'completed')->count(),
            'high_priority' => Project::where('user_id', $userId)->where('priority', '>=', 4)->count(),
        ];

        return response()->json($stats);
    }
}
