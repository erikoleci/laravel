
<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('user')->orderBy('created_at', 'desc')->get();
        $users = User::where('role', '!=', 'admin')->get();
        
        return view('user.projects', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|in:forex,commodities,indices,crypto,stocks',
            'url' => 'required|url|max:500',
            'user_id' => 'required|exists:users,id',
            'description' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $project = new Project();
        $project->title = $request->title;
        $project->category = $request->category;
        $project->url = $request->url;
        $project->user_id = $request->user_id;
        $project->description = $request->description;
        $project->read = 0;
        $project->status = 'active';
        $project->save();

        return response()->json(['success' => true, 'message' => 'Project created successfully']);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['success' => true, 'message' => 'Project deleted successfully']);
    }

    public function markAsRead(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->read = 1;
        $project->save();

        return response()->json(['success' => true]);
    }

    public function getUsers()
    {
        $users = User::select('id', 'name', 'account_id')->get();
        return response()->json($users);
    }
}
