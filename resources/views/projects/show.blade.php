<!DOCTYPE html>
<html>
<head>
    <title>Project Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h1>Project Details</h1>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Back to Projects List</a>

    <div class="card">
        <div class="card-header">
            <h2>{{ $project->title }}</h2>
        </div>
        <div class="card-body">
            @if($project->image)
                <img src="{{ asset('images/' . $project->image) }}" alt="Project Image" style="max-width: 300px;">
            @endif

            <p><strong>Status:</strong> {{ ucfirst($project->status) }}</p>

            @if($project->description)
                <p><strong>Description:</strong> {{ $project->description }}</p>
            @endif

            @if($project->project_url)
                <p><strong>Project URL:</strong> <a href="{{ $project->project_url }}" target="_blank">{{ $project->project_url }}</a></p>
            @endif
        </div>
    </div>

</body>
</html>
