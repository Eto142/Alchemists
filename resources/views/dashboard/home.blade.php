@extends('layouts.dashboard')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Account alerts --}}
@if (Auth::user()->user_block == 1)
    <div class="account-alert blocked">
        <i class="bi bi-lock-fill"></i>
        <div><strong>Account Blocked:</strong> Please clear your outstanding tax obligations to restore access.</div>
    </div>
@elseif (Auth::user()->user_activity == 1)
    <div class="account-alert flagged">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div><strong>Suspicious Activity Detected:</strong> Your account has been flagged. Please contact support.</div>
    </div>
@endif

{{-- Welcome + Date row --}}
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h4 class="fw-700 mb-1">Welcome back, {{ Auth::user()->first_name }}!</h4>
        <p class="text-muted mb-0 small">Here's your financial overview for today, {{ now()->format('F d, Y') }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('deposit') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle me-1"></i>Deposit</a>
        <a href="{{ route('bank') }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-send me-1"></i>Transfer</a>
    </div>
</div>

{{-- Row 1 — Balance Hero (full width) --}}
<div class="hero-balance-card mb-4">
    <div class="hero-balance-bg"></div>
    <div class="row align-items-center position-relative">
        <div class="col-lg-7">
            <div class="d-flex align-items-center gap-2 mb-2">
                <span class="hero-balance-label">Total Available Balance</span>
                <button type="button" class="btn-toggle-balance" id="toggleBalance" title="Hide balance">
                    <i class="bi bi-eye-fill" id="balanceEyeIcon"></i>
                </button>
            </div>
            <div class="hero-balance-amount" id="balanceAmount">
                <span class="balance-visible">{{ Auth::user()->currency }}{{ number_format($balance, 2) }}</span>
                <span class="balance-hidden d-none">{{ Auth::user()->currency }}*****</span>
            </div>
            <div class="hero-balance-sub mt-2">
                <span class="me-3"><i class="bi bi-hash me-1"></i>{{ Auth::user()->a_number }}</span>
                <span>| {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
            </div>
            <div class="hero-balance-date mt-1">
                <i class="bi bi-clock me-1"></i>Last updated just now
                @if(Auth::user()->kyc_status == '1')
                    &nbsp;<span class="hero-badge verified"><i class="bi bi-patch-check-fill me-1"></i>Verified</span>
                @else
                    &nbsp;<span class="hero-badge unverified"><i class="bi bi-exclamation-circle me-1"></i>Unverified</span>
                @endif
            </div>
            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('deposit') }}" class="btn btn-sm hero-action-btn"><i class="bi bi-plus-circle me-1"></i>Add Money</a>
                <a href="{{ route('transactions') }}" class="btn btn-sm hero-action-btn-outline"><i class="bi bi-clock-history me-1"></i>History</a>
            </div>
        </div>
        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0 d-none d-lg-block">
            <span><i class="bi bi-building me-1"></i>{{ Auth::user()->account_type }}</span>
        </div>
    </div>
</div>

{{-- Row 2 — Services Grid --}}
<div class="db-card mb-4">
    <div class="db-card-header d-flex justify-content-between align-items-center">
        <span>Services</span>
        <a href="#" class="text-accent fw-500 link-sm">Edit</a>
    </div>
    <div class="db-card-body">
        <div class="row g-3 text-center">
            <div class="col-3">
                <a href="{{ route('bank') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-send-fill"></i></div>
                    <span>Transfer</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('deposit') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-plus-circle-fill"></i></div>
                    <span>Deposit</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('cfx') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-currency-exchange"></i></div>
                    <span>Forex</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('cryptopage') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-currency-bitcoin"></i></div>
                    <span>Crypto</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('card') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-credit-card-2-front"></i></div>
                    <span>Cards</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('loan') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-cash-stack"></i></div>
                    <span>Loans</span>
                </a>
            </div>
            <div class="col-3">
                <a href="{{ route('transactions') }}" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-clock-history"></i></div>
                    <span>History</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-phone-fill"></i></div>
                    <span>Airtime</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-wifi"></i></div>
                    <span>Data</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-trophy-fill"></i></div>
                    <span>Betting</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-piggy-bank-fill"></i></div>
                    <span>Savings</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-book-fill"></i></div>
                    <span>Education</span>
                </a>
            </div>
            <div class="col-3">
                <a href="#" class="service-grid-item">
                    <div class="service-grid-icon"><i class="bi bi-grid-fill"></i></div>
                    <span>More</span>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Row 3 — Stat cards --}}
<div class="row g-3 mb-4">
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon blue"><i class="bi bi-arrow-down-left"></i></div>
            <div>
                <div class="stat-label">Total Deposits</div>
                <div class="stat-value balance-sensitive">{{ Auth::user()->currency }}{{ number_format($totalDeposit ?? 0, 2) }}</div>
                <div class="stat-value balance-sensitive-hidden d-none">****</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon red"><i class="bi bi-arrow-up-right"></i></div>
            <div>
                <div class="stat-label">Total Spent</div>
                <div class="stat-value balance-sensitive">{{ Auth::user()->currency }}{{ number_format($totalSpent ?? 0, 2) }}</div>
                <div class="stat-value balance-sensitive-hidden d-none">****</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon green"><i class="bi bi-credit-card"></i></div>
            <div>
                <div class="stat-label">Active Cards</div>
                <div class="stat-value">{{ $activeCards ?? 0 }}</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="stat-card">
            <div class="stat-icon yellow"><i class="bi bi-graph-up-arrow"></i></div>
            <div>
                <div class="stat-label">Loans</div>
                <div class="stat-value">{{ $trades->count() }}</div>
            </div>
        </div>
    </div>
</div>

{{-- Rewards --}}
<div class="mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="fw-600">Rewards</span>
    </div>
    <div class="row g-3">
        <div class="col-6">
            <div class="reward-card">
                <div class="reward-icon cashback-icon">&#127917;</div>
                <div class="reward-stars">&#9733;&#9733;&#9733;&#9733;</div>
                <div class="reward-label">Cashback</div>
                <div class="reward-value balance-sensitive">{{ Auth::user()->currency }}0.00</div>
                <div class="reward-value balance-sensitive-hidden d-none">****</div>
            </div>
        </div>
        <div class="col-6">
            <div class="reward-card">
                <div class="reward-icon referral-icon">&#128226;</div>
                <div class="reward-stars text-muted small">&nbsp;</div>
                <div class="reward-label">Referrals</div>
                <div class="reward-value balance-sensitive">{{ Auth::user()->currency }}0.00</div>
                <div class="reward-value balance-sensitive-hidden d-none">****</div>
            </div>
        </div>
    </div>
</div>

{{-- Row 4 — Transactions (full width) --}}
<div class="row g-4 mb-4">

    {{-- My Card --}}
    {{-- <div class="col-lg-5">
        <div class="db-card h-100">
            <div class="db-card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-credit-card-2-front me-2"></i>My Card</span>
                <a href="{{ route('card') }}" class="text-accent fw-500 link-sm">Manage <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="db-card-body">
                @forelse($cards as $card)
                    @if($card->status == 0)
                        Card under review
                        <div class="text-center py-4">
                            <div class="mb-3 empty-icon-circle sm warning-bg">
                                <i class="bi bi-hourglass-split circle-icon-sm"></i>
                            </div>
                            <h6 class="fw-600">Card Under Review</h6>
                            <p class="text-muted small mb-0">Your card application is being processed. We'll notify you when it's ready.</p>
                        </div>
                    @else
                        Virtual card display
                        <div class="home-virtual-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <span class="badge bg-success bg-opacity-25 text-white label-xs">ACTIVE</span>
                                <img src="{{ asset('mastercard.png') }}" alt="Mastercard" class="icon-sm" onerror="this.style.display='none'">
                            </div>
                            <div class="card-num balance-sensitive">{{ implode(' ', str_split($card->card_number, 4)) }}</div>
                            <div class="card-num balance-sensitive-hidden d-none">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;</div>
                            <div class="d-flex justify-content-between card-meta">
                                <div>
                                    <div class="card-label">HOLDER</div>
                                    <div class="fw-500">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="card-label">CVV</div>
                                    <div class="fw-500">&bull;&bull;&bull;</div>
                                </div>
                                <div class="text-end">
                                    <div class="card-label">EXPIRY</div>
                                    <div class="fw-500">{{ \Carbon\Carbon::parse($card->card_expiry)->format('m/y') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('card') }}" class="btn btn-sm btn-outline-primary flex-fill"><i class="bi bi-eye me-1"></i>View Details</a>
                            <button class="btn btn-sm btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#homeDeliveryModal"><i class="bi bi-truck me-1"></i>Request Delivery</button>
                        </div>
                    @endif
                @empty
                    No card - request one
                    <div class="text-center py-4">
                        <div class="mb-3 empty-icon-circle md accent-bg">
                            <i class="bi bi-credit-card circle-icon-md"></i>
                        </div>
                        <h6 class="fw-600 mb-1">No Card Yet</h6>
                        <p class="text-muted small mb-3">Get a virtual debit card for online purchases and ATM withdrawals</p>
                        <a href="{{ route('request.card', Auth::user()->id) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-1"></i> Request Card
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div> --}}

    {{-- Recent Transactions --}}
    <div class="col-12">
        <div class="db-card h-100">
            <div class="db-card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-clock-history me-2"></i>Recent Transactions</span>
                <a href="{{ route('transactions') }}" class="text-accent fw-500 link-sm">View All <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="db-card-body">
                @if($transaction->isEmpty())
                    <div class="text-center py-5">
                        <i class="bi bi-clock-history text-muted icon-muted-lg"></i>
                        <p class="text-muted mt-2 mb-0">No transactions yet</p>
                    </div>
                @else
                    @foreach($transaction as $details)
                        <div class="txn-item">
                            <div class="txn-icon 
                                @if($details->transaction == 'Bank Transfer') bg-primary bg-opacity-10 text-primary
                                @elseif($details->transaction == 'Loan') bg-success bg-opacity-10 text-success
                                @elseif($details->transaction == 'Card') bg-dark bg-opacity-10 text-dark
                                @elseif($details->transaction == 'Crypto Withdrawal') bg-warning bg-opacity-10 text-warning
                                @elseif($details->transaction == 'Paypal Withdrawal') bg-info bg-opacity-10 text-info
                                @else bg-secondary bg-opacity-10 text-secondary
                                @endif">
                                @if($details->transaction == 'Bank Transfer')
                                    <i class="bi bi-arrow-up-right"></i>
                                @elseif($details->transaction == 'Loan')
                                    <i class="bi bi-arrow-down-left"></i>
                                @elseif($details->transaction == 'Card')
                                    <i class="bi bi-credit-card"></i>
                                @elseif($details->transaction == 'Crypto Withdrawal')
                                    <i class="bi bi-currency-bitcoin"></i>
                                @elseif($details->transaction == 'Paypal Withdrawal')
                                    <i class="bi bi-paypal"></i>
                                @else
                                    <i class="bi bi-arrow-left-right"></i>
                                @endif
                            </div>
                            <div class="txn-details">
                                <div class="txn-title">{{ Str::limit($details->transaction_description, 30) }}</div>
                                <div class="txn-sub">{{ $details->transaction }} &middot; {{ $details->created_at->format('M d, Y') }}</div>
                            </div>
                            <div class="txn-amount">
                                <div class="value balance-sensitive
                                    @if(in_array($details->transaction, ['Bank Transfer','Paypal Withdrawal','Skrill Withdrawal','Crypto Withdrawal'])) text-danger
                                    @elseif($details->transaction == 'Loan') text-success
                                    @endif">
                                    @if(in_array($details->transaction, ['Bank Transfer','Paypal Withdrawal','Skrill Withdrawal','Crypto Withdrawal']))
                                        -{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                    @elseif($details->transaction == 'Loan')
                                        +{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                    @elseif($details->transaction == 'Card')
                                        &mdash;
                                    @endif
                                </div>
                                <div class="value balance-sensitive-hidden d-none">****</div>
                                <div>
                                    @if($details->transaction_status == '1')
                                        <span class="badge badge-success">{{ $details->transaction == 'Card' ? 'Approved' : 'Successful' }}</span>
                                    @elseif($details->transaction_status == '0')
                                        <span class="badge badge-pending">Pending</span>
                                    @else
                                        <span class="badge badge-danger">Failed</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Row 5 — Investments + Services --}}
<div class="row g-4 mb-4">
    {{-- Investments --}}
    <div class="col-lg-7">
        <div class="db-card h-100 overflow-hidden">
            <div class="db-card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-graph-up-arrow me-2"></i>Investment Portfolio</span>
                <a href="{{ route('cfx') }}" class="text-accent fw-500 link-sm">Trade <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="db-card-body p-0">
                @if($trades->count() > 0)
                    {{-- Portfolio summary strip --}}
                    <div class="inv-summary-strip">
                        <div class="inv-summary-item">
                            <div class="inv-summary-label">Total Invested</div>
                            <div class="inv-summary-value balance-sensitive">${{ number_format($trades->sum('amount_usd'), 2) }}</div>
                            <div class="inv-summary-value balance-sensitive-hidden d-none">****</div>
                        </div>
                        <div class="inv-summary-divider"></div>
                        <div class="inv-summary-item">
                            <div class="inv-summary-label">Open Positions</div>
                            <div class="inv-summary-value">{{ $trades->count() }}</div>
                        </div>
                        <div class="inv-summary-divider"></div>
                        <div class="inv-summary-item">
                            <div class="inv-summary-label">Unique Assets</div>
                            <div class="inv-summary-value">{{ $trades->pluck('asset_symbol')->unique()->count() }}</div>
                        </div>
                    </div>
                    {{-- Position list --}}
                    <div class="px-4 py-2">
                        @foreach($trades as $trade)
                            <div class="inv-position-item">
                                <div class="inv-position-icon">{{ strtoupper(substr($trade->asset_symbol, 0, 2)) }}</div>
                                <div class="inv-position-info">
                                    <div class="inv-position-name">
                                        {{ $trade->asset_name }}
                                        <span class="inv-position-badge {{ $trade->type == 'buy' ? 'badge-buy' : 'badge-sell' }}">{{ ucfirst($trade->type) }}</span>
                                    </div>
                                    <div class="inv-position-meta">{{ $trade->quantity }} units &middot; {{ ucfirst($trade->order_type) }} order</div>
                                </div>
                                <div class="inv-position-amount">
                                    <div class="balance-sensitive">${{ number_format($trade->amount_usd, 2) }}</div>
                                    <div class="balance-sensitive-hidden d-none">****</div>
                                    <div class="inv-symbol-tag">{{ strtoupper($trade->asset_symbol) }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5 px-4">
                        <div class="mb-3 empty-icon-circle md accent-bg mx-auto">
                            <i class="bi bi-graph-up circle-icon-md"></i>
                        </div>
                        <h6 class="fw-600 mb-1">No Investments Yet</h6>
                        <p class="text-muted small mb-3">Start growing your wealth with stocks, crypto &amp; more</p>
                        <a href="{{ route('cfx') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle me-1"></i> Start Investing
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Quick Services --}}
    <div class="col-lg-5">
        <div class="db-card h-100">
            <div class="db-card-header"><i class="bi bi-grid me-2"></i>Quick Services</div>
            <div class="db-card-body">
                <a href="{{ route('bank') }}" class="service-link-item">
                    <div class="service-link-icon blue"><i class="bi bi-send-fill"></i></div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-600">Bank Transfer</h6>
                        <span class="text-muted small">Send to any bank account</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
                <a href="{{ route('paypal') }}" class="service-link-item">
                    <div class="service-link-icon yellow"><i class="bi bi-paypal"></i></div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-600">PayPal</h6>
                        <span class="text-muted small">Withdraw to PayPal</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
                <a href="{{ route('skrill') }}" class="service-link-item">
                    <div class="service-link-icon green"><i class="bi bi-wallet2"></i></div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-600">Skrill</h6>
                        <span class="text-muted small">Withdraw to Skrill</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
                <a href="{{ route('crypto') }}" class="service-link-item">
                    <div class="service-link-icon red"><i class="bi bi-currency-bitcoin"></i></div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-600">Crypto</h6>
                        <span class="text-muted small">Withdraw cryptocurrency</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
                <a href="{{ route('loan') }}" class="service-link-item border-0">
                    <div class="service-link-icon accent"><i class="bi bi-cash-stack"></i></div>
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-600">Loans</h6>
                        <span class="text-muted small">Apply for a loan</span>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Card Delivery Modal --}}
<div class="modal fade" id="homeDeliveryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-clean">
            <div class="modal-header">
                <h5 class="modal-title fw-600"><i class="bi bi-truck me-2"></i>Card Delivery Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="homeDeliveryForm" action="{{ route('requestcard.delivery') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-500">Full Name</label>
                        <input type="text" class="form-control" name="fname" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-500">Delivery Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter your full address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-500">Phone Number</label>
                        <input type="tel" class="form-control" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-500">Email Address</label>
                        <input type="email" class="form-control" name="emailAddress" value="{{ Auth::user()->email }}" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="homeDeliveryForm" class="btn btn-primary"><i class="bi bi-send me-1"></i>Submit Request</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleBalance');
    const eyeIcon = document.getElementById('balanceEyeIcon');
    let hidden = false;

    toggleBtn.addEventListener('click', function () {
        hidden = !hidden;

        // Toggle main balance
        document.querySelectorAll('.balance-visible').forEach(el => el.classList.toggle('d-none', hidden));
        document.querySelectorAll('.balance-hidden').forEach(el => el.classList.toggle('d-none', !hidden));

        // Toggle all sensitive values (stat cards, transactions, card number, investments)
        document.querySelectorAll('.balance-sensitive').forEach(el => el.classList.toggle('d-none', hidden));
        document.querySelectorAll('.balance-sensitive-hidden').forEach(el => el.classList.toggle('d-none', !hidden));

        // Toggle eye icon
        eyeIcon.classList.toggle('bi-eye-fill', !hidden);
        eyeIcon.classList.toggle('bi-eye-slash-fill', hidden);
        toggleBtn.title = hidden ? 'Show balance' : 'Hide balance';
    });
});
</script>
@endpush
