<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


</head>
<body>

<div class="container mt-5">
    <a href="{{ route('tasks.index') }}" class="btn btn-success mb-3">Back to all users data</a>
  {{-- <h2 class="mb-4"></h2> --}}
  <form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" value="{{ $task->title }}" name="title" id="title" placeholder="Enter task title" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter task description" required>{{ $task->description }}</textarea>
    </div>

    <div class="position-relative">
        <select class="form-select" id="priority" name="priority" required>
          <option value="low" @if($task->priority == 'low') selected @endif>Low</option>
          <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
          <option value="high" @if($task->priority == 'high') selected @endif>High</option>
        </select>
      </div>
      

    <div class="mb-3">
      <label for="due_date" class="form-label">Due Date</label>
      <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
