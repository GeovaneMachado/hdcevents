@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
<div id="search-container" class="col-md-12">
    <h1>Find a event near you</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if ($search)
        <h2>Search results: {{$search}}</h2>
    @else
        <h2>Next events</h2>
    @endif    
    <p class="subtitle">See the events of the next days</p>
    <div id="cards-container" class="row">
        @foreach ($events as $event)
        <div class="card col-md-3">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            <div class="card-body">
                <p class="card-date">{{date('d/m/Y', strtotime($event->date))}}</p>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participants">X Participantes</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">See event</a>
            </div>
        </div>
        @endforeach
    </div>
    @if (count($events) == 0 && $search)
        <p>No events found for <strong>{{$search}}</strong><br><a href="/">view all events</a></p>
    @elseif (count($events) == 0)
        <p>No events found...</p>
    @endif
</div>
@endsection