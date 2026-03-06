<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Alchemists Aureum Bank — Secure, modern digital banking for personal and business needs.">
<meta name="keywords" content="Bank, Alchemists Aureum Bank, Internet Banking, Digital Banking, Savings, Loans">
<meta property="og:description" content="Alchemists Aureum Bank — Banking made simple, secure, and smart.">
<meta property="og:site_name" content="Alchemists Aureum Bank">
<link rel="canonical" href="/">
<title>Alchemists Aureum Bank</title>
<link rel="icon" type="image/png" href="storage/app/public/photos/SogsHXqU6Y0ICRb6DyZgVRWFyDOm44mgql9lWKwW.png">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">

<!-- Icons -->
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="temp/custom/assets/css/flaticon.css">

<!-- Main Stylesheet -->
<link rel="stylesheet" href="css/modern-homepage.css">
<title>Alchemists Aureum Bank</title>
</head>
<body class="bk-body">

<!-- Loader -->
<div class="bk-loader" id="bkLoader">
  <div class="bk-loader-glow"></div>
  <div class="bk-loader-grid"></div>
  <div class="bk-loader-content">
    <div class="bk-loader-brand">
      <svg class="bk-loader-arc bk-loader-arc--a" viewBox="0 0 120 120" fill="none">
        <circle cx="60" cy="60" r="54" stroke="url(#arcA)" stroke-width="2.5" stroke-linecap="round" stroke-dasharray="180 160"/>
        <defs><linearGradient id="arcA" x1="0" y1="0" x2="120" y2="120" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#C8952B"/><stop offset="100%" stop-color="#E5AF40" stop-opacity="0"/></linearGradient></defs>
      </svg>
      <svg class="bk-loader-arc bk-loader-arc--b" viewBox="0 0 120 120" fill="none">
        <circle cx="60" cy="60" r="44" stroke="url(#arcB)" stroke-width="1.5" stroke-linecap="round" stroke-dasharray="100 180"/>
        <defs><linearGradient id="arcB" x1="120" y1="0" x2="0" y2="120" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#E5AF40"/><stop offset="100%" stop-color="#C8952B" stop-opacity="0"/></linearGradient></defs>
      </svg>
      <div class="bk-loader-emblem">
        <svg viewBox="0 0 48 48" fill="none">
          <path class="bk-shield" d="M24 4L6 12v12c0 11.1 7.7 21.5 18 24 10.3-2.5 18-12.9 18-24V12L24 4z" stroke="currentColor" stroke-width="2" fill="none"/>
          <path class="bk-check" d="M16 24l6 6 10-12" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
      </div>
    </div>
    <div class="bk-loader-wordmark">
      <div class="bk-loader-name">Alchemists Aureum</div>
      <div class="bk-loader-tagline">SECURE DIGITAL BANKING</div>
    </div>
    <div class="bk-loader-bar"><div class="bk-loader-bar-fill"></div></div>
    <p class="bk-loader-text">Securing your connection<span class="bk-loader-dots"></span></p>
  </div>
</div>

<!-- ===== UTILITY TOP BAR ===== -->
<div class="bk-topbar">
  <div class="bk-wrap">
    <div class="bk-topbar-inner">
      <div class="bk-topbar-l">
        {{-- <span><i class="ri-map-pin-2-line"></i> 256 Cowbridge Rd E, Cardiff CF11 9TN</span> --}}
        <span class="bk-topbar-sep"></span>
        {{-- <span><i class="ri-phone-line"></i> +44 770 142 3168</span> --}}
      </div>
      <div class="bk-topbar-r">
        <span><i class="ri-shield-check-line"></i> FDIC Insured</span>
        <span class="bk-topbar-sep"></span>
        <a href="{{ url('faq') }}"><i class="ri-question-line"></i> Help &amp; FAQ</a>
      </div>
    </div>
  </div>
</div>

<!-- ===== MAIN HEADER ===== -->
<header class="bk-header" id="bkHeader">
  <div class="bk-wrap">
    <div class="bk-header-row">
     <a href="/" class="bk-logo">
  <img src="logo1.png" alt="Alchemists Aureum Bank" style="height:40px; width:auto;">
</a>


      <nav class="bk-nav" id="bkDesktopNav">
        <a href="/" class="active">Home</a>
        <a href="{{ url('personal') }}">Personal</a>
        <a href="{{ url('business') }}">Business</a>
        <a href="{{ url('credit-card') }}">Cards</a>
        <a href="{{ url('loans') }}">Loans</a>
        <a href="{{ url('about') }}">About</a>
        <a href="{{ url('contact') }}">Contact</a>
      </nav>

      <div class="bk-header-actions">
        <a href="{{ route('login') }}" class="bk-btn bk-btn--ghost">Sign In</a>
        <a href="{{ route('register') }}" class="bk-btn bk-btn--fill">Open Account</a>
      </div>

      <button class="bk-burger" id="bkBurger" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>

<!-- ===== MOBILE SLIDE DRAWER ===== -->
<div class="bk-overlay" id="bkOverlay"></div>
<div class="bk-drawer" id="bkDrawer">
  <div class="bk-drawer-head">
    <a href="/"><img src="logo1.png" alt="Alchemists Aureum Bank" class="bk-drawer-logo"></a>
    <button class="bk-drawer-x" id="bkDrawerClose"><i class="ri-close-line"></i></button>
  </div>
  <nav class="bk-drawer-links">
    <a href="/">Home</a>
    <a href="{{ url('personal') }}">Personal Banking</a>
    <a href="{{ url('business') }}">Business Banking</a>
    <a href="{{ url('credit-card') }}">Credit Cards</a>
    <a href="{{ url('loans') }}">Loans</a>
    <a href="{{ url('about') }}">About Us</a>
    <a href="{{ url('contact') }}">Contact Us</a>
    <a href="{{ url('faq') }}">Help &amp; FAQ</a>
  </nav>
  <div class="bk-drawer-cta">
    <a href="{{ route('login') }}" class="bk-btn bk-btn--ghost bk-btn--block">Sign In</a>
    <a href="{{ route('register') }}" class="bk-btn bk-btn--fill bk-btn--block">Open Account</a>
  </div>
  <div class="bk-drawer-info">
    {{-- <p><i class="ri-phone-line"></i> +44 770 142 3168</p> --}}
    <p><i class="ri-mail-line"></i> support@alchemistsaureumbnk.com</p>
  </div>
</div>

<!-- GTranslate Widget -->
<div class="gtranslate_wrapper"></div>
<script>window.gtranslateSettings={default_language:"en",detect_browser_language:true,wrapper_selector:".gtranslate_wrapper",alt_flags:{en:"usa",pt:"brazil",es:"colombia",fr:"quebec"}};</script>
<script src="https://cdn.gtranslate.net/widgets/latest/float.js" defer></script>
<style>
/* GTranslate — hidden (auto-translate only) */
.gtranslate_wrapper{display:none!important}

/* Pill: just the flag + code, ultra compact */
.gtranslate_wrapper .gt_float_switcher{
  background:#003D2B!important;
  border:none!important;
  border-radius:50px!important;
  padding:4px 10px 4px 5px!important;
  box-shadow:0 2px 10px rgba(0,61,43,.45),0 0 0 1.5px rgba(200,149,43,.35)!important;
  transition:all .2s ease!important;
  font-family:'Inter',sans-serif!important;
  min-height:0!important;
  display:inline-flex!important;
  align-items:center!important;
  gap:5px!important;
}
.gtranslate_wrapper .gt_float_switcher:hover{
  background:#005C41!important;
  box-shadow:0 4px 16px rgba(0,61,43,.55),0 0 0 2px rgba(200,149,43,.55)!important;
  transform:translateY(-2px)!important;
}

/* Flag */
.gtranslate_wrapper .gt_float_switcher img.gt-current-lang-image{
  border-radius:50%!important;
  width:16px!important;height:16px!important;
  box-shadow:0 0 0 1px rgba(255,255,255,.25)!important;
  flex-shrink:0!important;
}

/* Language code text */
.gtranslate_wrapper .gt_float_switcher .gt-current-lang{
  color:#E5AF40!important;
  font-size:.64rem!important;
  font-weight:700!important;
  letter-spacing:.5px!important;
  text-transform:uppercase!important;
  line-height:1!important;
}
.gtranslate_wrapper .gt_float_switcher .gt-selected .gt-lang-code{color:#E5AF40!important}

/* Dropdown panel */
.gtranslate_wrapper .gt_float_switcher .gt_options{
  background:#001F16!important;
  border:1px solid rgba(200,149,43,.2)!important;
  border-radius:10px!important;
  box-shadow:0 8px 28px rgba(0,0,0,.5)!important;
  padding:4px!important;
  margin-bottom:6px!important;
  max-height:180px!important;
  overflow-y:auto!important;
  min-width:130px!important;
}
.gtranslate_wrapper .gt_float_switcher .gt_options a{
  color:rgba(255,255,255,.7)!important;
  font-size:.68rem!important;
  font-weight:500!important;
  padding:5px 8px!important;
  border-radius:7px!important;
  transition:background .15s!important;
  display:flex!important;align-items:center!important;gap:7px!important;
  font-family:'Inter',sans-serif!important;
  background:transparent!important;
}
.gtranslate_wrapper .gt_float_switcher .gt_options a:hover{
  background:rgba(200,149,43,.18)!important;
  color:#E5AF40!important;
}
.gtranslate_wrapper .gt_float_switcher .gt_options a img{border-radius:50%!important;width:14px!important;height:14px!important;box-shadow:none!important}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar{width:3px}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar-track{background:transparent}
.gtranslate_wrapper .gt_float_switcher .gt_options::-webkit-scrollbar-thumb{background:rgba(200,149,43,.3);border-radius:3px}

/* Kill white ghost backgrounds */
.gt_float_switcher *{background-color:transparent!important}
.gt_float_switcher,.gt_float_switcher .gt_options{background:#003D2B!important}
.gt_float_switcher .gt_options{background:#001F16!important}

@media(max-width:767px){.gtranslate_wrapper{bottom:16px!important;right:12px!important}}
</style>


