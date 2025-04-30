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
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
  <h2 class="mb-4">Task Magement System</h2>
  <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
  <a href="{{ route('taskshow') }}" class="btn btn-info mb-3">Show Completed Tasks</a>
  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Priority</th>
        <th>Due Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tasks as $task)
        
     
      <tr>
        <td>{{ $task->title }}</td>
        <td>{{ $task->description }}</td>
        <td>{{ $task->priority }}</td>
        <td>{{ $task->due_date }}</td>
        <td>
          <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">
            <i class="fa fa-edit"></i> Edit
        </a>
        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">
          <i class="fa fa-eye"></i> Show
      </a>
      
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm"
              onclick="return confirm('Are you sure you want to delete this task?')">
              <i class="fa fa-trash"></i> Delete
          </button>
      </form>
      @if (!$task->completed)
      <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
          @csrf
          @method('PUT') 
          <button type="submit" class="btn btn-warning btn-sm">
              <i class="fa fa-check"></i> Complete
          </button>
      </form>
      @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
