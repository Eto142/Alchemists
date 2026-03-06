<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Verify Login — Alchemists Aureum Bank</title>
<meta name="description" content="Enter the one-time code sent to your email to complete sign-in.">
<link rel="icon" type="image/png" href="{{ asset('storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/modern-homepage.css') }}">

<style>
/* ── OTP digit strip ─────────────────────────────────── */
.otp-strip{display:flex;gap:10px;justify-content:center;margin:24px 0 8px}
.otp-digit{width:46px;height:56px;border:2px solid #d1d5db;border-radius:10px;text-align:center;font-size:22px;font-weight:700;color:#111827;background:#fff;outline:none;transition:border-color .2s,box-shadow .2s;-webkit-appearance:none;appearance:none;font-family:'Inter',sans-serif}
.otp-digit:focus{border-color:#003D2B;box-shadow:0 0 0 3px rgba(0,61,43,.18)}
.otp-digit.filled{border-color:#C8952B;background:#fffbf2}
/* ── Shield icon ─────────────────────────────────────── */
.otp-shield{width:60px;height:60px;background:linear-gradient(135deg,#003D2B,#005C41);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 18px;box-shadow:0 6px 20px rgba(0,61,43,.3)}
.otp-shield i{color:#E5AF40;font-size:26px}
/* ── Resend row ──────────────────────────────────────── */
.otp-resend-row{display:flex;align-items:center;justify-content:center;gap:8px;margin-top:14px;font-size:.8rem;color:#6b7280}
#resendBtn{background:none;border:none;padding:0;font:inherit;color:#003D2B;font-weight:600;cursor:pointer;text-decoration:underline;font-size:.8rem}
#resendBtn:disabled{color:#9ca3af;cursor:not-allowed;text-decoration:none}
#countdown{font-weight:600;color:#C8952B;min-width:28px;display:inline-block;text-align:center}
/* ── Email hint ──────────────────────────────────────── */
.otp-hint{background:#f0fdf4;border:1px solid rgba(0,61,43,.18);border-radius:10px;padding:12px 16px;text-align:center;margin-bottom:18px}
.otp-hint p{margin:0;font-size:.8rem;color:#374151;line-height:1.5}
.otp-hint strong{color:#003D2B}
/* ── Back link ───────────────────────────────────────── */
.otp-back{text-align:center;margin-top:20px}
.otp-back a{font-size:.78rem;color:#6b7280;text-decoration:none;display:inline-flex;align-items:center;gap:5px}
.otp-back a:hover{color:#003D2B}
</style>
</head>

<body class="bk-body" style="background:var(--off)">

<!-- Auth Layout -->
<div class="bk-auth">

  <!-- Left Branding Panel -->
  <div class="bk-auth-brand">
    <div class="bk-auth-shape bk-auth-shape--1"></div>
    <div class="bk-auth-shape bk-auth-shape--2"></div>
    <div class="bk-auth-shape bk-auth-shape--3"></div>
    <div class="bk-auth-brand-inner">
      <a href="/"><img src="{{ asset('logo02.png') }}" alt="Alchemists Aureum Bank" class="bk-auth-brand-logo"></a>
      <h1>Two-Factor Authentication</h1>
      <p>Your account is protected with an additional layer of security. A one-time code was sent to your registered email address.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-keyhole-line"></i></div>
          <span>Two-Factor Auth</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-timer-flash-line"></i></div>
          <span>10-Min Expiry</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-spam-3-line"></i></div>
          <span>Phishing Protected</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-lock-password-line"></i></div>
          <span>One-Time Only</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — OTP Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head">
        <div class="otp-shield">
          <i class="ri-shield-keyhole-line"></i>
        </div>
        <h2>Enter Your Verification Code</h2>
        <p>We sent a 6-digit code to your email. Enter it below to complete sign-in.</p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        <!-- Session error -->
        @if (session('error'))
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ session('error') }}</div>
        @endif

        <!-- AJAX feedback -->
        <div class="bk-alert bk-alert--error"   id="ajaxError"   style="display:none"><i class="ri-error-warning-line"></i> <span></span></div>
        <div class="bk-alert bk-alert--success"  id="ajaxSuccess" style="display:none"><i class="ri-checkbox-circle-line"></i> <span></span></div>

        <!-- Email hint -->
        <div class="otp-hint">
          <p>A 6-digit code was sent to your registered email address.<br><strong>Check your inbox (and spam folder).</strong></p>
        </div>

        <!-- OTP Form -->
        <form id="otpForm" action="{{ route('login.otp.verify') }}" method="POST">
          @csrf

          <!-- Hidden single-field populated by JS -->
          <input type="hidden" name="otp" id="otpHidden">

          <!-- Six digit boxes -->
          <div class="otp-strip">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" autocomplete="one-time-code" data-index="0">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="1">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="2">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="3">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="4">
            <input class="otp-digit" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" data-index="5">
          </div>

          <!-- Expiry progress bar -->
          <div style="height:4px;background:#e5e7eb;border-radius:4px;overflow:hidden;margin-bottom:6px">
            <div id="expiryBar" style="height:100%;background:linear-gradient(90deg,#003D2B,#C8952B);border-radius:4px;width:100%;transition:width 1s linear"></div>
          </div>
          <p style="text-align:center;font-size:.72rem;color:#9ca3af;margin:0 0 18px">Code expires in <span id="expiryText" style="color:#C8952B;font-weight:600">10:00</span></p>

          <!-- Submit -->
          <button type="submit" class="bk-auth-btn bk-auth-btn--primary" id="verifyBtn" disabled>
            <i class="ri-shield-check-line"></i> Verify &amp; Sign In
          </button>
        </form>

        <!-- Resend row -->
        <div class="otp-resend-row">
          <span>Didn't receive it?</span>
          <button id="resendBtn" disabled>Resend code</button>
          <span>in</span>
          <span id="countdown">60s</span>
        </div>

        <!-- Back link -->
        <div class="otp-back">
          <a href="{{ route('login') }}"><i class="ri-arrow-left-s-line"></i> Back to sign in</a>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- OTP Logic -->
<script>
(function(){
  var digits    = document.querySelectorAll('.otp-digit');
  var hidden    = document.getElementById('otpHidden');
  var verifyBtn = document.getElementById('verifyBtn');
  var form      = document.getElementById('otpForm');
  var csrf      = document.querySelector('meta[name=csrf-token]').content;

  /* ── Helper: re-enable submit button ──────────────── */
  function resetBtn(){
    verifyBtn.disabled = false;
    verifyBtn.innerHTML = '<i class="ri-shield-check-line"></i> Verify &amp; Sign In';
  }

  /* ── Sync digit boxes → hidden field ──────────────── */
  function syncHidden(){
    var val = '';
    digits.forEach(function(box){ val += box.value || ''; });
    hidden.value = val;
    digits.forEach(function(box){ box.classList.toggle('filled', box.value !== ''); });
    verifyBtn.disabled = (val.length < 6);
  }

  /* ── Digit input behaviour ─────────────────────────── */
  digits.forEach(function(inp, idx){
    inp.addEventListener('input', function(){
      this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1);
      if (this.value && idx < 5) digits[idx + 1].focus();
      syncHidden();
    });
    inp.addEventListener('keydown', function(e){
      if (e.key === 'Backspace' && !this.value && idx > 0){
        digits[idx - 1].value = '';
        digits[idx - 1].focus();
        syncHidden();
      }
      if (e.key === 'ArrowLeft'  && idx > 0) digits[idx - 1].focus();
      if (e.key === 'ArrowRight' && idx < 5) digits[idx + 1].focus();
    });
    inp.addEventListener('paste', function(e){
      e.preventDefault();
      var paste = (e.clipboardData || window.clipboardData).getData('text').replace(/\D/g, '').slice(0, 6);
      for (var i = 0; i < 6; i++) digits[i].value = paste[i] || '';
      digits[Math.min(paste.length, 5)].focus();
      syncHidden();
    });
  });

  /* ── Alerts ────────────────────────────────────────── */
  function showError(msg){
    var b = document.getElementById('ajaxError');
    b.style.display = 'flex';
    b.querySelector('span').textContent = msg;
    document.getElementById('ajaxSuccess').style.display = 'none';
  }
  function showSuccess(msg){
    var b = document.getElementById('ajaxSuccess');
    b.style.display = 'flex';
    b.querySelector('span').textContent = msg;
    document.getElementById('ajaxError').style.display = 'none';
  }

  /* ── Form submit ───────────────────────────────────── */
  form.addEventListener('submit', function(e){
    e.preventDefault();

    var otpVal = hidden.value;
    if (otpVal.length !== 6) {
      showError('Please enter all 6 digits.');
      return;
    }

    verifyBtn.disabled = true;
    verifyBtn.innerHTML = '<i class="ri-loader-4-line" style="animation:bkSpin .6s linear infinite;display:inline-block"></i> Verifying...';
    document.getElementById('ajaxError').style.display   = 'none';
    document.getElementById('ajaxSuccess').style.display = 'none';

    /* Safety net: re-enable after 15 s if nothing happened */
    var safetyTimer = setTimeout(function(){
      resetBtn();
      showError('Request timed out. Please try again.');
    }, 15000);

    fetch('{{ route("login.otp.verify") }}', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrf,
        'Accept':       'application/json',
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: '_token=' + encodeURIComponent(csrf) + '&otp=' + encodeURIComponent(otpVal)
    })
    .then(function(response){
      clearTimeout(safetyTimer);
      return response.text().then(function(text){
        try {
          return { status: response.status, data: JSON.parse(text) };
        } catch(e) {
          return { status: response.status, data: null };
        }
      });
    })
    .then(function(result){
      var status = result.status;
      var data   = result.data;

      if (!data) {
        resetBtn();
        showError('Unexpected server response. Please try again.');
        return;
      }

      /* 419 = CSRF expired — reload the page */
      if (status === 419) {
        showError('Your session expired. Reloading...');
        setTimeout(function(){ window.location.reload(); }, 1500);
        return;
      }

      /* 422 = validation error */
      if (status === 422) {
        resetBtn();
        var msg = (data.errors && data.errors.otp && data.errors.otp[0]) || data.message || 'Please enter a valid 6-digit code.';
        showError(msg);
        return;
      }

      /* Standard response */
      if (data.content === 'Successful') {
        verifyBtn.innerHTML = '<i class="ri-checkbox-circle-line"></i> Verified! Redirecting...';
        window.location.href = data.redirect;
      } else {
        resetBtn();
        showError(data.message || 'Invalid code. Please try again.');
        digits.forEach(function(box){ box.value = ''; });
        hidden.value = '';
        digits[0].focus();
      }
    })
    .catch(function(){
      clearTimeout(safetyTimer);
      resetBtn();
      showError('Network error. Please check your connection and try again.');
    });
  });

  /* ── Resend countdown ──────────────────────────────── */
  var resendBtn   = document.getElementById('resendBtn');
  var countdownEl = document.getElementById('countdown');
  var resendSecs  = 60;

  function startResendTimer(){
    resendSecs  = 60;
    resendBtn.disabled = true;
    var t = setInterval(function(){
      resendSecs--;
      countdownEl.textContent = resendSecs > 0 ? resendSecs + 's' : '';
      if (resendSecs <= 0){
        clearInterval(t);
        resendBtn.disabled = false;
      }
    }, 1000);
  }
  startResendTimer();

  resendBtn.addEventListener('click', function(){
    resendBtn.disabled = true;
    resendBtn.textContent = 'Sending...';

    fetch('{{ route("login.otp.resend") }}', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrf,
        'Accept':       'application/json',
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: '_token=' + encodeURIComponent(csrf)
    })
    .then(function(r){ return r.json(); })
    .then(function(d){
      resendBtn.textContent = 'Resend code';
      if (d.content === 'Successful'){
        showSuccess(d.message || 'New code sent to your email.');
        startResendTimer();
      } else {
        resendBtn.disabled = false;
        showError(d.message || 'Failed to resend. Please try again.');
      }
    })
    .catch(function(){
      resendBtn.textContent = 'Resend code';
      resendBtn.disabled = false;
      showError('Network error. Please try again.');
    });
  });

  /* ── 10-min expiry countdown ───────────────────────── */
  var totalSecs  = 600;
  var expiryBar  = document.getElementById('expiryBar');
  var expiryText = document.getElementById('expiryText');

  var expiryTimer = setInterval(function(){
    totalSecs--;
    if (totalSecs <= 0){
      clearInterval(expiryTimer);
      expiryBar.style.width      = '0%';
      expiryBar.style.background = '#ef4444';
      expiryText.textContent     = 'Expired';
      expiryText.style.color     = '#ef4444';
      showError('Your code has expired. Please sign in again.');
      verifyBtn.disabled = true;
      return;
    }
    var m = Math.floor(totalSecs / 60);
    var s = totalSecs % 60;
    expiryText.textContent  = m + ':' + (s < 10 ? '0' : '') + s;
    expiryBar.style.width   = (totalSecs / 600 * 100) + '%';
    if (totalSecs < 120) expiryBar.style.background = 'linear-gradient(90deg,#dc2626,#ef4444)';
  }, 1000);

  /* Focus first box on load */
  digits[0].focus();
})();
</script>
<style>@keyframes bkSpin{to{transform:rotate(360deg)}}</style>

<!-- GTranslate -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
<style>
.gtranslate_wrapper{display:none!important}
.gtranslate_wrapper .gt_float_switcher{background:#003D2B!important;border:none!important;border-radius:50px!important;padding:4px 10px 4px 5px!important;box-shadow:0 2px 10px rgba(0,61,43,.45),0 0 0 1.5px rgba(200,149,43,.35)!important;transition:all .2s ease!important;font-family:'Inter',sans-serif!important;min-height:0!important;display:inline-flex!important;align-items:center!important;gap:5px!important}
.gtranslate_wrapper .gt_float_switcher:hover{background:#005C41!important;box-shadow:0 4px 16px rgba(0,61,43,.55),0 0 0 2px rgba(200,149,43,.55)!important;transform:translateY(-2px)!important}
.gtranslate_wrapper .gt_float_switcher img.gt-current-lang-image{border-radius:50%!important;width:16px!important;height:16px!important;box-shadow:0 0 0 1px rgba(255,255,255,.25)!important;flex-shrink:0!important}
.gtranslate_wrapper .gt_float_switcher .gt-current-lang{color:#E5AF40!important;font-size:.64rem!important;font-weight:700!important;letter-spacing:.5px!important;text-transform:uppercase!important;line-height:1!important}
.gtranslate_wrapper .gt_float_switcher .gt-selected .gt-lang-code{color:#E5AF40!important}
.gtranslate_wrapper .gt_float_switcher .gt_options{background:#001F16!important;border:1px solid rgba(200,149,43,.2)!important;border-radius:10px!important;box-shadow:0 8px 28px rgba(0,0,0,.5)!important;padding:4px!important;margin-bottom:6px!important;max-height:180px!important;overflow-y:auto!important;min-width:130px!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a{color:rgba(255,255,255,.7)!important;font-size:.68rem!important;font-weight:500!important;padding:5px 8px!important;border-radius:7px!important;transition:background .15s!important;display:flex!important;align-items:center!important;gap:7px!important;font-family:'Inter',sans-serif!important;background:transparent!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a:hover{background:rgba(200,149,43,.18)!important;color:#E5AF40!important}
.gtranslate_wrapper .gt_float_switcher .gt_options a img{border-radius:50%!important;width:14px!important;height:14px!important;box-shadow:none!important}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar{width:3px}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar-thumb{background:rgba(200,149,43,.3);border-radius:3px}
.gt_float_switcher *{background-color:transparent!important}
.gt_float_switcher{background:#003D2B!important}
.gt_float_switcher .gt_options{background:#001F16!important}
@media(max-width:767px){.gtranslate_wrapper{bottom:16px!important;right:12px!important}}
</style>

</body>
</html>
