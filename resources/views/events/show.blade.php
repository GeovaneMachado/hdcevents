@extends('layouts.main')

@section('title', $event->title)
@section('content')

<div id="event-show-container" class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <div id="info-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $event->title }}</h1>
            <p><ion-icon name="sparkles-outline"></ion-icon>Event: {{ $event->title }}</p>
            <p class="event-city"><ion-icon name="location-outline"></ion-icon>City: {{ $event->city }}</p>
            <p class="event-participants"><ion-icon name="people-outline"></ion-icon>Particpants: {{ $event->particpants }}</p>
            <p class="event-owner"><ion-icon name="star-outline"></ion-icon>Owner: {{ $eventOwner['name']}}</p>
            <a href="#" class="btn btn-primary" id="event-submit">Confirm attendance</a>
            <h3>Infrastructure:</h3>
            <ul id="items-list">
                @foreach($event->items as $item)
                    <li><ion-icon name=play-outline></ion-icon><span>{{ $item }}</span></li>
                @endforeach
            </ul>
            {{-- <p><ion-icon name="location-outline"></ion-icon>Event is private: {{ $event->private }}</p> --}}
        </div>
        <div class="col-md-12" id="descrption-container">
            <h3>What will we do?</h3>
            <p class="event-description">{{ $event->description }}</p>
            <p><ion-icon name="location-outline"></ion-icon>Event date: {{ date('d/m/Y', strtotime($event->date)) }}</p>
        </div>
    </div>
    <div>
        <a href="/events/edit/{{ $event->id }}" class="btn btn-primary">Edit</a>
        <form action="/events/destroy/{{$event->id}}" method="POST" class="delete-form" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger delete-btn" value="Delete"><ion-icon name="trash-outline"></ion-icon>Delete</button>
        </form>
    </div>
</div>
@endsection