<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gefyra')</title>
    <style>
        /* Reset styles */
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        /* Brand Colors */
        :root {
            --gold: #C8871F;
            --ink: #1A1A1A;
            --warm: #FAF5EC;
            --slate: #555555;
            --line: #E8DFC8;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #FAF5EC;
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
        }

        /* Header */
        .email-header {
            background: linear-gradient(135deg, #1A1A1A 0%, #2d2d2d 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .email-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(600px 300px at 80% 0%, rgba(200,135,31,0.15), transparent 60%);
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
        }

        .brand-name {
            color: #ffffff;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.02em;
            margin: 0;
        }

        .tagline {
            color: rgba(255,255,255,0.6);
            font-size: 13px;
            margin-top: 8px;
            letter-spacing: 0.05em;
        }

        /* Content */
        .email-body {
            padding: 40px 30px;
        }

        .content-title {
            color: #1A1A1A;
            font-size: 24px;
            font-weight: 800;
            margin: 0 0 20px 0;
            letter-spacing: -0.02em;
        }

        .content-text {
            color: #555555;
            font-size: 15px;
            line-height: 1.7;
            margin: 0 0 20px 0;
        }

        /* Booking Card */
        .booking-card {
            background: linear-gradient(135deg, #FAF5EC 0%, #ffffff 100%);
            border: 1px solid #E8DFC8;
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
        }

        .booking-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #E8DFC8;
        }

        .booking-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #C8871F 0%, #a06d18 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .booking-icon svg {
            width: 24px;
            height: 24px;
            color: #ffffff;
        }

        .booking-card-title {
            color: #1A1A1A;
            font-size: 18px;
            font-weight: 800;
            margin: 0;
        }

        .booking-card-subtitle {
            color: #C8871F;
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-top: 4px;
        }

        /* Detail Rows */
        .detail-row {
            display: flex;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .detail-icon {
            width: 36px;
            height: 36px;
            background: rgba(200,135,31,0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 14px;
            flex-shrink: 0;
        }

        .detail-icon svg {
            width: 18px;
            height: 18px;
            color: #C8871F;
        }

        .detail-content {
            flex: 1;
        }

        .detail-label {
            color: #555555;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 4px;
        }

        .detail-value {
            color: #1A1A1A;
            font-size: 15px;
            font-weight: 600;
        }

        /* CTA Button */
        .cta-container {
            text-align: center;
            margin: 30px 0;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #C8871F 0%, #a06d18 100%);
            color: #ffffff !important;
            text-decoration: none;
            padding: 14px 32px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 4px 16px rgba(200,135,31,0.3);
        }

        /* Footer */
        .email-footer {
            background: #1A1A1A;
            padding: 30px;
            text-align: center;
        }

        .footer-logo {
            color: #C8871F;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .footer-text {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .footer-link {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 13px;
        }

        .footer-social {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .social-icon {
            width: 34px;
            height: 34px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .social-icon svg {
            width: 16px;
            height: 16px;
            color: rgba(255,255,255,0.6);
        }

        .footer-bottom {
            color: rgba(255,255,255,0.3);
            font-size: 12px;
        }

        .footer-tech {
            color: #C8871F;
            font-weight: 600;
            text-decoration: none;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-pending {
            background: rgba(200,135,31,0.15);
            color: #C8871F;
        }

        .status-confirmed {
            background: rgba(43,139,61,0.15);
            color: #2B8B3D;
        }

        /* Divider */
        .divider {
            height: 1px;
            background: #E8DFC8;
            margin: 30px 0;
        }

        /* Responsive */
        @media screen and (max-width: 600px) {
            .email-header {
                padding: 30px 20px;
            }

            .email-body {
                padding: 30px 20px;
            }

            .booking-card {
                padding: 20px;
            }

            .brand-name {
                font-size: 24px;
            }

            .content-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td align="center" style="padding: 20px 0;">
                <div class="email-wrapper">
                    <!-- Header -->
                    <div class="email-header">
                        <div class="header-content">
                            <div class="logo">
                                <img src="https://res.cloudinary.com/dllrkis3c/image/upload/v1778407242/IMG_0262_jpo5xo.png" alt="Gefyra">
                            </div>
                            <h1 class="brand-name">Gefyra</h1>
                            <p class="tagline">Every talent, its place. Every client, their match.</p>
                        </div>
                    </div>

                    <!-- Body Content -->
                    <div class="email-body">
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <div class="email-footer">
                        <div class="footer-logo">Gefyra</div>
                        <p class="footer-text">
                            Connecting African talent with global businesses.<br>
                            Consulting & Digital Agency
                        </p>
                        <div class="footer-links">
                            <a href="https://gefyra.agency" class="footer-link">Website</a>
                            <a href="https://gefyra.agency/about" class="footer-link">About</a>
                            <a href="mailto:info@gefyra.agency" class="footer-link">Contact</a>
                        </div>
                        <div class="footer-social">
                            <a href="https://www.linkedin.com/company/gefyraconsultingagency/" class="social-icon" style="text-decoration: none;">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/></svg>
                            </a>
                            <a href="https://www.instagram.com/gefyra__/" class="social-icon" style="text-decoration: none;">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                        </div>
                        <p class="footer-bottom">
                            © {{ date('Y') }} Gefyra Consulting & Digital Agency<br>
                            <span style="color: rgba(255,255,255,0.4);">Tech Partners</span>
                            <a href="https://kagayakiglobal.cloud/" class="footer-tech">Kagayaki Global</a>
                        </p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
