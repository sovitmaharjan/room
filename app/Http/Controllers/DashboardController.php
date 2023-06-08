<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        $data['room_count'] = Room::get()->count();
        $data['room_count_by_type'] = Room::groupBy('room_type_id')->select('room_type_id', DB::raw('count(*) as count'))->get();
        $data['booked_room_count'] = Room::whereHas('bookings')->get()->count();
        $data['booked_room_count_by_type'] = Room::whereHas('bookings')->groupBy('room_type_id')->select('room_type_id', DB::raw('count(*) as count'))->get();
        $data['today_booked_room_count'] = Room::where('created_at', '>', now()->format('Y-m-d'))->where('created_at', '<', now()->addDays()->format('Y-m-d'))->whereHas('bookings')->get()->count();
        $data['total_revenue'] = Room::whereHas('bookings', function($q) {
            $q->whereHas('statuses', function ($q1) {
                $q1->orderByDesc('updated_at')->limit(1)->where('status', 'confirmed');
            });
        })->sum('price');
        $data['today_revenue'] = Room::where('created_at', '>', now()->format('Y-m-d'))->where('created_at', '<', now()->addDays()->format('Y-m-d'))->whereHas('bookings', function($q) {
            $q->whereHas('statuses', function ($q) {
                $q->orderByDesc('updated_at')->limit(1)->where('status', 'confirmed');
            });
        })->sum('price');
        return view('dashboard', $data);
    }
}
