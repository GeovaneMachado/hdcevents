@extends('layouts.main')

@section('title', 'dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>My events</h1>

</div>
<div class="col-mmd-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Particpants</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td scope="row">{{$loop->index + 1}}</td>
                        <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                        <td>0</td>
                        <td>
                            <a href="/events/edit/{{$event->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Edit</a>
                            <form action="/events/destroy/{{$event->id}}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn" value="Delete"><ion-icon name="trash-outline"></ion-icon>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You don't have events yet...<br><a href="/events/create">Created new events</a></p>
    @endif

</div>
@endsection