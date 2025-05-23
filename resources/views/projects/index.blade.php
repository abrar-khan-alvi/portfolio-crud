<!DOCTYPE html>
<html>

<head>
    <title>Projects List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-4">

    <h1>Projects List</h1>

    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Project URL</th>
                <th>Image</th> <!-- Added -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->title }}</td>
                <td>{{ ucfirst($project->status) }}</td>
                <td>{{ Str::limit(ucfirst($project->description), 10) }}</td>
                <td>
                    @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank">Visit</a>
                    @else
                    N/A
                    @endif
                </td>
                <td>
                    @if($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" alt="Project Image" style="max-width: 100px; max-height: 60px;">
                    @else
                    No Image
                    @endif
                </td>
                <td>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No projects found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>


</body>

</html>