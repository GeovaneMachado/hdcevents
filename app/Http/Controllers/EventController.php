<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('welcome', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function contact()
    {
        return view('contact');
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
