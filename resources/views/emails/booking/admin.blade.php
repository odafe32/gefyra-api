@extends('emails.layout.gefyra')

@section('title', 'New Booking Request - Gefyra')

@section('content')
<h2 class="content-title">New Booking Request!</h2>
<p class="content-text">
    A new booking has been submitted on the Gefyra website. Here are the details:
</p>

<!-- Booking Card -->
<div class="booking-card">
    <div class="booking-card-header">
        <div class="booking-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
        </div>
        <div>
            <h3 class="booking-card-title">Booking Details</h3>
            <div class="booking-card-subtitle">ID: #{{ $booking->id }}</div>
        </div>
    </div>

    <!-- Status -->
    <div class="detail-row">
        <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
        </div>
        <div class="detail-content">
            <div class="detail-label">Status</div>
            <div class="detail-value">
                <span class="status-badge status-pending">Pending</span>
            </div>
        </div>
    </div>

    <!-- Date & Time -->
    <div class="detail-row">
        <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
        </div>
        <div class="detail-content">
            <div class="detail-label">Requested Date & Time</div>
            <div class="detail-value">
                {{ $booking->booking_date->format('l, F j, Y') }} at {{ $booking->booking_time }}
            </div>
        </div>
    </div>

    <!-- Service -->
    <div class="detail-row">
        <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                <line x1="12" y1="22.08" x2="12" y2="12"></line>
            </svg>
        </div>
        <div class="detail-content">
            <div class="detail-label">Service Type</div>
            <div class="detail-value">{{ $serviceName }}</div>
        </div>
    </div>

    <div class="divider"></div>

    <!-- Client Details -->
    <div style="margin-top: 20px;">
        <h4 style="color: #1A1A1A; font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 16px;">Client Information</h4>

        <div class="detail-row">
            <div class="detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="detail-content">
                <div class="detail-label">Full Name</div>
                <div class="detail-value">{{ $booking->full_name }}</div>
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <div class="detail-content">
                <div class="detail-label">Email</div>
                <div class="detail-value">{{ $booking->email }}</div>
            </div>
        </div>

        @if($booking->phone)
        <div class="detail-row">
            <div class="detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
            </div>
            <div class="detail-content">
                <div class="detail-label">Phone</div>
                <div class="detail-value">{{ $booking->phone }}</div>
            </div>
        </div>
        @endif

        @if($booking->message)
        <div class="detail-row">
            <div class="detail-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="17" y1="10" x2="3" y2="10"></line>
                    <line x1="21" y1="6" x2="3" y2="6"></line>
                    <line x1="21" y1="14" x2="3" y2="14"></line>
                    <line x1="17" y1="18" x2="3" y2="18"></line>
                </svg>
            </div>
            <div class="detail-content">
                <div class="detail-label">Additional Message</div>
                <div class="detail-value" style="font-weight: 400; line-height: 1.6;">{{ nl2br(e($booking->message)) }}</div>
            </div>
        </div>
        @endif
    </div>

    <div class="divider"></div>

    <!-- Submission Info -->
    <div class="detail-row" style="margin-top: 10px;">
        <div class="detail-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
        </div>
        <div class="detail-content">
            <div class="detail-label">Submitted At</div>
            <div class="detail-value">{{ $booking->created_at->format('F j, Y \a\t g:i A') }}</div>
        </div>
    </div>
</div>

<p class="content-text">
    Please review this booking and contact the client to confirm the appointment. You can manage all bookings from the admin dashboard.
</p>

<div class="cta-container">
    <a href="mailto:{{ $booking->email }}" class="cta-button" style="margin-right: 10px;">Reply to Client</a>
    <a href="tel:{{ $booking->phone }}" class="cta-button" style="background: #1A1A1A;">Call Client</a>
</div>
@endsection
