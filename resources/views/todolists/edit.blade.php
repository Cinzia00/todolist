@extends('welcome')

@section('content')

<div class="container">
    <h1 class="text-success py-5">Modifica task</h1>
    <div class="py-4">
        <a href="{{ route('todolist.index') }}">Torna alla home</a>
    </div>
    <form action="{{ route('todolist.update', $todolist) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" class="form-control @error('task') is-invalid @enderror" id="task" name="task" value="{{ old('task',$todolist->task) }}">
            @error('task')
                {{-- <div class="alert alert-danger">{{ $message }}</div> --}}
                <div class="invalid-feedback">
                {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection