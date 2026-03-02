<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Reset Password - Alchemists Aureum Bank</title>
<meta name="description" content="Set a new password for your Alchemists Aureum Bank account.">
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

  <!-- Left Branding Panel (desktop) -->
  <div class="bk-auth-brand">
    <div class="bk-auth-shape bk-auth-shape--1"></div>
    <div class="bk-auth-shape bk-auth-shape--2"></div>
    <div class="bk-auth-shape bk-auth-shape--3"></div>
    <div class="bk-auth-brand-inner">
      <a href="/"><img src="{{ asset('logo02.png') }}" alt="Alchemists Aureum Bank" class="bk-auth-brand-logo"></a>
      <h1>Set New Password</h1>
      <p>Choose a strong password for your banking account. Combine uppercase, lowercase, numbers, and symbols for maximum security.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Secure Process</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-lock-password-line"></i></div>
          <span>Strong Encryption</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-key-2-line"></i></div>
          <span>Token Verified</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-checkbox-circle-line"></i></div>
          <span>Instant Update</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Reset Password Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head">
        <img src="{{ asset('logo1.png') }}" alt="Alchemists Aureum Bank" class="bk-auth-card-logo">
        <h2>Reset Your Password</h2>
        <p>Enter your new password below. Make sure it's at least 6 characters long.</p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        <!-- Errors -->
        @if ($errors->any())
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ $errors->first() }}</div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">

          <!-- Email -->
          <div class="bk-auth-group">
            <label for="email">Email Address</label>
            <div class="bk-auth-input-wrap">
              <i class="ri-mail-line bk-auth-input-icon"></i>
              <input type="email" id="email" name="email" class="bk-auth-input" placeholder="name@email.com" required autocomplete="email" value="{{ old('email', $email) }}">
            </div>
          </div>

          <!-- New Password -->
          <div class="bk-auth-group">
            <label for="password">New Password</label>
            <div class="bk-auth-input-wrap">
              <i class="ri-lock-line bk-auth-input-icon"></i>
              <input type="password" id="password" name="password" class="bk-auth-input" placeholder="Enter new password" required autocomplete="new-password" minlength="6">
              <button type="button" class="bk-auth-toggle" onclick="togglePw('password','eyeIcon1')">
                <i class="ri-eye-line" id="eyeIcon1"></i>
              </button>
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="bk-auth-group">
            <label for="password_confirmation">Confirm New Password</label>
            <div class="bk-auth-input-wrap">
              <i class="ri-lock-line bk-auth-input-icon"></i>
              <input type="password" id="password_confirmation" name="password_confirmation" class="bk-auth-input" placeholder="Confirm new password" required autocomplete="new-password" minlength="6">
              <button type="button" class="bk-auth-toggle" onclick="togglePw('password_confirmation','eyeIcon2')">
                <i class="ri-eye-line" id="eyeIcon2"></i>
              </button>
            </div>
          </div>

          <!-- Submit -->
          <div style="display:flex;flex-direction:column;gap:10px;margin-top:8px">
            <button type="submit" class="bk-auth-btn bk-auth-btn--primary">
              <i class="ri-lock-password-line"></i> Reset Password
            </button>
            <a href="{{ route('login') }}" class="bk-auth-btn bk-auth-btn--secondary">
              <i class="ri-arrow-left-line"></i> Back to Sign In
            </a>
          </div>
        </form>

        <!-- Footer -->
        <div class="bk-auth-footer">
          Remember your password? <a href="{{ route('login') }}">Sign In</a>
        </div>

      </div>
    </div>
  </div>

</div>

<script>
function togglePw(fId, iId){
  var p=document.getElementById(fId),ic=document.getElementById(iId);
  if(p.type==='password'){p.type='text';ic.className='ri-eye-off-line'}
  else{p.type='password';ic.className='ri-eye-line'}
}
</script>

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
