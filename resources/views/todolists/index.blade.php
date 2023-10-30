@extends('welcome')
@section('content')
<div class="container py-5">
    <div class="row">
        <h2 class="text-success text-center">La mia todo List</h2>
        <div class="col my-5">
            <a class="btn btn-success" href="{{ route('todolist.create') }}">Aggiungi Task</a>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Lista</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($todolists as $todolist)
            <tr>
                <td>
                    <a href="{{ route('todolist.show', $todolist) }}">{{ $todolist->task }}</a>
                </td>
                <td>
                    <a class="btn btn-sm btn-success"href="{{ route('todolist.edit', $todolist)}}">Modifica</a>
                </td>
                <td>
                    <form action="{{ route('todolist.destroy',$todolist) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Elimina">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



    </div>






</div>
@endsection