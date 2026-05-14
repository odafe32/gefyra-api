@extends('emails.layout.gefyra')

@section('title', 'New Booking — Gefyra Admin')

@section('content')

    {{-- ── Heading ── --}}
    <h2 class="heading" style="margin:0 0 8px 0;font-family:Georgia,serif;font-size:26px;font-weight:700;color:#1A1A1A;letter-spacing:-0.5px;">New Booking Request</h2>
    <p style="margin:0 0 28px 0;font-family:Georgia,serif;font-size:15px;color:#777777;line-height:1.7;">
        A new booking was submitted on the Gefyra website. Review the details below.
    </p>

    {{-- ── Status + ID row ── --}}
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:28px;">
        <tr>
            <td>
                <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td style="background-color:#FAF0DC;border:1px solid #E8DFC8;border-radius:20px;padding:6px 16px;">
                            <span style="font-family:Georgia,serif;font-size:11px;font-weight:700;color:#C8871F;text-transform:uppercase;letter-spacing:1.5px;">&#9679; Pending Review</span>
                        </td>
                        <td style="padding-left:12px;">
                            <span style="font-family:Georgia,serif;font-size:12px;color:#AAAAAA;">Booking #{{ $booking->id }}</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    {{-- ── Booking details card ── --}}
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
           style="background-color:#FDFAF5;border:1px solid #E8DFC8;border-radius:12px;margin-bottom:28px;">
        <tr>
            <td style="padding:24px 28px 8px 28px;">

                <p style="margin:0 0 20px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#C8871F;text-transform:uppercase;letter-spacing:2px;">Booking Details</p>

                {{-- Divider --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:20px;">
                    <tr><td style="height:1px;background-color:#E8DFC8;font-size:0;line-height:0;">&nbsp;</td></tr>
                </table>

                {{-- Date & Time --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:18px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#128197;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Requested Date &amp; Time</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;font-weight:700;color:#1A1A1A;">
                                {{ $booking->booking_date->format('l, F j, Y') }} &mdash; {{ $booking->booking_time }}
                            </p>
                        </td>
                    </tr>
                </table>

                {{-- Service --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:18px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#9733;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Service Type</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;font-weight:700;color:#1A1A1A;">{{ $serviceName }}</p>
                        </td>
                    </tr>
                </table>

                {{-- Submitted at --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:20px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#128336;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Submitted At</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;color:#1A1A1A;">{{ $booking->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </td>
                    </tr>
                </table>

                {{-- Divider --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:20px;">
                    <tr><td style="height:1px;background-color:#E8DFC8;font-size:0;line-height:0;">&nbsp;</td></tr>
                </table>

                <p style="margin:0 0 16px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#1A1A1A;text-transform:uppercase;letter-spacing:2px;">Client Information</p>

                {{-- Name --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:18px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#128100;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Full Name</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;font-weight:700;color:#1A1A1A;">{{ $booking->full_name }}</p>
                        </td>
                    </tr>
                </table>

                {{-- Email --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:18px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#9993;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Email</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;color:#1A1A1A;">{{ $booking->email }}</p>
                        </td>
                    </tr>
                </table>

                @if($booking->phone)
                {{-- Phone --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:18px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#128222;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Phone</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;color:#1A1A1A;">{{ $booking->phone }}</p>
                        </td>
                    </tr>
                </table>
                @endif

                @if($booking->message)
                {{-- Message --}}
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom:8px;">
                    <tr>
                        <td width="36" valign="top" style="padding-right:14px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td style="width:36px;height:36px;background-color:#FAF0DC;border-radius:8px;text-align:center;vertical-align:middle;">
                                        <span style="font-size:16px;line-height:36px;">&#128172;</span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td valign="top">
                            <p style="margin:0 0 3px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#777777;text-transform:uppercase;letter-spacing:1px;">Additional Message</p>
                            <p style="margin:0;font-family:Georgia,serif;font-size:15px;color:#555555;line-height:1.6;">{{ nl2br(e($booking->message)) }}</p>
                        </td>
                    </tr>
                </table>
                @endif

                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr><td style="height:8px;font-size:0;line-height:0;">&nbsp;</td></tr>
                </table>

            </td>
        </tr>
    </table>

    {{-- ── Body text ── --}}
    <p style="margin:0 0 24px 0;font-family:Georgia,serif;font-size:14px;color:#777777;line-height:1.7;">
        Please contact the client to confirm or reschedule the appointment.
    </p>

    {{-- ── CTA buttons ── --}}
    <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto;">
        <tr>
            <td style="border-radius:10px;background-color:#C8871F;padding-right:10px;">
                <a href="mailto:{{ $booking->email }}"
                   style="display:inline-block;padding:13px 28px;font-family:Georgia,serif;font-size:13px;font-weight:700;color:#ffffff;text-decoration:none;letter-spacing:0.5px;">
                    &#9993; Reply to Client
                </a>
            </td>
            @if($booking->phone)
            <td style="border-radius:10px;background-color:#1A1A1A;">
                <a href="tel:{{ $booking->phone }}"
                   style="display:inline-block;padding:13px 28px;font-family:Georgia,serif;font-size:13px;font-weight:700;color:#ffffff;text-decoration:none;letter-spacing:0.5px;">
                    &#128222; Call Client
                </a>
            </td>
            @endif
        </tr>
    </table>

@endsection