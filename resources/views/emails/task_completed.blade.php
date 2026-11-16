<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Completed</title>
</head>
<body>
    <h2>Good news! A task has been marked as done.</h2>
    <p><strong>Task Title:</strong> {{ $task->title }}</p>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> <span style="color: green;">{{ ucfirst($task->status) }}</span></p>
    <p>Thank you for keeping your tasks updated!</p>
</body>
</html>