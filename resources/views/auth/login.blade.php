<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Sign In - Alchemists Aureum Bank</title>
<meta name="description" content="Sign in to your Alchemists Aureum Bank account. Secure online banking access.">
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
      <h1>Welcome Back</h1>
      <p>Swift and secure money transfer to any bank account. Access your account, manage your finances, and bank on the go.</p>
      <div class="bk-auth-features">
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-shield-check-line"></i></div>
          <span>Secure Banking</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-flashlight-line"></i></div>
          <span>Lightning Fast</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-global-line"></i></div>
          <span>Global Access</span>
        </div>
        <div class="bk-auth-feat">
          <div class="bk-auth-feat-icon"><i class="ri-smartphone-line"></i></div>
          <span>Mobile Ready</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Login Form -->
  <div class="bk-auth-main">
    <div class="bk-auth-card">

      <!-- Card Header -->
      <div class="bk-auth-card-head">
        <img src="{{ asset('logo1.png') }}" alt="Alchemists Aureum Bank" class="bk-auth-card-logo">
        <h2>Sign In to Your Account</h2>
        <p>Access the Alchemists Aureum Bank panel using your credentials.</p>
      </div>

      <!-- Card Body -->
      <div class="bk-auth-card-body">

        <!-- Alerts -->
        @if (session('status'))
        <div class="bk-alert bk-alert--success"><i class="ri-checkbox-circle-line"></i> {{ session('status') }}</div>
        @endif
        @if (session('error'))
        <div class="bk-alert bk-alert--error"><i class="ri-error-warning-line"></i> {{ session('error') }}</div>
        @endif
        <div class="bk-alert bk-alert--error" id="ajaxError" style="display:none"><i class="ri-error-warning-line"></i> <span></span></div>

        <form action="{{ route('login.submit') }}" method="POST" id="login_form">
          @csrf

          <!-- Email -->
          <div class="bk-auth-group">
            <label for="email">Email Address</label>
            <div class="bk-auth-input-wrap">
              <i class="ri-mail-line bk-auth-input-icon"></i>
              <input type="email" id="email" name="email" class="bk-auth-input" placeholder="name@email.com" required autocomplete="email" value="{{ old('email') }}">
            </div>
            @if ($errors->has('email'))
            <span class="bk-auth-error">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <!-- Password -->
          <div class="bk-auth-group">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:5px">
              <label for="password" style="margin:0">Password</label>
              <a href="{{ route('password.request') }}" style="font-size:.74rem;color:var(--blue);text-decoration:none;font-weight:500">Forgot Password?</a>
            </div>
            <div class="bk-auth-input-wrap">
              <i class="ri-lock-line bk-auth-input-icon"></i>
              <input type="password" id="password" name="password" class="bk-auth-input" placeholder="Enter your password" required autocomplete="current-password">
              <button type="button" class="bk-auth-toggle" onclick="togglePassword()">
                <i class="ri-eye-line" id="eyeIcon"></i>
              </button>
            </div>
            @if ($errors->has('password'))
            <span class="bk-auth-error">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <!-- Remember + Forgot -->
          <div class="bk-auth-meta">
            <label><input type="checkbox" name="remember_me" checked> Stay signed in</label>
          </div>

          <!-- Buttons -->
          <div style="display:flex;flex-direction:column;gap:10px">
            <button type="submit" class="bk-auth-btn bk-auth-btn--primary">
              <i class="ri-login-box-line"></i> Sign In
            </button>
            <a href="{{ route('register') }}" class="bk-auth-btn bk-auth-btn--secondary">
              <i class="ri-user-add-line"></i> Not enrolled? Create Account
            </a>
          </div>
        </form>

        <!-- Footer link -->
        <div class="bk-auth-footer">
          By signing in, you agree to our <a href="/terms">Terms</a> &amp; <a href="/privacy">Privacy Policy</a>
        </div>

      </div>
    </div>
  </div>

</div>

<!-- Password Toggle + AJAX Login -->
<script>
function togglePassword(){
  var p=document.getElementById('password'),ic=document.getElementById('eyeIcon');
  if(p.type==='password'){p.type='text';ic.className='ri-eye-off-line'}
  else{p.type='password';ic.className='ri-eye-line'}
}
document.getElementById('login_form').addEventListener('submit',function(e){
  e.preventDefault();
  var form=this,btn=form.querySelector('button[type=submit]');
  btn.disabled=true;btn.innerHTML='<i class="ri-loader-4-line" style="animation:bkSpin .6s linear infinite;display:inline-block"></i> Signing in...';
  fetch(form.action,{
    method:'POST',
    headers:{'X-CSRF-TOKEN':document.querySelector('meta[name=csrf-token]').content,'Accept':'application/json','Content-Type':'application/x-www-form-urlencoded'},
    body:new URLSearchParams(new FormData(form))
  }).then(function(r){return r.json()}).then(function(d){
    if(d.content==='Otp'||d.content==='Successful'){window.location=d.redirect}
    else{
      btn.disabled=false;btn.innerHTML='<i class="ri-login-box-line"></i> Sign In';
      var box=document.getElementById('ajaxError');
      box.style.display='block';box.querySelector('span').textContent=d.message||d.errors&&Object.values(d.errors)[0]&&Object.values(d.errors)[0][0]||'Invalid credentials';
    }
  }).catch(function(){
    btn.disabled=false;btn.innerHTML='<i class="ri-login-box-line"></i> Sign In';
    form.submit();
  });
});
</script>
<style>@keyframes bkSpin{to{transform:rotate(360deg)}}</style>

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
