@extends('emails.layout.gefyra')

@section('title', $subject)

@section('content')

    {{-- ── Content ── --}}
    <div style="font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:15px;color:#555555;line-height:1.75;">
        {!! $content !!}
    </div>

    @if($unsubscribeUrl)
    {{-- ── Footer ── --}}
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:32px;padding-top:20px;border-top:1px solid #E8DFC8;">
        <tr>
            <td>
                <p style="margin:0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;color:#AAAAAA;text-align:center;">
                    You received this because you're subscribed to Gefyra updates.<br>
                    <a href="{{ $unsubscribeUrl }}" style="color:#C8871F;text-decoration:none;font-weight:600;">Unsubscribe</a>
                </p>
            </td>
        </tr>
    </table>
    @endif

@endsection
