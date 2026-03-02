<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Verify Email - Alchemists Aureum Bank</title>
<meta name="description" content="Verify your email address for Alchemists Aureum Bank.">
<link rel="icon" type="image/png" href="{{ asset('storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('css/modern-homepage.css') }}">
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
      <h1>Almost There!</h1>
      <p>Just one more step to secure your account. Enter the verification code we sent to your email address.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-mail-check-line"></i></div>
          <span>Email Verified</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Secure Access</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-lock-line"></i></div>
          <span>Data Protected</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-check-double-line"></i></div>
          <span>Instant Activation</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Verify Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head" style="text-align:center">
        <img src="{{ asset('logo1.png') }}" alt="Alchemists Aureum Bank" class="bk-auth-card-logo">
        <div class="bk-auth-verify-icon">
          <i class="ri-mail-send-line"></i>
        </div>
        <h2>Verify Your Email</h2>
        <p>Please enter the verification code sent to <span class="bk-auth-verify-email">{{ $email }}</span></p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        @if(session('error'))
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ session('error') }}</div>
        @endif
        @if(session('message'))
        <div class="bk-alert bk-alert--success"><i class="ri-checkbox-circle-line"></i> {{ session('message') }}</div>
        @endif

        <form action="{{ route('verify.submit') }}" method="POST" id="verifyForm">
          @csrf
          <input type="hidden" name="email" value="{{ $email }}">

          <!-- Verification Code -->
          <div class="bk-auth-group">
            <label for="digit" style="text-align:center;display:block">Verification Code</label>
            <input type="text" id="digit" name="digit" class="bk-auth-code-input" placeholder="Enter code" autocomplete="one-time-code" required>
          </div>

          <!-- Submit -->
          <div style="margin-top:20px">
            <button type="submit" id="confirmBtn" class="bk-auth-btn bk-auth-btn--primary">
              <i class="ri-check-line"></i> Confirm
            </button>
          </div>
        </form>

        <!-- Resend -->
        <div class="bk-auth-footer" style="margin-top:24px">
          <p class="response" style="margin-bottom:8px"></p>
          Didn't receive a code?
          <a href="{{ route('verify.resend', $id) }}" id="resendLink" onclick="resendLoading(this)">
            <i class="ri-mail-send-line"></i> Resend Code
          </a>
        </div>

        <!-- Copyright -->
        <div style="text-align:center;margin-top:20px;font-size:.72rem;color:var(--txt-m)">
          &copy; <script>document.write(new Date().getFullYear())</script> Alchemists Aureum Bank. All rights reserved.
        </div>

      </div>
    </div>
  </div>

</div>

<!-- Scripts -->
<script>
document.getElementById('verifyForm').addEventListener('submit', function(){
  var btn = document.getElementById('confirmBtn');
  btn.innerHTML='<span style="display:inline-flex;align-items:center;gap:6px">Confirming... <span class="bk-auth-spinner"></span></span>';
  setTimeout(function(){ btn.disabled=true; }, 0);
});
function resendLoading(el){
  var orig=el.innerHTML;
  el.innerHTML='Please wait...';
  setTimeout(function(){el.innerHTML=orig},2000);
}
</script>

<style>
.bk-auth-spinner{width:14px;height:14px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:bkSpin .6s linear infinite;display:inline-block}
@keyframes bkSpin{to{transform:rotate(360deg)}}
</style>

<!-- GTranslate -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={"default_language":"en","detect_browser_language":true,"wrapper_selector":".gtranslate_wrapper","alt_flags":{"en":"usa","pt":"brazil","es":"colombia","fr":"quebec"}}</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
<style>
.gtranslate_wrapper{position:fixed!important;bottom:22px!important;right:18px!important;top:auto!important;left:auto!important;z-index:9999!important}
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
