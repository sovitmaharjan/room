<?php

namespace App\Http\Controllers;

use App\Http\Requests\Booking\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('RoleCustomer')->only(['create', 'store']);
    }

    public function index()
    {
        $user = User::find(auth()->id());
        $data['status'] = $user->hasRole(User::ADMIN) ? [
            'Confirm' => Booking::CONFIRMED,
            'Reject' => Booking::REJECTED,
        ] : [
            'Cancel' => Booking::CANCELLED,
        ];
        $data['bookings'] = Booking::when(!$user->hasRole(User::ADMIN), function ($q) {
            $q->where('user_id', auth()->id());
        })->orderBy('created_at', 'desc')->orderBy('updated_at', 'desc')->get();
        return view('booking.index', $data);
    }

    public function create($room_id)
    {
        $data['room'] = Room::find($room_id);
        return view('booking.create', $data);
    }

    public function store(StoreBookingRequest $request, $room_id)
    {
        DB::beginTransaction();
        try {
            $data = [
                'user_id' => auth()->id(),
                'room_id' => $room_id,
                'from' => $request->from,
                'to' => $request->to,
                'duration' => Carbon::parse($request->to_date)->diffInDays(Carbon::parse($request->from_date)) + 1,
                'extra' => [
                    'phone' => $request->phone
                ]
            ];
            $booking = Booking::firstOrCreate(
                [
                    'user_id' => auth()->id(),
                    'room_id' => $room_id,
                    'from' => $request->from,
                    'to' => $request->to,
                ],
                [
                    'duration' => Carbon::parse($request->to_date)->diffInDays(Carbon::parse($request->from_date)) + 1,
                    'extra' => [
                        'phone' => $request->phone
                    ]
                ]
            );
            $booking->statuses()->firstOrCreate(['status' => Booking::PENDING]);
            DB::commit();
            return redirect()->route('booking.index')->with('success', 'Booking has been created');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function updateStatus($id, Request $request)
    {
        try {
            $user = User::find(auth()->id());
            if ($user->hasRole(User::ADMIN)) {
                if (!in_array($request->status, [Booking::CONFIRMED, Booking::REJECTED])) {
                    throw new Exception('Invalid Status');
                }
            } else {
                if (!in_array($request->status, [Booking::CANCELLED])) {
                    throw new Exception('Invalid Status');
                }
            }
            $booking = Booking::where('id', $id)->when(!$user->hasRole(User::ADMIN), function ($q) {
                $q->where('user_id', auth()->id());
            })->first;
            if (!$booking) {
                throw new Exception('Order not found');
            }
            $booking->statuses()->create(['status' => $request->status]);
            DB::commit();
            return redirect()->route('booking.index')->with('success', 'Booking has been created');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
