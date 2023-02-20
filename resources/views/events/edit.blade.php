@extends('layouts.main')

@section('title', 'Editing event ' . $event->title)
@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editing: {{$event->title}}</h1>
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="image">Image of event:</label>
        <input type="file" class="form-control-file" id="image" name="image">
        <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
    </div>
    <div class="form-group">
        <label for="title">Event:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Name of the event" value="{{$event->title}}">
    </div>
    <div class="form-group">
        <label for="date">Event date: </label>
        <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
    </div>
    <div class="form-group">
        <label for="title">City:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Location city" value="{{$event->city}}">
    </div>
    <div class="form-group">
        <label for="title">Event is private</label>
        <select type="text" class="form-control" id="private" name="private">
            <option value="0">No</option>
            <option value="1"{{$event->private == 1 ? "selected='selected'": ""}}>Yes</option>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Descripiton: </label>
        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description of the event">{{$event->description}}</textarea>
    </div>
    <div class="form-group">
        <label for="title">Add infrastructure items:: </label>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Chairs"> Chairs
        </div> 
        <div class="form-group">
            <input type="checkbox" name="items[]" value="stage"> Stage
        </div> 
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Free beer"> Free beer
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Open Food"> Open Food
        </div>
        <div class="form-group">
            <input type="checkbox" name="items[]" value="Gifts"> Gifts
        </div>
        
    </div>
    <input type="submit" class="btn btn-primary" value="Save">
    </form>

</div>
@endsection