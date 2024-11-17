<form
    action="{{ route('assignments.update', ['course' => $course->id, 'material' => $material->id, 'assignment' => $assignment->id]) }}"
    method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $assignment->title }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" required>{{ $assignment->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="datetime-local" name="due_date" id="due_date" class="form-control"
            value="{{ \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d\TH:i') }}" required>
    </div>

    <div class="form-group">
        <label for="file">File</label>
        @if ($assignment->file)
            <div class="mb-2">
                <a href="{{ asset('assignments/' . $assignment->file) }}" target="_blank">{{ $assignment->file }}</a>
            </div>
        @endif
        <input type="file" name="file" id="file" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Assignment</button>
        <a href="{{ route('course.show', $course->id) }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>
