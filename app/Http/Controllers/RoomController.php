<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Exception;

class RoomController extends Controller
{
    public function index()
    {
        $data['room'] = Room::orderBy('updated_at', 'desc')->paginate(4);
        return view('room.index', $data);
    }

    public function create()
    {
        $data['room_type'] = RoomType::orderBy('updated_at', 'desc')->get();
        return view('room.create', $data);
    }

    public function store(StoreRoomRequest $request)
    {
        try {
            Room::create($request->validated());
            return back()->with('success', 'Room type has been created');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Room $room)
    {
        $data['room'] = $room;
        return view('room.edit', $data);
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        try {
            $room->update($request->validated());
            return back()->with('success', 'Room type has been updated');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Room $room)
    {
        try {
            $room->delete();
            return redirect()->route('room.index')->with('success', 'Room type has been deleted');
        } catch (Exception $e) {
            return redirect()->route('room.index')->with('error', $e->getMessage());
        }
    }
}
