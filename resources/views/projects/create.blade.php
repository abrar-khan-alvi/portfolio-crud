<!DOCTYPE html>
<html>
<head>
    <title>Add New Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">

    <h1>Add New Project</h1>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mb-3">Back to Projects List</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="project_url" class="form-label">Project URL</label>
            <input type="url" class="form-control" id="project_url" name="project_url" value="{{ old('project_url') }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
            <input class="form-control" type="file" id="image" name="image" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select class="form-select" id="status" name="status" required>
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Project</button>
    </form>

</body>
</html>
