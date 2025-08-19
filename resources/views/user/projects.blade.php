
@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Projects</h4>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addProjectModal">
                        <i class="fa fa-plus"></i> Add New Project
                    </button>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Due Date</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($projects as $project)
                                <tr>
                                    <td><strong>{{ $project->title }}</strong></td>
                                    <td>{{ Str::limit($project->description, 50) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $project->status == 'completed' ? 'success' : ($project->status == 'active' ? 'primary' : 'warning') }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star{{ $i <= $project->priority ? '' : '-o' }}" style="color: gold;"></i>
                                        @endfor
                                    </td>
                                    <td>{{ $project->due_date ? $project->due_date->format('M d, Y') : 'No due date' }}</td>
                                    <td>{{ $project->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editProjectModal{{ $project->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Project Modal -->
                                <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('projects.update', $project) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" class="form-control" name="title" value="{{ $project->title }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" name="description" rows="3">{{ $project->description }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status" required>
                                                            <option value="active" {{ $project->status == 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                            <option value="on_hold" {{ $project->status == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Priority (1-5)</label>
                                                        <select class="form-control" name="priority" required>
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <option value="{{ $i }}" {{ $project->priority == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Due Date</label>
                                                        <input type="date" class="form-control" name="due_date" value="{{ $project->due_date ? $project->due_date->format('Y-m-d') : '' }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Project</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No projects found. Create your first project!</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($projects->hasPages())
                        <div class="d-flex justify-content-center">
                            {{ $projects->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('projects.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status" required>
                            <option value="active">Active</option>
                            <option value="completed">Completed</option>
                            <option value="on_hold">On Hold</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Priority (1-5)</label>
                        <select class="form-control" name="priority" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3" selected>3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="date" class="form-control" name="due_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
