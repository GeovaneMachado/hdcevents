<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $search = request('search');
        if ($search) {
            $events = Event::where([
                ['title', 'like', '%' . $search . '%']
            ])->get();
            return view('welcome', ['events' => $events, 'search' => $search]);
        } 
        $events = Event::all();
        
        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function contact()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->items = $request->items;
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $event->image = $imageName;
        }
        $user = auth()->user();
        $event->user_id = $user->id;
        $event->save();
        return redirect('/')->with('msg', 'Event created successfully!');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Event deleted successfully!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', ['event' => $event]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $events = $user->events;
        return view('events.dashboard', ['events' => $events]);
    }

    public function products($id = null)
    {
        $products =  [
            ['id' => 1, 'name' => 'Product 1', 'price' => 10],
            ['id' => 2, 'name' => 'Product 2', 'price' => 20],
            ['id' => 3, 'name' => 'Product 3', 'price' => 30],
            ['id' => 4, 'name' => 'Product 4', 'price' => 40],
            ['id' => 5, 'name' => 'Product 5', 'price' => 50],
            ['id' => 6, 'name' => 'Product 6', 'price' => 60],
            ['id' => 7, 'name' => 'Product 7', 'price' => 70],
            ['id' => 8, 'name' => 'Product 8', 'price' => 80],
            ['id' => 9, 'name' => 'Product 9', 'price' => 90],
            ['id' => 10, 'name' => 'Product 10', 'price' => 100],
            ['id' => 11, 'name' => 'Product 11', 'price' => 110],
        ];
        return view('products', ['products' => $products]);
    }
}
