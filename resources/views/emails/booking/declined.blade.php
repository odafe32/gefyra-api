@extends('emails.layout.gefyra')

@section('title', 'Booking Update — Gefyra')

@section('content')

<!-- Headline -->
<tr>
    <td class="email-body-pad" style="padding:40px 40px 0 40px;">
        <h1 class="heading" style="margin:0 0 8px 0;font-family:Georgia,serif;font-size:26px;font-weight:700;color:#1A1A1A;line-height:1.2;">
            Update on your booking request
        </h1>
        <p style="margin:0 0 28px 0;font-family:Georgia,serif;font-size:15px;color:#555555;line-height:1.6;">
            Hi {{ $booking->full_name }}, thank you for your interest in Gefyra. Unfortunately, we're unable to accommodate your booking request at this time.
        </p>
    </td>
</tr>

<!-- Booking Summary -->
<tr>
    <td style="padding:0 40px;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0"
               style="background-color:#F5EDD8;border-radius:12px;overflow:hidden;">
            <tr>
                <td style="padding:24px 28px;">
                    <p style="margin:0 0 4px 0;font-family:Georgia,serif;font-size:11px;font-weight:700;color:#C8871F;letter-spacing:0.1em;text-transform:uppercase;">Booking Reference</p>
                    <p style="margin:0 0 20px 0;font-family:Georgia,serif;font-size:18px;font-weight:700;color:#1A1A1A;">{{ $serviceName }}</p>

                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td width="50%" style="padding-bottom:12px;font-family:Georgia,serif;font-size:13px;color:#777777;">📅 Requested Date</td>
                            <td width="50%" style="padding-bottom:12px;font-family:Georgia,serif;font-size:13px;font-weight:600;color:#1A1A1A;">{{ \Carbon\Carbon::parse($booking->booking_date)->format('D, M j, Y') }}</td>
                        </tr>
                        <tr>
                            <td style="font-family:Georgia,serif;font-size:13px;color:#777777;">📋 Status</td>
                            <td style="font-family:Georgia,serif;font-size:13px;font-weight:700;color:#CC3333;">Declined</td>
                        </tr>
                    </table>

                    @if($notes)
                    <p style="margin:16px 0 0 0;font-family:Georgia,serif;font-size:13px;color:#555555;border-top:1px solid #E8DFC8;padding-top:16px;">
                        <strong style="color:#1A1A1A;">Reason:</strong> {{ $notes }}
                    </p>
                    @endif
                </td>
            </tr>
        </table>
    </td>
</tr>

<!-- CTA -->
<tr>
    <td style="padding:28px 40px 40px 40px;">
        <p style="margin:0 0 20px 0;font-family:Georgia,serif;font-size:14px;color:#555555;line-height:1.6;">
            We'd love to find another time that works. Feel free to submit a new booking request or reach out directly — we're happy to help.
        </p>
        <a href="https://gefyra.agency" style="display:inline-block;background-color:#C8871F;color:#ffffff;font-family:Georgia,serif;font-size:14px;font-weight:700;padding:14px 32px;border-radius:8px;text-decoration:none;">
            Book Again →
        </a>
    </td>
</tr>

@endsection
