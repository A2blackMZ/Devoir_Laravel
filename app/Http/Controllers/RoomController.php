<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('dashboard', compact('rooms'));
    }

    public function create()
    {
        return view('saveroom');
    }

    public function detail(Room $room)
    {
        return view('roomdetail', ['room' => $room]);
    }


    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request)->all();
        Room::create([
            'hotel_name' => $request->hotel_name,
            'description' => $request->description,
            'room_name' => $request->room_name,
            'price' => $request->price,
            'bed_numbers' => $request->bed_numbers,
            'adult_max' => $request->adult_max,
            'kid_max' => $request->kid_max,
            'features' => $request->input('features', []),
            'status' => $request->status
        ]);
        return redirect((route('dashboard')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
                //dd($product);
                return view('rooms.edit', ['rooms' => $room]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {

        $room->update([
            'hotel_name' => $request->hotel_name,
            'description' => $request->description,
            'room_name' => $request->room_name,
            'price' => $request->price,
            'bed_numbers' => $request->bed_numbers,
            'adult_max' => $request->adult_max,
            'kid_max' => $request->kid_max,
            'features' => $request->input('features', []),
            'status' => $request->status
        ]);


        return redirect(route('dashboard'))->with('success', 'Room Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect(route('dashboard'))->with('success', 'Room Deleted Successfully');
    }
}
