<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Index Page Table</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Task Details</h2>
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Priority:</strong> {{ ucfirst($task->priority) }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p class="card-text"><strong>Completed:</strong> {{ $task->completed ? 'Yes' : 'No' }}</p>
            @if($task->completed_at)
                <p class="card-text"><strong>Completed At:</strong> {{ $task->completed_at }}</p>
            @endif
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
