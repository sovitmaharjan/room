<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomType\StoreRoomTypeRequest;
use App\Http\Requests\RoomType\UpdateRoomTypeRequest;
use App\Models\RoomType;
use Exception;

class RoomTypeController extends Controller
{
    public function index()
    {
        $data['room_type'] = RoomType::orderBy('updated_at', 'desc')->get();
        return view('room-type.index', $data);
    }

    public function create()
    {
        return view('room-type.create');
    }

    public function store(StoreRoomTypeRequest $request)
    {
        try {
            RoomType::create($request->validated());
            return back()->with('success', 'Room type has been created');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(RoomType $room_type)
    {
        $data['room_type'] = $room_type;
        return view('room-type.edit', $data);
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $room_type)
    {
        try {
            $room_type->update($request->validated());
            return back()->with('success', 'Room type has been updated');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(RoomType $room_type)
    {
        try {
            $room_type->delete();
            return redirect()->route('room-type.index')->with('success', 'Room type has been deleted');
        } catch (Exception $e) {
            return redirect()->route('room-type.index')->with('error', $e->getMessage());
        }
    }
}
