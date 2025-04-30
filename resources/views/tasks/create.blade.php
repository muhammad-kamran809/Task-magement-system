<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Task Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4">Add Task</h2>
  <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Enter task title" required>
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter task description" required></textarea>
    </div>

    <div class="mb-3">
      <label for="priority" class="form-label">Priority</label>
      <select class="form-select" name="priority" id="priority">
        <option selected disabled>Select priority</option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="due_date" class="form-label">Due Date</label>
      <input type="date" class="form-control" id="due_date" name="due_date" required>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
