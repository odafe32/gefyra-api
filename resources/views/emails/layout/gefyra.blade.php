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
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap');
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; background-color: #F5EDD8; width: 100% !important; font-family: 'DM Sans', -apple-system, Arial, sans-serif; }
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
<body style="margin:0;padding:0;background-color:#F5EDD8;font-family:'DM Sans',-apple-system,Arial,sans-serif;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#F5EDD8;">
    <tr>
        <td align="center" style="padding:32px 16px;">

            <table class="email-wrapper" role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;box-shadow:0 4px 32px rgba(26,26,26,0.10);">

                <!-- HEADER -->
                <tr>
                    <td style="background-color:#1A1A1A;padding:40px 40px 32px 40px;text-align:center;">
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
                                    <p style="margin:0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:32px;font-weight:700;color:#C8871F;letter-spacing:-1px;line-height:1;">Gefyra</p>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding-top:8px;">
                                    <p style="margin:0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:11px;color:rgba(255,255,255,0.45);letter-spacing:2.5px;text-transform:uppercase;font-weight:500;">Every talent, its place. Every client, their match.</p>
                                </td>
                            </tr>
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

                <!-- BODY -->
                <tr>
                    <td class="email-body-pad" style="padding:40px 40px 32px 40px;background-color:#ffffff;">
                        @yield('content')
                    </td>
                </tr>

                <!-- FOOTER -->
                <tr>
                    <td style="background-color:#1A1A1A;padding:32px 40px;text-align:center;">

                        <p style="margin:0 0 6px 0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:20px;font-weight:700;color:#C8871F;">Gefyra</p>
                        <p style="margin:0 0 20px 0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;color:rgba(255,255,255,0.45);line-height:1.7;">Connecting African talent with global businesses.</p>

                        <!-- Footer nav links -->
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 24px auto;">
                            <tr>
                                <td style="padding:0 10px;">
                                    <a href="https://gefyra.agency" style="font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;font-weight:500;color:rgba(255,255,255,0.55);text-decoration:none;">Website</a>
                                </td>
                                <td style="color:rgba(255,255,255,0.2);font-size:12px;">&middot;</td>
                                <td style="padding:0 10px;">
                                    <a href="https://gefyra.agency/about" style="font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;font-weight:500;color:rgba(255,255,255,0.55);text-decoration:none;">About</a>
                                </td>
                                <td style="color:rgba(255,255,255,0.2);font-size:12px;">&middot;</td>
                                <td style="padding:0 10px;">
                                    <a href="mailto:info@gefyra.agency" style="font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;font-weight:500;color:rgba(255,255,255,0.55);text-decoration:none;">Contact</a>
                                </td>
                            </tr>
                        </table>

                        <!-- Social buttons — pure text, 100% email-client safe -->
                        <table role="presentation" cellpadding="0" cellspacing="0" border="0" align="center" style="margin:0 auto 24px auto;">
                            <tr>
                                <td style="padding:0 5px;">
                                    <a href="https://www.linkedin.com/company/gefyraconsultingagency/"
                                       style="display:inline-block;background-color:#0A66C2;border-radius:8px;padding:9px 18px;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;font-weight:700;color:#ffffff;text-decoration:none;letter-spacing:0.5px;">
                                        in &nbsp; LinkedIn
                                    </a>
                                </td>
                                <td style="padding:0 5px;">
                                    <a href="https://www.instagram.com/gefyra__/"
                                       style="display:inline-block;background-color:#C13584;border-radius:8px;padding:9px 18px;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:12px;font-weight:700;color:#ffffff;text-decoration:none;letter-spacing:0.5px;">
                                        &#9679; &nbsp; Instagram
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p style="margin:0;font-family:'DM Sans',-apple-system,Arial,sans-serif;font-size:11px;color:rgba(255,255,255,0.25);line-height:1.7;">
                            &copy; {{ date('Y') }} Gefyra Consulting &amp; Digital Agency
                        </p>

                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>