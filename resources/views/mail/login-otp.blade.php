<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Your Login Code — Alchemists Aureum Bank</title>
</head>
<body style="margin:0;padding:0;background:#f3f4f6;font-family:'Inter',Arial,sans-serif">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f3f4f6;padding:40px 0">
  <tr>
    <td align="center">
      <table width="590" cellpadding="0" cellspacing="0" style="max-width:590px;width:100%">

        <!-- Header -->
        <tr>
          <td style="background:#003D2B;border-radius:14px 14px 0 0;padding:32px 40px;text-align:center">
            <div style="display:inline-block;background:rgba(200,149,43,.15);border:1.5px solid rgba(200,149,43,.35);border-radius:50px;padding:6px 18px;margin-bottom:18px">
              <span style="color:#E5AF40;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase">Security Notice</span>
            </div>
            <div style="width:62px;height:62px;background:linear-gradient(135deg,#C8952B,#E5AF40);border-radius:50%;margin:0 auto 14px;display:flex;align-items:center;justify-content:center">
              <span style="font-size:26px;line-height:62px;display:block;text-align:center">🔐</span>
            </div>
            <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:700;letter-spacing:-.3px">Login Verification Code</h1>
            <p style="margin:8px 0 0;color:rgba(255,255,255,.65);font-size:14px">Alchemists Aureum Bank</p>
          </td>
        </tr>

        <!-- Body -->
        <tr>
          <td style="background:#ffffff;padding:36px 40px">

            <p style="margin:0 0 6px;color:#111827;font-size:16px;font-weight:600">Hello {{ $first_name }},</p>
            <p style="margin:0 0 28px;color:#6b7280;font-size:14px;line-height:1.6">
              We received a sign-in request for your account. Use the one-time code below to complete your login. This code expires in <strong style="color:#003D2B">10 minutes</strong>.
            </p>

            <!-- OTP Box -->
            <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom:28px">
              <tr>
                <td align="center">
                  <div style="background:linear-gradient(135deg,#003D2B,#005C41);border-radius:12px;padding:28px 20px;display:inline-block;width:100%;box-sizing:border-box">
                    <p style="margin:0 0 8px;color:rgba(255,255,255,.65);font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;text-align:center">Your One-Time Code</p>
                    <p style="margin:0;color:#E5AF40;font-size:40px;font-weight:800;letter-spacing:14px;text-align:center;font-family:'Courier New',monospace">{{ $otp }}</p>
                  </div>
                </td>
              </tr>
            </table>

            <!-- Instructions -->
            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f9fafb;border-radius:10px;padding:18px 20px;margin-bottom:28px">
              <tr>
                <td>
                  <p style="margin:0 0 10px;color:#374151;font-size:13px;font-weight:600">
                    <span style="color:#C8952B">⚠</span> &nbsp;Important
                  </p>
                  <ul style="margin:0;padding-left:16px;color:#6b7280;font-size:13px;line-height:1.8">
                    <li>This code is valid for <strong>10 minutes</strong> only.</li>
                    <li>Never share this code with anyone.</li>
                    <li>Alchemists Aureum staff will <strong>never</strong> ask for this code.</li>
                    <li>If you did not request this, please <a href="#" style="color:#003D2B;font-weight:600">secure your account</a> immediately.</li>
                  </ul>
                </td>
              </tr>
            </table>

            <p style="margin:0;color:#9ca3af;font-size:12px;line-height:1.6;text-align:center">
              This is an automated security email from Alchemists Aureum Bank.<br>
              Please do not reply to this message.
            </p>
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td style="background:#001F16;border-radius:0 0 14px 14px;padding:20px 40px;text-align:center">
            <p style="margin:0 0 4px;color:rgba(255,255,255,.5);font-size:12px">
              &copy; {{ date('Y') }} Alchemists Aureum Bank. All rights reserved.
            </p>
            <p style="margin:0;color:rgba(200,149,43,.5);font-size:11px">Secure · Private · Trusted</p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
