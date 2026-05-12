<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Get all bookings (for admin)
     */
    public function index(): JsonResponse
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $bookings,
        ]);
    }

    /**
     * Create a new booking
     */
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'serviceType' => 'required|string|in:va,smm,writer,mktg,dev',
            'message' => 'nullable|string|max:2000',
            'bookingDate' => 'required|date|after_or_equal:today',
            'bookingTime' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create booking
            $booking = Booking::create([
                'full_name' => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'service_type' => $request->serviceType,
                'message' => $request->message,
                'booking_date' => $request->bookingDate,
                'booking_time' => $request->bookingTime,
                'status' => Booking::STATUS_PENDING,
            ]);

            // Send confirmation email to client
            try {
                Mail::to($booking->email)->send(new BookingConfirmation($booking, false));
            } catch (\Exception $e) {
                Log::error('Failed to send client confirmation email: ' . $e->getMessage());
            }

            // Send notification email to admin
            try {
                $adminEmail = config('mail.admin_email');
                if ($adminEmail) {
                    Mail::to($adminEmail)->send(new BookingConfirmation($booking, true));
                }
            } catch (\Exception $e) {
                Log::error('Failed to send admin notification email: ' . $e->getMessage());
            }

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully',
                'data' => $booking,
            ], 201);

        } catch (\Exception $e) {
            Log::error('Booking creation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to create booking. Please try again.',
            ], 500);
        }
    }

    /**
     * Get a specific booking
     */
    public function show(Booking $booking): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $booking,
        ]);
    }

    /**
     * Update booking status
     */
    public function updateStatus(Request $request, Booking $booking): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|string|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $booking->update([
            'status' => $request->status,
            'notes' => $request->notes ?? $booking->notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking status updated successfully',
            'data' => $booking,
        ]);
    }

    /**
     * Delete a booking
     */
    public function destroy(Booking $booking): JsonResponse
    {
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted successfully',
        ]);
    }

    /**
     * Get available time slots for a date
     */
    public function getAvailableSlots(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date|after_or_equal:today',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid date provided',
            ], 422);
        }

        $date = $request->date;
        $allSlots = [
            '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM',
            '02:00 PM', '03:00 PM', '04:00 PM', '05:00 PM',
        ];

        // Get booked slots for the date
        $bookedSlots = Booking::where('booking_date', $date)
            ->whereIn('status', [Booking::STATUS_PENDING, Booking::STATUS_CONFIRMED])
            ->pluck('booking_time')
            ->toArray();

        // Filter out booked slots
        $availableSlots = array_diff($allSlots, $bookedSlots);

        return response()->json([
            'success' => true,
            'data' => [
                'date' => $date,
                'availableSlots' => array_values($availableSlots),
                'bookedSlots' => $bookedSlots,
            ],
        ]);
    }

    /**
     * Get booking statistics (for admin dashboard)
     */
    public function statistics(): JsonResponse
    {
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::where('status', Booking::STATUS_PENDING)->count(),
            'confirmed' => Booking::where('status', Booking::STATUS_CONFIRMED)->count(),
            'completed' => Booking::where('status', Booking::STATUS_COMPLETED)->count(),
            'cancelled' => Booking::where('status', Booking::STATUS_CANCELLED)->count(),
            'today' => Booking::whereDate('booking_date', today())->count(),
            'thisWeek' => Booking::whereBetween('booking_date', [now()->startOfWeek(), now()->endOfWeek()])->count(),
            'thisMonth' => Booking::whereMonth('booking_date', now()->month)
                ->whereYear('booking_date', now()->year)
                ->count(),
        ];

        return response()->json([
            'success' => true,
            'data' => $stats,
        ]);
    }
}
