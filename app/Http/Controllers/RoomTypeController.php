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
        $data['roomType'] = RoomType::all();
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

    public function edit(RoomType $roomType)
    {
        $data['roomType'] = $roomType;
        return view('room-type.edit', $data);
    }

    public function update(UpdateRoomTypeRequest $request, RoomType $roomType)
    {
        try {
            $roomType->update($request->validated());
            return back()->with('success', 'Room type has been updated');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(RoomType $roomType)
    {
        try {
            $roomType->delete();
            return redirect()->route('room-type.index')->with('success', 'Room type has been deleted');
        } catch (Exception $e) {
            return redirect()->route('room-type.index')->with('error', $e->getMessage());
        }
    }
}
