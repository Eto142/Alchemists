<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Bank Statement - Alchemists Aureum Bank</title>
</head>
<body style="margin:0;padding:0;background-color:#f0f2f0;font-family:Arial,Helvetica,sans-serif">
<div style="display:none;max-height:0;overflow:hidden;mso-hide:all">Your Alchemists Aureum Bank statement is attached and ready to review.&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;</div>

<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f0f2f0;padding:32px 0">
<tr><td align="center">
<table width="590" cellpadding="0" cellspacing="0" border="0" style="max-width:590px;width:100%">

  <!-- HEADER -->
  <tr><td align="center" style="background-color:#003D2B;border-radius:12px 12px 0 0;padding:28px 40px 24px">
    <a href="{{ config('app.url') }}" style="text-decoration:none">
      <img src="{{ asset('logo1.png') }}" alt="Alchemists Aureum Bank" width="160" style="display:block;width:160px;max-width:100%;height:auto;margin:0 auto">
    </a>
  </td></tr>
  <tr><td style="height:4px;background:#C8952B;font-size:0;line-height:0">&nbsp;</td></tr>

  <!-- BODY -->
  <tr><td style="background-color:#ffffff;padding:36px 40px">

    <!-- Title row -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td align="center" style="padding-bottom:16px">
          <div style="display:inline-block;width:56px;height:56px;background-color:#003D2B;border-radius:50%;text-align:center;font-size:26px;line-height:56px">&#128196;</div>
        </td>
      </tr>
      <tr><td align="center" style="padding-bottom:6px">
        <h1 style="margin:0;font-size:22px;font-weight:700;color:#111827;font-family:Arial,sans-serif">Account Statement</h1>
      </td></tr>
      <tr><td align="center" style="padding-bottom:28px">
        <p style="margin:0;font-size:14px;color:#6b7280;font-family:Arial,sans-serif">Alchemists Aureum Bank</p>
      </td></tr>
    </table>

    <!-- Account details -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f9fafb;border-radius:8px;margin-bottom:24px">
      <tr><td style="padding:18px 20px">
        <p style="margin:0 0 8px;font-size:13px;font-weight:700;color:#374151;font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px">Account Holder</p>
        <p style="margin:0 0 14px;font-size:16px;font-weight:700;color:#111827;font-family:Arial,sans-serif">{{ $data['first_name'] }} {{ $data['last_name'] }}</p>
        <p style="margin:0 0 4px;font-size:13px;font-weight:700;color:#374151;font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px">Statement Period</p>
        <p style="margin:0;font-size:14px;color:#111827;font-family:Arial,sans-serif">{{ $data['start_date'] }} &mdash; {{ $data['end_date'] }}</p>
      </td></tr>
    </table>

    <!-- Transaction table -->
    <p style="margin:0 0 12px;font-size:14px;font-weight:700;color:#374151;font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px">Transaction History</p>
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;border-radius:8px;overflow:hidden">
      <tr style="background-color:#003D2B">
        <td style="padding:11px 12px;font-size:12px;font-weight:700;color:rgba(255,255,255,0.85);font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px">Date</td>
        <td style="padding:11px 12px;font-size:12px;font-weight:700;color:rgba(255,255,255,0.85);font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px">Description</td>
        <td style="padding:11px 12px;font-size:12px;font-weight:700;color:rgba(255,255,255,0.85);font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px" align="right">Amount</td>
        <td style="padding:11px 12px;font-size:12px;font-weight:700;color:rgba(255,255,255,0.85);font-family:Arial,sans-serif;text-transform:uppercase;letter-spacing:0.5px" align="center">Status</td>
      </tr>
      @foreach($data['transactions'] as $i => $transaction)
      <tr style="background-color:{{ $loop->even ? '#f9fafb' : '#ffffff' }}">
        <td style="padding:10px 12px;font-size:13px;color:#374151;font-family:Arial,sans-serif;border-bottom:1px solid #e5e7eb;white-space:nowrap">{{ \Carbon\Carbon::parse($transaction->created_at)->format('d M Y') }}</td>
        <td style="padding:10px 12px;font-size:13px;color:#374151;font-family:Arial,sans-serif;border-bottom:1px solid #e5e7eb">{{ $transaction->transaction_description }}</td>
        <td style="padding:10px 12px;font-size:13px;font-family:'Courier New',monospace;border-bottom:1px solid #e5e7eb;white-space:nowrap" align="right">
          @if($transaction->transaction == 'Loan')
            <span style="color:#166534;font-weight:700">+{{ number_format($transaction->transaction_amount, 2) }}</span>
          @else
            <span style="color:#991b1b;font-weight:700">-{{ number_format($transaction->transaction_amount, 2) }}</span>
          @endif
        </td>
        <td style="padding:10px 12px;font-size:12px;font-family:Arial,sans-serif;border-bottom:1px solid #e5e7eb" align="center">
          @if($transaction->transaction_status == '1')
            <span style="background-color:#dcfce7;color:#166534;font-weight:700;padding:2px 8px;border-radius:20px">Done</span>
          @elseif($transaction->transaction_status == '0')
            <span style="background-color:#fef9c3;color:#854d0e;font-weight:700;padding:2px 8px;border-radius:20px">Pending</span>
          @else
            <span style="background-color:#fee2e2;color:#991b1b;font-weight:700;padding:2px 8px;border-radius:20px">Failed</span>
          @endif
        </td>
      </tr>
      @endforeach
    </table>

    <p style="margin:24px 0 0;font-size:12px;color:#9ca3af;font-family:Arial,sans-serif">
      Generated on {{ \Carbon\Carbon::now()->format('d M Y, H:i') }} UTC &bull; Alchemists Aureum Bank
    </p>
    <p style="margin:16px 0 0;font-size:14px;color:#6b7280;font-family:Arial,sans-serif;line-height:1.6">Kind regards,<br><strong style="color:#003D2B">Alchemists Aureum Bank</strong></p>

  </td></tr>

  <!-- FOOTER -->
  <tr><td style="height:4px;background:#C8952B;font-size:0;line-height:0">&nbsp;</td></tr>
  <tr><td align="center" style="background-color:#001F16;border-radius:0 0 12px 12px;padding:20px 40px">
    <p style="margin:0 0 4px;font-size:12px;color:rgba(255,255,255,0.45);font-family:Arial,sans-serif">&copy; {{ date('Y') }} Alchemists Aureum Bank. All rights reserved.</p>
    <p style="margin:0;font-size:11px;color:rgba(200,149,43,0.5);font-family:Arial,sans-serif">Secure &bull; Private &bull; Trusted</p>
  </td></tr>

</table></td></tr></table>
</body></html>