@include('home.header')

<!-- ============================================================
     PREMIUM HERO CAROUSEL
     ============================================================ -->
<section class="hc-hero" id="hcHero">

  <!-- ── Slide Track ─────────────────────────── -->
  <div class="hc-track" id="hcTrack">

    <!-- ═══ SLIDE 1 — Account / Card ═══ -->
    <div class="hc-slide" data-index="0">
      <div class="hc-bg hc-ken" style="background-image:url('frontassets/images/banner/1.jpg')"></div>
      <div class="hc-overlay hc-overlay--green"></div>
      <!-- Geometric shapes -->
      <div class="hc-shapes">
        <div class="hc-shape hc-shape--circle hc-shape--lg"></div>
        <div class="hc-shape hc-shape--circle hc-shape--sm"></div>
        <div class="hc-shape hc-shape--bar hc-shape--bar1"></div>
        <div class="hc-shape hc-shape--bar hc-shape--bar2"></div>
      </div>
      <div class="bk-wrap hc-slide-inner">
        <!-- Text -->
        <div class="hc-text">
          <div class="hc-pill hc-ani" style="--d:0s"><i class="ri-shield-check-fill"></i> FDIC Insured &bull; 256-bit SSL</div>
          <h1 class="hc-h1 hc-ani" style="--d:.12s">The Modern Bank<br>Built Around <em>You</em></h1>
          <p class="hc-sub hc-ani" style="--d:.22s">Alchemists Aureum Bank delivers intelligent banking — seamless payments, premium accounts, and expert wealth management in one secure platform.</p>
          <div class="hc-btns hc-ani" style="--d:.32s">
            <a href="{{ route('register') }}" class="hp-btn hp-btn--gold">Open Free Account <i class="ri-arrow-right-line"></i></a>
            <a href="{{ route('login') }}" class="hp-btn hp-btn--outline">Login <i class="ri-play-circle-line"></i></a>
          </div>
        </div>
        <!-- Right visual: Bank card -->
        <div class="hc-visual hc-ani" style="--d:.08s">
          <div class="hc-card-wrap">
            <div class="hc-card hc-card--front">
              <div class="hc-card-shine"></div>
              <div class="hc-card-top">
                <span class="hc-card-brand">AUREUM</span>
                <i class="ri-nfc-line"></i>
              </div>
              <div class="hc-card-chip-svg">
                <svg viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect x=".5" y=".5" width="43" height="33" rx="4.5" fill="#C8952B" fill-opacity=".25" stroke="#C8952B" stroke-opacity=".4"/>
                  <line x1="14.5" y1="1" x2="14.5" y2="33" stroke="#C8952B" stroke-opacity=".4"/>
                  <line x1="29.5" y1="1" x2="29.5" y2="33" stroke="#C8952B" stroke-opacity=".4"/>
                  <line x1="1" y1="11.5" x2="43" y2="11.5" stroke="#C8952B" stroke-opacity=".4"/>
                  <line x1="1" y1="22.5" x2="43" y2="22.5" stroke="#C8952B" stroke-opacity=".4"/>
                </svg>
              </div>
              <div class="hc-card-num">•••• &nbsp;•••• &nbsp;•••• &nbsp;4821</div>
              <div class="hc-card-foot">
                <div><small>CARD HOLDER</small><b>J. Whitfield</b></div>
                <div><small>EXPIRES</small><b>03 / 29</b></div>
                <div class="hc-card-circles"><span></span><span></span></div>
              </div>
            </div>
            <!-- stacked second card -->
            <div class="hc-card hc-card--back"></div>
            <!-- Float tiles -->
            <div class="hc-float hc-float--a">
              <i class="ri-wallet-3-line"></i>
              <div><small>Balance</small><strong>$24,850</strong></div>
            </div>
            <div class="hc-float hc-float--b">
              <i class="ri-arrow-up-circle-fill" style="color:#4ade80"></i>
              <div><small>Last Credit</small><strong>+$3,200</strong></div>
            </div>
            <div class="hc-float hc-float--c">
              <i class="ri-shield-check-fill" style="color:var(--gold-l)"></i>
              <div><small>Security</small><strong>Active</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══ SLIDE 2 — Savings / Growth ═══ -->
    <div class="hc-slide" data-index="1">
      <div class="hc-bg hc-ken" style="background-image:url('frontassets/images/banner/2.jpg');animation-direction:reverse"></div>
      <div class="hc-overlay hc-overlay--dark"></div>
      <div class="hc-shapes">
        <div class="hc-shape hc-shape--ring hc-shape--ring1"></div>
        <div class="hc-shape hc-shape--ring hc-shape--ring2"></div>
        <div class="hc-shape hc-shape--bar hc-shape--bar3"></div>
      </div>
      <div class="bk-wrap hc-slide-inner">
        <div class="hc-text">
          <div class="hc-pill hc-ani" style="--d:0s"><i class="ri-vip-crown-fill"></i> Premium Savings &bull; 4.75% AER</div>
          <h1 class="hc-h1 hc-ani" style="--d:.12s">Grow Your Wealth<br>With <em>Smart Savings</em></h1>
          <p class="hc-sub hc-ani" style="--d:.22s">Earn market-leading interest rates with instant access to your funds. No minimum balance, no lock-in. Your money, always working harder.</p>
          <div class="hc-btns hc-ani" style="--d:.32s">
            <a href="{{ route('register') }}" class="hp-btn hp-btn--gold">Start Saving Today <i class="ri-arrow-right-line"></i></a>
            <a href="{{ url('personal') }}" class="hp-btn hp-btn--outline">View Rates <i class="ri-percent-line"></i></a>
          </div>
        </div>
        <!-- Right visual: Savings stats panel -->
        <div class="hc-visual hc-ani" style="--d:.08s">
          <div class="hc-savings-panel">
            <div class="hc-sp-header">
              <span><i class="ri-bar-chart-2-line"></i> Savings Overview</span>
              <span class="hc-sp-live"><span class="hc-sp-dot"></span> Live</span>
            </div>
            <div class="hc-sp-rate">
              <div class="hc-sp-rate-num">4.75<span>%</span></div>
              <div class="hc-sp-rate-label">Annual Equivalent Rate</div>
            </div>
            <div class="hc-sp-bars">
              <div class="hc-sp-bar-row">
                <span>Jan</span>
                <div class="hc-sp-bar-track"><div class="hc-sp-bar-fill" style="width:62%;--bc:var(--gold-l)"></div></div>
                <small>$1,240</small>
              </div>
              <div class="hc-sp-bar-row">
                <span>Feb</span>
                <div class="hc-sp-bar-track"><div class="hc-sp-bar-fill" style="width:75%;--bc:var(--gold-l)"></div></div>
                <small>$1,500</small>
              </div>
              <div class="hc-sp-bar-row">
                <span>Mar</span>
                <div class="hc-sp-bar-track"><div class="hc-sp-bar-fill" style="width:90%;--bc:#4ade80"></div></div>
                <small>$1,800</small>
              </div>
            </div>
            <div class="hc-sp-footer">
              <div><small>Total Saved</small><strong>$24,850</strong></div>
              <div><small>Interest Earned</small><strong style="color:#4ade80">+$1,178</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══ SLIDE 3 — Global Transfers ═══ -->
    <div class="hc-slide" data-index="2">
      <div class="hc-bg hc-ken" style="background-image:url('frontassets/images/banner/4.jpg')"></div>
      <div class="hc-overlay hc-overlay--deep"></div>
      <div class="hc-shapes">
        <div class="hc-shape hc-shape--circle hc-shape--md"></div>
        <div class="hc-shape hc-shape--grid"></div>
        <div class="hc-shape hc-shape--bar hc-shape--bar4"></div>
      </div>
      <div class="bk-wrap hc-slide-inner">
        <div class="hc-text">
          <div class="hc-pill hc-ani" style="--d:0s"><i class="ri-global-line"></i> 180+ Countries &bull; Instant Transfers</div>
          <h1 class="hc-h1 hc-ani" style="--d:.12s">Send Money<br><em>Across the Globe</em></h1>
          <p class="hc-sub hc-ani" style="--d:.22s">Transfer internationally at real exchange rates with zero hidden fees. Fast, reliable, and available around the clock — wherever you are in the world.</p>
          <div class="hc-btns hc-ani" style="--d:.32s">
            <a href="{{ route('register') }}" class="hp-btn hp-btn--gold">Send Now <i class="ri-send-plane-fill"></i></a>
            <a href="{{ url('contact') }}" class="hp-btn hp-btn--outline">Talk to Us <i class="ri-customer-service-2-line"></i></a>
          </div>
        </div>
        <!-- Right visual: Transfer UI -->
        <div class="hc-visual hc-ani" style="--d:.08s">
          <div class="hc-transfer-ui">
            <div class="hc-tr-header"><i class="ri-exchange-funds-line"></i> International Transfer</div>
            <div class="hc-tr-row">
              <div class="hc-tr-flag"><img src="https://flagcdn.com/w40/us.png" alt="USD"><span>USD</span></div>
              <div class="hc-tr-amount">$5,000.00</div>
            </div>
            <div class="hc-tr-divider">
              <div class="hc-tr-rate"><i class="ri-refresh-line"></i> 1 USD = 0.7912 GBP</div>
            </div>
            <div class="hc-tr-row">
              <div class="hc-tr-flag"><img src="https://flagcdn.com/w40/gb.png" alt="GBP"><span>GBP</span></div>
              <div class="hc-tr-amount hc-tr-amount--out">£3,956.00</div>
            </div>
            {{-- <div class="hc-tr-fee"><i class="ri-information-line"></i> Zero fee on transfers over $500</div> --}}
            <div class="hc-tr-destinations">
              <span><img src="https://flagcdn.com/w20/de.png" alt="DE"></span>
              <span><img src="https://flagcdn.com/w20/fr.png" alt="FR"></span>
              <span><img src="https://flagcdn.com/w20/jp.png" alt="JP"></span>
              <span><img src="https://flagcdn.com/w20/ca.png" alt="CA"></span>
              <span><img src="https://flagcdn.com/w20/au.png" alt="AU"></span>
              <span class="hc-tr-more">+175</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /hc-track -->

  <!-- ── Navigation Arrows ──────────────────── -->
  <button class="hc-arr hc-arr--prev" id="hcPrev" aria-label="Previous slide">
    <i class="ri-arrow-left-s-line"></i>
  </button>
  <button class="hc-arr hc-arr--next" id="hcNext" aria-label="Next slide">
    <i class="ri-arrow-right-s-line"></i>
  </button>

  <!-- ── Slide Counter + Dots ──────────────── -->
  <div class="hc-nav">
    <div class="hc-nav-dots" id="hcDots">
      <button class="hc-dot active" onclick="hcGo(0)" aria-label="Slide 1"></button>
      <button class="hc-dot" onclick="hcGo(1)" aria-label="Slide 2"></button>
      <button class="hc-dot" onclick="hcGo(2)" aria-label="Slide 3"></button>
    </div>
    <div class="hc-counter"><span id="hcCur">01</span> <span class="hc-counter-sep">/</span> <span>03</span></div>
  </div>

  <!-- ── Progress Bar ───────────────────────── -->
  <div class="hc-progress-track">
    <div class="hc-progress-fill" id="hcProgress"></div>
  </div>

  <!-- ── Persistent Bottom Stats ───────────── -->
  <div class="hc-stats-bar">
    <div class="bk-wrap hc-stats-inner">
      <div class="hc-stat"><span>$4.8B+</span><small>Assets Managed</small></div>
      <div class="hc-stat-sep"></div>
      <div class="hc-stat"><span>250K+</span><small>Happy Customers</small></div>
      <div class="hc-stat-sep"></div>
      <div class="hc-stat"><span>180+</span><small>Countries</small></div>
      <div class="hc-stat-sep"></div>
      <div class="hc-stat"><span>15+</span><small>Years of Excellence</small></div>
    </div>
  </div>

  <!-- ── Scroll hint ────────────────────────── -->
  <div class="hc-scroll-hint"><span></span></div>

</section>

<script>
/* ── Carousel Engine ─────────────────────────────────────── */
(function(){
  /* Fix 100vh on mobile browsers that include the address bar */
  function setVh(){
    document.documentElement.style.setProperty('--vh', (window.innerHeight * 0.01) + 'px');
  }
  setVh();
  window.addEventListener('resize', setVh, {passive:true});

  var TOTAL   = 3,
      INTERVAL= 7000,
      cur     = 0,
      timer   = null,
      running = false;

  var track    = document.getElementById('hcTrack'),
      dots     = document.querySelectorAll('.hc-dot'),
      progress = document.getElementById('hcProgress'),
      counter  = document.getElementById('hcCur'),
      slides   = document.querySelectorAll('.hc-slide');

  function pad(n){ return n < 10 ? '0'+n : n; }

  function go(i){
    // Remove active from current slide
    slides[cur].classList.remove('hc-active');
    slides[cur].querySelectorAll('.hc-ani').forEach(function(el){
      el.classList.remove('hc-ani--in');
    });
    dots[cur].classList.remove('active');

    cur = ((i % TOTAL) + TOTAL) % TOTAL;

    slides[cur].classList.add('hc-active');
    dots[cur].classList.add('active');
    if(counter) counter.textContent = pad(cur + 1);

    // Stagger text animations in
    var anis = slides[cur].querySelectorAll('.hc-ani');
    anis.forEach(function(el){ el.classList.remove('hc-ani--in'); });
    // Force reflow then add
    requestAnimationFrame(function(){
      requestAnimationFrame(function(){
        anis.forEach(function(el){ el.classList.add('hc-ani--in'); });
      });
    });

    resetProgress();
  }

  function resetProgress(){
    if(!progress) return;
    progress.style.transition = 'none';
    progress.style.width = '0%';
    void progress.offsetWidth;
    progress.style.transition = 'width '+INTERVAL+'ms linear';
    progress.style.width = '100%';
  }

  function startAuto(){
    if(running) return;
    running = true;
    timer = setInterval(function(){ go(cur+1); }, INTERVAL);
  }
  function stopAuto(){
    running = false;
    clearInterval(timer);
    timer = null;
  }

  // Public hooks
  window.hcGo = function(i){ stopAuto(); go(i); startAuto(); };
  document.getElementById('hcPrev').addEventListener('click', function(){ stopAuto(); go(cur-1); startAuto(); });
  document.getElementById('hcNext').addEventListener('click', function(){ stopAuto(); go(cur+1); startAuto(); });

  // Swipe
  var touchX = 0;
  var hero = document.getElementById('hcHero');
  hero.addEventListener('touchstart', function(e){ touchX = e.touches[0].clientX; }, {passive:true});
  hero.addEventListener('touchend', function(e){
    var dx = e.changedTouches[0].clientX - touchX;
    if(Math.abs(dx) > 40){ stopAuto(); go(dx < 0 ? cur+1 : cur-1); startAuto(); }
  }, {passive:true});

  // Pause on hover
  hero.addEventListener('mouseenter', function(){ stopAuto(); if(progress){ progress.style.transition='none'; } });
  hero.addEventListener('mouseleave', function(){ resetProgress(); startAuto(); });

  // Boot
  go(0);
  startAuto();
})();
</script>

<!-- ============================================================
     MARQUEE RIBBON
     ============================================================ -->
<div class="hp-marquee-wrap">
  <div class="hp-marquee-track">
    <span><i class="ri-shield-check-fill"></i> FDIC Insured</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-lock-fill"></i> 256-bit SSL Encryption</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-global-line"></i> 180+ Countries Supported</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-customer-service-2-line"></i> 24 / 7 Expert Support</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-award-fill"></i> Award-Winning Platform 2025</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-bank-line"></i> Zero Hidden Fees</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-shield-check-fill"></i> FDIC Insured</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-lock-fill"></i> 256-bit SSL Encryption</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-global-line"></i> 180+ Countries Supported</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-customer-service-2-line"></i> 24 / 7 Expert Support</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-award-fill"></i> Award-Winning Platform 2025</span>
    <span class="hp-mq-dot">◆</span>
    <span><i class="ri-bank-line"></i> Zero Hidden Fees</span>
    <span class="hp-mq-dot">◆</span>
  </div>
</div>

<!-- ============================================================
     FEATURED PRODUCTS
     ============================================================ -->
<section class="hp-section" id="services">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label"><i class="ri-grid-line"></i> Banking Products</span>
      <h2 class="bk-title">Choose the Account That Fits Your Life</h2>
      <p class="bk-desc">From everyday current accounts to premium wealth portfolios — we have a solution for every stage.</p>
    </div>
    <div class="hp-products-grid">

      <div class="hp-product sr">
        <div class="hp-product-head hp-product-head--green">
          <i class="ri-bank-line"></i>
          <h3>Current Account</h3>
          <p>For everyday banking</p>
        </div>
        <div class="hp-product-body">
          <div class="hp-product-rate"><span>0.50%</span> <small>AER on balance</small></div>
          <ul>
            <li><i class="ri-check-line"></i> No monthly fees</li>
            <li><i class="ri-check-line"></i> Instant transfers &amp; payments</li>
            <li><i class="ri-check-line"></i> Free debit card included</li>
            <li><i class="ri-check-line"></i> Mobile &amp; online banking</li>
            <li><i class="ri-check-line"></i> Up to 5 sub-accounts</li>
          </ul>
          <a href="{{ route('register') }}" class="hp-btn hp-btn--dark hp-btn--full">Open Account <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>

      <div class="hp-product hp-product--featured sr">
        <div class="hp-product-badge">Most Popular</div>
        <div class="hp-product-head hp-product-head--gold">
          <i class="ri-vip-crown-line"></i>
          <h3>Premium Savings</h3>
          <p>For serious savers</p>
        </div>
        <div class="hp-product-body">
          <div class="hp-product-rate"><span>4.75%</span> <small>AER variable</small></div>
          <ul>
            <li><i class="ri-check-line"></i> High-yield interest daily</li>
            <li><i class="ri-check-line"></i> No minimum balance</li>
            <li><i class="ri-check-line"></i> Instant access to funds</li>
            <li><i class="ri-check-line"></i> FSCS protected deposits</li>
            <li><i class="ri-check-line"></i> Dedicated relationship manager</li>
          </ul>
          <a href="{{ route('register') }}" class="hp-btn hp-btn--gold hp-btn--full">Get Premium <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>

      <div class="hp-product sr">
        <div class="hp-product-head hp-product-head--dark">
          <i class="ri-briefcase-4-line"></i>
          <h3>Business Account</h3>
          <p>For companies &amp; traders</p>
        </div>
        <div class="hp-product-body">
          <div class="hp-product-rate"><span>2.10%</span> <small>AER on balance</small></div>
          <ul>
            <li><i class="ri-check-line"></i> Multi-currency accounts</li>
            <li><i class="ri-check-line"></i> Bulk payroll processing</li>
            <li><i class="ri-check-line"></i> Merchant payment gateway</li>
            <li><i class="ri-check-line"></i> Business credit line</li>
            <li><i class="ri-check-line"></i> HMRC-ready reporting</li>
          </ul>
          <a href="{{ route('register') }}" class="hp-btn hp-btn--dark hp-btn--full">Apply Now <i class="ri-arrow-right-line"></i></a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ============================================================
     WHY CHOOSE US — SPLIT
     ============================================================ -->
<section class="hp-section hp-section--dark" id="about">
  <div class="bk-wrap">
    <div class="hp-why-grid">
      <div class="hp-why-left sr">
        <span class="hp-label-light"><i class="ri-award-line"></i> Why Alchemists Aureum</span>
        <h2 class="hp-why-title">Banking Designed Around Trust &amp; Innovation</h2>
        <p class="hp-why-sub">For over 15 years we have combined human expertise with cutting-edge technology to provide a banking experience that is transparent, secure, and truly personal.</p>
        <div class="hp-why-features">
          <div class="hp-why-feat">
            <div class="hp-why-feat-icon"><i class="ri-shield-keyhole-line"></i></div>
            <div>
              <h4>Bank-Grade Security</h4>
              <p>Biometric login, real-time fraud AI, and end-to-end 256-bit encryption on every transaction.</p>
            </div>
          </div>
          <div class="hp-why-feat">
            <div class="hp-why-feat-icon"><i class="ri-flashlight-line"></i></div>
            <div>
              <h4>Instant Everything</h4>
              <p>Payments clear in seconds. Account opening in minutes. No queues, no branch visits required.</p>
            </div>
          </div>
          <div class="hp-why-feat">
            <div class="hp-why-feat-icon"><i class="ri-hand-heart-line"></i></div>
            <div>
              <h4>Human-First Support</h4>
              <p>Certified bankers available 24/7 via chat, phone, or video — not just chatbots.</p>
            </div>
          </div>
          <div class="hp-why-feat">
            <div class="hp-why-feat-icon"><i class="ri-leaf-line"></i></div>
            <div>
              <h4>Ethical &amp; Sustainable</h4>
              <p>We invest in green initiatives and maintain full transparency in where your money goes.</p>
            </div>
          </div>
        </div>
        <a href="{{ url('about') }}" class="hp-btn hp-btn--gold" style="margin-top:28px">Learn Our Story <i class="ri-arrow-right-line"></i></a>
      </div>
      <div class="hp-why-right sr">
        <div class="hp-why-img-wrap">
          <img src="frontassets/images/banner/5.jpg" alt="Banking excellence" class="hp-why-img">
          <div class="hp-why-badge">
            <div class="hp-why-badge-ring"></div>
            <span class="hp-why-badge-num">15+</span>
            <span class="hp-why-badge-txt">Years of<br>Excellence</span>
          </div>
          <div class="hp-why-award">
            <i class="ri-award-fill"></i>
            <span>Best Digital Bank 2025</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     HOW IT WORKS — VISUAL STEPS
     ============================================================ -->
<section class="hp-section" id="how-it-works">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label"><i class="ri-route-line"></i> How It Works</span>
      <h2 class="bk-title">Your Account, Ready in Minutes</h2>
      <p class="bk-desc">No paperwork, no branch visit. Everything happens online in three fast steps.</p>
    </div>
    <div class="hp-steps-grid">
      <div class="hp-step-card sr">
        <div class="hp-step-icon-wrap">
          <div class="hp-step-icon"><i class="ri-user-add-line"></i></div>
          <span class="hp-step-n">01</span>
        </div>
        <div class="hp-step-connector"></div>
        <h3>Create Your Account</h3>
        <p>Fill in your details online — takes under 3 minutes. No branch visit required.</p>
      </div>
      <div class="hp-step-card sr">
        <div class="hp-step-icon-wrap">
          <div class="hp-step-icon"><i class="ri-scan-2-line"></i></div>
          <span class="hp-step-n">02</span>
        </div>
        <div class="hp-step-connector"></div>
        <h3>Verify Your Identity</h3>
        <p>Upload a photo ID and take a quick selfie. Secure, automated KYC in minutes.</p>
      </div>
      <div class="hp-step-card sr">
        <div class="hp-step-icon-wrap">
          <div class="hp-step-icon"><i class="ri-money-pound-circle-line"></i></div>
          <span class="hp-step-n">03</span>
        </div>
        <div class="hp-step-connector" style="display:none"></div>
        <h3>Fund &amp; Start Banking</h3>
        <p>Deposit any amount to activate your account and begin transacting immediately.</p>
      </div>
    </div>
    <div style="text-align:center;margin-top:36px">
      <a href="{{ route('register') }}" class="hp-btn hp-btn--dark">Open Your Account Now <i class="ri-arrow-right-line"></i></a>
    </div>
  </div>
</section>

<!-- ============================================================
     EXCHANGE RATES — TERMINAL STYLE
     ============================================================ -->
<section class="hp-section hp-section--offwhite" id="rates">
  <div class="bk-wrap">
    <div class="hp-rates-layout">
      <div class="hp-rates-left sr">
        <span class="bk-label"><i class="ri-line-chart-line"></i> Live FX Rates</span>
        <h2 class="bk-title" style="text-align:left">Today&rsquo;s Exchange Rates</h2>
        <p class="bk-desc" style="text-align:left;margin:0 0 24px">Best-in-class rates refreshed every 60 seconds. Transfer internationally with confidence and minimal fees.</p>
        <div class="hp-rates-chips">
          <span><i class="ri-time-line"></i> Live &bull; 60s refresh</span>
          <span><i class="ri-secure-payment-line"></i> Zero transfer fee over $500</span>
        </div>
        <a href="{{ route('register') }}" class="hp-btn hp-btn--dark" style="margin-top:24px">Start Converting <i class="ri-exchange-dollar-line"></i></a>
      </div>
      <div class="hp-rates-right sr">
        <div class="hp-rates-terminal">
          <div class="hp-rates-terminal-head">
            <span class="hp-terminal-dot hp-terminal-dot--r"></span>
            <span class="hp-terminal-dot hp-terminal-dot--y"></span>
            <span class="hp-terminal-dot hp-terminal-dot--g"></span>
            <span class="hp-terminal-title">FX LIVE — USD BASE</span>
            <span class="hp-terminal-time" id="hpFxTime">--:--:--</span>
          </div>
          <table class="hp-fx-table">
            <thead>
              <tr><th>CCY</th><th>BUY</th><th>SELL</th><th>CHG</th><th></th></tr>
            </thead>
            <tbody>
              <tr>
                <td><img src="https://flagcdn.com/w20/gb.png" alt=""> <b>GBP</b></td>
                <td class="hp-mono">1.2645</td><td class="hp-mono">1.2590</td>
                <td><span class="hp-fx-up">▲ 0.12%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
              <tr>
                <td><img src="https://flagcdn.com/w20/eu.png" alt=""> <b>EUR</b></td>
                <td class="hp-mono">1.0842</td><td class="hp-mono">1.0790</td>
                <td><span class="hp-fx-up">▲ 0.08%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
              <tr>
                <td><img src="https://flagcdn.com/w20/jp.png" alt=""> <b>JPY</b></td>
                <td class="hp-mono">0.00671</td><td class="hp-mono">0.00665</td>
                <td><span class="hp-fx-dn">▼ 0.15%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
              <tr>
                <td><img src="https://flagcdn.com/w20/ca.png" alt=""> <b>CAD</b></td>
                <td class="hp-mono">0.7410</td><td class="hp-mono">0.7365</td>
                <td><span class="hp-fx-up">▲ 0.05%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
              <tr>
                <td><img src="https://flagcdn.com/w20/ch.png" alt=""> <b>CHF</b></td>
                <td class="hp-mono">1.1290</td><td class="hp-mono">1.1235</td>
                <td><span class="hp-fx-dn">▼ 0.03%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
              <tr>
                <td><img src="https://flagcdn.com/w20/au.png" alt=""> <b>AUD</b></td>
                <td class="hp-mono">0.6521</td><td class="hp-mono">0.6480</td>
                <td><span class="hp-fx-up">▲ 0.09%</span></td>
                <td><a href="{{ route('register') }}" class="hp-fx-btn">Send</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     TESTIMONIALS — GRID LAYOUT
     ============================================================ -->
<section class="hp-section" id="testimonials">
  <div class="bk-wrap">
    <div class="bk-section-top">
      <span class="bk-label"><i class="ri-double-quotes-l"></i> Customer Reviews</span>
      <h2 class="bk-title">Trusted by Thousands</h2>
      <p class="bk-desc">Don&rsquo;t just take our word for it &mdash; hear from the people who bank with us daily.</p>
    </div>

    <!-- Summary bar -->
    <div class="hp-review-bar sr">
      <div class="hp-review-score">
        <span class="hp-review-big">4.9</span>
        <div>
          <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
          <small>Based on 14,200+ reviews</small>
        </div>
      </div>
      <div class="hp-review-breakdown">
        <div class="hp-rb-row"><span>5★</span><div class="hp-rb-bar"><div style="width:89%"></div></div><small>89%</small></div>
        <div class="hp-rb-row"><span>4★</span><div class="hp-rb-bar"><div style="width:8%"></div></div><small>8%</small></div>
        <div class="hp-rb-row"><span>3★</span><div class="hp-rb-bar"><div style="width:2%"></div></div><small>2%</small></div>
        <div class="hp-rb-row"><span>2★</span><div class="hp-rb-bar"><div style="width:1%"></div></div><small>1%</small></div>
      </div>
      <div class="hp-review-logos">
        <span><i class="ri-google-fill" style="color:#4285F4"></i> Google</span>
        <span><i class="ri-star-fill" style="color:var(--gold)"></i> Trustpilot</span>
        <span><i class="ri-apple-fill"></i> App Store</span>
      </div>
    </div>

    <div class="hp-testi-grid">
      <div class="hp-testi sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>&ldquo;Alchemists Aureum Bank transformed how I manage money. Transfers are instant and the support team is genuinely world class.&rdquo;</p>
        <div class="hp-testi-author">
          <div class="hp-testi-av" style="background:#1A6B4A">JW</div>
          <div><strong>James Whitfield</strong><span>Business Owner</span></div>
        </div>
      </div>
      <div class="hp-testi sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>&ldquo;By far the best digital banking experience I&rsquo;ve had. Low fees, beautiful interface, and real humans when you need help.&rdquo;</p>
        <div class="hp-testi-author">
          <div class="hp-testi-av" style="background:#C8952B">SM</div>
          <div><strong>Sarah Mitchell</strong><span>Freelance Designer</span></div>
        </div>
      </div>
      <div class="hp-testi sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-half-fill"></i></div>
        <p>&ldquo;I save hundreds every month on international transfers. The FX rates are genuinely competitive — no other bank comes close.&rdquo;</p>
        <div class="hp-testi-author">
          <div class="hp-testi-av" style="background:#003D2B">DG</div>
          <div><strong>David George</strong><span>Import / Export</span></div>
        </div>
      </div>
      <div class="hp-testi sr">
        <div class="bk-stars"><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i><i class="ri-star-fill"></i></div>
        <p>&ldquo;Opening my business account took less than 5 minutes. My relationship manager has been outstanding from day one.&rdquo;</p>
        <div class="hp-testi-author">
          <div class="hp-testi-av" style="background:#A07322">MF</div>
          <div><strong>Maria Fernandez</strong><span>Startup Founder</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============================================================
     CTA — SPLIT PANEL
     ============================================================ -->
<section class="hp-cta-split">
  <div class="hp-cta-left">
    <div class="hp-cta-left-inner">
      <span class="hp-label-light"><i class="ri-rocket-line"></i> Get Started Today</span>
      <h2>Banking That Works<br>as Hard as You Do</h2>
      <p>Join over 250,000 customers who have made the switch. Your free account is ready in under 5 minutes.</p>
      <div class="hp-cta-btns">
        <a href="{{ route('register') }}" class="hp-btn hp-btn--gold">Open Free Account <i class="ri-arrow-right-line"></i></a>
        <a href="{{ url('contact') }}" class="hp-btn hp-btn--outline-light">Talk to an Advisor <i class="ri-phone-line"></i></a>
      </div>
      <div class="hp-cta-trust">
        <span><i class="ri-shield-check-fill"></i> FDIC Insured</span>
        <span><i class="ri-lock-fill"></i> Secure &amp; Encrypted</span>
        <span><i class="ri-time-line"></i> 5-min Setup</span>
      </div>
    </div>
  </div>
  <div class="hp-cta-right" style="background-image:url('frontassets/images/banner/2.jpg')">
    <div class="hp-cta-right-overlay"></div>
  </div>
</section>

@include('home.footer')

<script>
// FX Live Clock
(function(){
  function tick(){
    var el=document.getElementById('hpFxTime');
    if(el)el.textContent=new Date().toTimeString().slice(0,8);
  }
  tick(); setInterval(tick,1000);
})();
</script>
