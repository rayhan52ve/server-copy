<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

@php
    $pendingRecharge = \App\Models\Recharge::where('status', 0)->latest()->first();
@endphp


<audio id="notificationAudio" src="{{ asset('notification_sound/notification-sound.wav') }}"></audio>

<script>
    // Function to play notification sound
    function playNotificationSound() {
        const audio = document.getElementById("notificationAudio");
        if (audio) {
            audio.currentTime = 0; // Reset the audio to the beginning
            audio.play().catch(error => {
                console.error("Audio playback failed:", error);
            });
        } else {
            console.error("Notification audio element not found.");
        }
    }

    // Toastr configuration
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: true,
        onclick: null,
        showDuration: 300,
        hideDuration: 1000,
        timeOut: 0, // Prevent auto-hiding
        extendedTimeOut: 0, // Prevent auto-hiding
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        onHidden: function() {
            // Remove the displayed notification from localStorage
            const notifications = JSON.parse(localStorage.getItem("pendingNotifications")) || [];
            if (notifications.length > 0) {
                notifications.shift(); // Remove the first notification
                localStorage.setItem("pendingNotifications", JSON.stringify(notifications));
            }
        }
    };

    // Function to display all stored notifications
    function displayStoredNotifications() {
        const storedNotifications = JSON.parse(localStorage.getItem("pendingNotifications")) || [];
        storedNotifications.forEach(notification => {
            if (notification.status === 15) {
                toastr.warning(notification.message, "Reply from " + notification.user_name);
            } else {
                toastr.success(notification.message, "Notification");
            }
        });
    }


    // Function to show recharge modal with data
    function showRechargeModal(user_name, payment_number, amount, transactionId) {
        if (user_name) {
            document.getElementById('modalUserName').textContent = user_name;
        }
        if (payment_number) {
            document.getElementById('modalPaymentNumber').textContent = payment_number;
        }
        if (amount) {
            document.getElementById('modalAmount').value = amount;
        }
        if (transactionId) {
            document.getElementById('modalTrxId').value = transactionId;
        }
        const modal = new bootstrap.Modal(document.getElementById('popRechargeModal'));
        modal.show();
    }

    // Check for stored notifications when the page loads
    window.onload = function() {
        displayStoredNotifications();
    };

    // Enable Pusher logging for debugging (disable in production)
    Pusher.logToConsole = true;

    // Initialize Pusher
    const pusher = new Pusher("6d5c0efa3bf0828da699", {
        cluster: "ap2"
    });

    // Subscribe to the notification channel
    const channel = pusher.subscribe("notify-order-channel");

    // Bind to the notify-order event
    channel.bind("notify-order", function(data) {
        if (data && data.message) {
            if (data.status === 15) {
                // Store the notification data in localStorage
                // Retrieve existing notifications or initialize an empty array
                const notifications = JSON.parse(localStorage.getItem("pendingNotifications")) || [];

                // Add the new notification to the array
                notifications.push(data);

                // Save the updated array back to localStorage
                localStorage.setItem("pendingNotifications", JSON.stringify(notifications));
                playNotificationSound(); // Play notification sound
                toastr.warning(data.message, "Reply from" + " " + data.user_name); // Display notification
            } else if (data.status === 22) {
                playNotificationSound(); // Play notification sound
                toastr.info(data.message, "Notification"); // Display notification
            } else if (data.status === 99) {
                playNotificationSound(); // Play notification sound
                toastr.success(data.message, "Recharge Notification"); // Display toast notification

                showRechargeModal(data.user_name, data.payment_number, data.amount, data.transaction_id);
            } else {
                playNotificationSound(); // Play notification sound
                toastr.success(data.message, "Notification"); // Display notification
            }
        } else {
            console.error("Invalid data received:", data);
        }
    });
</script>

@if (isset($pendingRecharge))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showRechargeModal(
                @json($pendingRecharge->user?->email),
                @json($pendingRecharge->payment_number),
                @json($pendingRecharge->amount),
                @json($pendingRecharge->transaction_id)
            );
        });
    </script>
@endif

<!-- Modal -->
<div class="modal fade" id="popRechargeModal" tabindex="-1" aria-labelledby="popRechargeModalLabel"
    data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title" id="popRechargeModalLabel">Save Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="my-4">
                    <strong>Email: <span id="modalUserName"></span></strong><br>
                    <strong>Payment Number: <span id="modalPaymentNumber"></span></strong>
                </div>
                <form id="rechargeForm" action="{{ route('admin.quick-transaction.store') }}" method="post">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control form-control-sm" name="amount" id="modalAmount"
                            placeholder="Enter amount">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Transaction ID</label>
                        <input type="text" class="form-control form-control-sm" name="trx_id" id="modalTrxId"
                            readonly placeholder="Enter TRX ID">
                    </div>
                    <div class="d-flex gap-2 p-2">
                        <button type="submit" name="status" value="1"
                            class="btn btn-success flex-fill">Accept</button>
                        <button type="submit" name="status" value="2"
                            class="btn btn-danger flex-fill">Decline</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
