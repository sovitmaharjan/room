<?php

namespace App\Http\Controllers;

use App\Http\Requests\Room\StoreRoomRequest;
use App\Http\Requests\Room\UpdateRoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use Exception;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $data['rooms'] = Room::orderBy('updated_at', 'desc')->paginate(4);
        return view('room.index', $data);
    }

    public function create()
    {
        $data['room_type'] = RoomType::orderBy('updated_at', 'desc')->get();
        return view('room.create', $data);
    }

    public function store(StoreRoomRequest $request)
    {
        DB::beginTransaction();
        try {
            $room = Room::create($request->validated());
            if (isset($request->image) && $request->image != null) {
                $room->addMedia($request->image)->toMediaCollection('image');
            }
            DB::commit();
            return back()->with('success', 'Room type has been created');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show(Room $room)
    {
        $data['room'] = $room;
        return view('room.show', $data);
    }

    public function edit(Room $room)
    {
        $data['room_type'] = RoomType::orderBy('updated_at', 'desc')->get();
        $data['room'] = $room;
        return view('room.edit', $data);
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        DB::beginTransaction();
        try {
            $room->update($request->validated());
            if (isset($request->image) && $request->image != null) {
                $room->clearMediaCollection('image');
                $room->addMedia($request->image)->toMediaCollection('image');
            }
            DB::commit();
            return back()->with('success', 'Room type has been updated');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->clearMediaCollection('image');
            $room->delete();
            DB::commit();
            return redirect()->route('room.index')->with('success', 'Room type has been deleted');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('room.index')->with('error', $e->getMessage());
        }
    }
}
