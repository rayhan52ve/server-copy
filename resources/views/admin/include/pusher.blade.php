<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>


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
            } else {
                playNotificationSound(); // Play notification sound
                toastr.success(data.message, "Notification"); // Display notification
            }
        } else {
            console.error("Invalid data received:", data);
        }
    });
</script>
