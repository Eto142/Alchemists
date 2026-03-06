@extends('layouts.dashboard')

@section('title', 'Transactions')
@section('page-title', 'Transaction History')

@section('content')

<div class="db-card">
    <div class="db-card-header d-flex justify-content-between align-items-center">
        <span>All Transactions</span>
        <span class="text-muted small">{{ Auth::user()->a_number }}</span>
    </div>
    <div class="db-card-body">
        @if($transaction->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-clock-history text-muted icon-muted-xl"></i>
                <h5 class="mt-3 mb-1 fw-600">No transactions yet</h5>
                <p class="text-muted small">Your transaction history will appear here</p>
            </div>
        @else
            @foreach($transaction as $details)
                @php
                    $isDebit = in_array($details->transaction, ['Bank Transfer','Paypal Withdrawal','Skrill Withdrawal','Crypto Withdrawal']);
                    $isCredit = $details->transaction == 'Loan';
                    $amountFormatted = ($isDebit ? '-' : ($isCredit ? '+' : '')) . Auth::user()->currency . number_format($details->transaction_amount, 2);
                    if ($details->transaction == 'Card') {
                        $statusLabel = $details->transaction_status == '1' ? 'Approved' : ($details->transaction_status == '0' ? 'Pending' : 'Failed');
                    } else {
                        $statusLabel = $details->transaction_status == '1' ? 'Successful' : ($details->transaction_status == '0' ? 'Pending' : 'Failed');
                    }
                @endphp
                <div class="txn-item txn-clickable"
                    data-bs-toggle="modal"
                    data-bs-target="#txnDetailModal"
                    data-ref="{{ $details->transaction_ref ?? 'N/A' }}"
                    data-type="{{ $details->transaction }}"
                    data-txn-type="{{ $details->transaction_type ?? '' }}"
                    data-description="{{ $details->transaction_description }}"
                    data-amount="{{ $amountFormatted }}"
                    data-status="{{ $statusLabel }}"
                    data-date="{{ $details->created_at->format('M d, Y · h:i A') }}"
                    data-account-name="{{ $details->account_name ?? '' }}"
                    data-account-number="{{ $details->account_number ?? '' }}"
                    data-bank-name="{{ $details->bank_name ?? ($details->credit->bank_name ?? '') }}"
                    data-routing-number="{{ $details->routing_number ?? '' }}"
                    data-account-type="{{ $details->account_type ?? '' }}"
                    data-sender-name="{{ $details->credit->sender_name ?? '' }}"
                    data-sender-account="{{ $details->credit->sender_account ?? '' }}"
                    style="cursor:pointer;">
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
                        @elseif($details->transaction == 'Skrill Withdrawal')
                            <i class="bi bi-wallet2"></i>
                        @else
                            <i class="bi bi-arrow-left-right"></i>
                        @endif
                    </div>
                    <div class="txn-details">
                        <div class="txn-title">{{ Str::limit($details->transaction_description, 35) }}</div>
                        <div class="txn-sub">{{ $details->transaction }} &middot; {{ $details->created_at->format('M d, Y · h:i A') }}</div>
                    </div>
                    <div class="txn-amount">
                        <div class="value
                            @if($isDebit) text-danger
                            @elseif($isCredit) text-success
                            @endif">
                            {{ $amountFormatted }}
                        </div>
                        <div>
                            @if($statusLabel == 'Approved' || $statusLabel == 'Successful')
                                <span class="badge badge-success">{{ $statusLabel }}</span>
                            @elseif($statusLabel == 'Pending')
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

{{-- Transaction Detail Modal --}}
<div class="modal fade" id="txnDetailModal" tabindex="-1" aria-labelledby="txnDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h6 class="modal-title fw-bold" id="txnDetailModalLabel">Transaction Details</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="text-center mb-4">
                    <div id="modal-txn-icon" class="txn-icon mx-auto mb-2" style="width:56px;height:56px;font-size:1.5rem;display:flex;align-items:center;justify-content:center;border-radius:50%;"></div>
                    <div id="modal-amount" class="fs-4 fw-bold"></div>
                    <div id="modal-status-badge" class="mt-1"></div>
                </div>
                <div class="list-group list-group-flush rounded">
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="text-muted small">Reference</span>
                        <span id="modal-ref" class="small fw-500 text-end" style="word-break:break-all;max-width:60%"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="text-muted small">Type</span>
                        <span id="modal-type" class="small fw-500"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-txn-type-row">
                        <span class="text-muted small">Direction</span>
                        <span id="modal-txn-type" class="small fw-500"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="text-muted small">Description</span>
                        <span id="modal-description" class="small fw-500 text-end" style="max-width:60%"></span>
                    </div>
                    {{-- Bank Transfer recipient details --}}
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-account-name-row">
                        <span class="text-muted small">Recipient Name</span>
                        <span id="modal-account-name" class="small fw-500 text-end" style="max-width:60%"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-account-number-row">
                        <span class="text-muted small">Account Number</span>
                        <span id="modal-account-number" class="small fw-500"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-bank-name-row">
                        <span class="text-muted small">Bank Name</span>
                        <span id="modal-bank-name" class="small fw-500 text-end" style="max-width:60%"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-routing-number-row">
                        <span class="text-muted small">Routing Number</span>
                        <span id="modal-routing-number" class="small fw-500"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-account-type-row">
                        <span class="text-muted small">Account Type</span>
                        <span id="modal-account-type" class="small fw-500"></span>
                    </div>
                    {{-- Credit (inbound) sender details --}}
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-sender-name-row">
                        <span class="text-muted small">Sender Name</span>
                        <span id="modal-sender-name" class="small fw-500 text-end" style="max-width:60%"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between" id="modal-sender-account-row">
                        <span class="text-muted small">Sender Account</span>
                        <span id="modal-sender-account" class="small fw-500"></span>
                    </div>
                    <div class="list-group-item px-0 d-flex justify-content-between">
                        <span class="text-muted small">Date &amp; Time</span>
                        <span id="modal-date" class="small fw-500"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('txnDetailModal');
    modal.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        var ref           = trigger.dataset.ref;
        var type          = trigger.dataset.type;
        var txnType       = trigger.dataset.txnType;
        var description   = trigger.dataset.description;
        var amount        = trigger.dataset.amount;
        var status        = trigger.dataset.status;
        var date          = trigger.dataset.date;
        var accountName   = trigger.dataset.accountName;
        var accountNumber = trigger.dataset.accountNumber;
        var bankName      = trigger.dataset.bankName;
        var routingNumber = trigger.dataset.routingNumber;
        var accountType   = trigger.dataset.accountType;
        var senderName    = trigger.dataset.senderName;
        var senderAccount = trigger.dataset.senderAccount;

        modal.querySelector('#modal-ref').textContent         = ref;
        modal.querySelector('#modal-type').textContent        = type;
        modal.querySelector('#modal-description').textContent = description;
        modal.querySelector('#modal-amount').textContent      = amount;
        modal.querySelector('#modal-date').textContent        = date;

        // Direction row
        var dirRow = modal.querySelector('#modal-txn-type-row');
        if (txnType) {
            dirRow.style.display = '';
            modal.querySelector('#modal-txn-type').textContent = txnType;
        } else {
            dirRow.style.display = 'none';
        }

        // Helper to show/hide optional rows
        function setRow(rowId, textId, value) {
            var row = modal.querySelector('#' + rowId);
            if (value) {
                row.style.display = '';
                modal.querySelector('#' + textId).textContent = value;
            } else {
                row.style.display = 'none';
            }
        }

        setRow('modal-account-name-row',   'modal-account-name',   accountName);
        setRow('modal-account-number-row', 'modal-account-number', accountNumber);
        setRow('modal-bank-name-row',      'modal-bank-name',      bankName);
        setRow('modal-routing-number-row', 'modal-routing-number', routingNumber);
        setRow('modal-account-type-row',   'modal-account-type',   accountType);
        setRow('modal-sender-name-row',    'modal-sender-name',    senderName);
        setRow('modal-sender-account-row', 'modal-sender-account', senderAccount);

        // Amount colour
        var amountEl = modal.querySelector('#modal-amount');
        amountEl.className = 'fs-4 fw-bold';
        if (amount.startsWith('-')) amountEl.classList.add('text-danger');
        else if (amount.startsWith('+')) amountEl.classList.add('text-success');

        // Status badge
        var badgeEl = modal.querySelector('#modal-status-badge');
        var badgeClass = 'badge ';
        if (status === 'Successful' || status === 'Approved') badgeClass += 'badge-success';
        else if (status === 'Pending') badgeClass += 'badge-pending';
        else badgeClass += 'badge-danger';
        badgeEl.innerHTML = '<span class="' + badgeClass + '">' + status + '</span>';

        // Icon
        var iconEl = modal.querySelector('#modal-txn-icon');
        var icons = {
            'Bank Transfer':       ['bi-arrow-up-right',    'bg-primary bg-opacity-10 text-primary'],
            'Loan':                ['bi-arrow-down-left',   'bg-success bg-opacity-10 text-success'],
            'Card':                ['bi-credit-card',       'bg-dark bg-opacity-10 text-dark'],
            'Crypto Withdrawal':   ['bi-currency-bitcoin',  'bg-warning bg-opacity-10 text-warning'],
            'Paypal Withdrawal':   ['bi-paypal',            'bg-info bg-opacity-10 text-info'],
            'Skrill Withdrawal':   ['bi-wallet2',           'bg-secondary bg-opacity-10 text-secondary'],
        };
        var iconData = icons[type] || ['bi-arrow-left-right', 'bg-secondary bg-opacity-10 text-secondary'];
        iconEl.className = 'txn-icon mx-auto mb-2 ' + iconData[1];
        iconEl.style.cssText = 'width:56px;height:56px;font-size:1.5rem;display:flex;align-items:center;justify-content:center;border-radius:50%;';
        iconEl.innerHTML = '<i class="bi ' + iconData[0] + '"></i>';
    });
});
</script>
@endpush

@endsection