@extends('layouts.app')

@section('content')
<h3>Create Task</h3>

<form method="POST" action="{{ route('tasks.store') }}">
    @csrf

    <label>Title</label>
    <input type="text" name="title" value="{{ old('title') }}" required>

    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>

    <h4>Subtasks</h4>
    <div id="subtasks">
        <div class="row">
            <input type="text" name="subtask_names[]" placeholder="Subtask name">
            <button type="button" class="btn btn-danger remove">Remove</button>
        </div>
    </div>
    <button type="button" id="add" class="btn btn-outline">+ Add Subtask</button>

    <br><br>
    <button type="submit" class="btn">Save Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-outline">Back</a>
</form>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const addBtn = document.getElementById('add');
    const subtasksDiv = document.getElementById('subtasks');

    addBtn.addEventListener('click', () => {
        const row = document.createElement('div');
        row.classList.add('row');
        row.innerHTML = `
            <input type="text" name="subtask_names[]" placeholder="Subtask name">
            <button type="button" class="btn btn-danger remove">Remove</button>
        `;
        subtasksDiv.appendChild(row);
    });

    subtasksDiv.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove')) {
            if (subtasksDiv.querySelectorAll('.row').length > 1) {
                e.target.parentElement.remove();
            } else {
                alert('At least one subtask is required.');
            }
        }
    });
});
</script>
@endsection
