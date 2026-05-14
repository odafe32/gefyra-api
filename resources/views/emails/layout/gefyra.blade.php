<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title>@yield('title', 'Gefyra')</title>
    <!--[if mso]>
    <noscript><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml></noscript>
    <![endif]-->
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; background-color: #F5EDD8; width: 100% !important; }
        table { border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        a { text-decoration: none; }
        @media screen and (max-width: 600px) {
            .email-wrapper { width: 100% !important; }
            .email-body-pad { padding: 28px 20px !important; }
            .heading { font-size: 22px !important; }
            .cta-btn { display: block !important; margin-bottom: 10px !important; }
        }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#F5EDD8;font-family:Georgia,serif;">

<!-- Outer wrapper -->
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F5EDD8;">
    <tr>
        <td align="center" style="padding:32px 16px;">

            <!-- Email card -->
            <table class="email-wrapper" role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 32px rgba(26,26,26,0.10);">

                <!-- ═══════════════════════════════ HEADER ═══════════════════════════════ -->
                <tr>
                    <td style="background-color:#1A1A1A;padding:40px 40px 32px 40px;text-align:center;">

                        <!-- Logo mark -->
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td align="center" style="padding-bottom:20px;">
                                    <img src="https://res.cloudinary.com/dllrkis3c/image/upload/v1778407242/IMG_0262_jpo5xo.png"
                                         alt="Gefyra" width="56" height="56"
                                         style="display:block;border-radius:12px;width:56px;height:56px;">
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <p style="margin:0;font-family:Georgia,serif;font-size:32px;font-weight:700;color:#C8871F;letter-spacing:-0.5px;line-height:1;">Gefyra</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding-top:8px;">
                                    <p style="margin:0;font-family:Georgia,serif;font-size:12px;color:rgba(255,255,255,0.45);letter-spacing:2px;text-transform:uppercase;">Every talent, its place. Every client, their match.</p>
                                </td>
                            </tr>
                            <!-- Gold rule -->
                            <tr>
                                <td align="center" style="padding-top:28px;">
                                    <table role="presentation" cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td style="width:40px;height:1px;background-color:rgba(200,135,31,0.3);"></td>
                                            <td style="width:8px;height:8px;background-color:#C8871F;border-radius:50%;vertical-align:middle;padding:0 6px;"></td>
                                            <td style="width:40px;height:1px;background-color:rgba(200,135,31,0.3);"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- ═══════════════════════════════ BODY ════════════════════════════════ -->
                <tr>
                    <td class="email-body-pad" style="padding:40px 40px 32px 40px;background-color:#ffffff;">
                        @yield('content')
                    </td>
                </tr>

                <!-- ═══════════════════════════════ FOOTER ═══════════════════════════════ -->
                <tr>
                    <td style="background-color:#1A1A1A;padding:32px 40px;text-align:center;">

                        <p style="margin:0 0 6px 0;font-family:Georgia,serif;font-size:20px;font-weight:700;color:#C8871F;">Gefyra</p>
                        <p style="margin:0 0 20px 0;font-family:Georgia,serif;font-size:12px;color:rgba(255,255,255,0.4);line-height:1.6;">Connecting African talent with global businesses.</p>

                        <!-- Footer links -->
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 20px auto;">
                            <tr>
                                <td style="padding:0 10px;">
                                    <a href="https://gefyra.agency" style="font-family:Georgia,serif;font-size:12px;color:rgba(255,255,255,0.55);text-decoration:none;">Website</a>
                                </td>
                                <td style="color:rgba(255,255,255,0.2);font-size:12px;">|</td>
                                <td style="padding:0 10px;">
                                    <a href="https://gefyra.agency/about" style="font-family:Georgia,serif;font-size:12px;color:rgba(255,255,255,0.55);text-decoration:none;">About</a>
                                </td>
                                <td style="color:rgba(255,255,255,0.2);font-size:12px;">|</td>
                                <td style="padding:0 10px;">
                                    <a href="mailto:info@gefyra.agency" style="font-family:Georgia,serif;font-size:12px;color:rgba(255,255,255,0.55);text-decoration:none;">Contact</a>
                                </td>
                            </tr>
                        </table>

                        <!-- Social icons (text-based, reliable in all email clients) -->
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 24px auto;">
                            <tr>
                                <td style="padding:0 5px;">
                                    <a href="https://www.linkedin.com/company/gefyraconsultingagency/"
                                       style="display:inline-block;background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);border-radius:8px;padding:8px 14px;font-family:Georgia,serif;font-size:11px;color:rgba(255,255,255,0.6);text-decoration:none;letter-spacing:0.5px;">in</a>
                                </td>
                                <td style="padding:0 5px;">
                                    <a href="https://www.instagram.com/gefyra__/"
                                       style="display:inline-block;background-color:rgba(255,255,255,0.08);border:1px solid rgba(255,255,255,0.12);border-radius:8px;padding:8px 14px;font-family:Georgia,serif;font-size:11px;color:rgba(255,255,255,0.6);text-decoration:none;letter-spacing:0.5px;">ig</a>
                                </td>
                            </tr>
                        </table>

                        <p style="margin:0;font-family:Georgia,serif;font-size:11px;color:rgba(255,255,255,0.25);line-height:1.6;">
                            &copy; {{ date('Y') }} Gefyra Consulting &amp; Digital Agency
                        </p>

                    </td>
                </tr>

            </table>
            <!-- /Email card -->

        </td>
    </tr>
</table>

</body>
</html>