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
        hideMethod: "fadeOut"
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
            playNotificationSound(); // Play notification sound
            toastr.success(data.message, "Notification"); // Display notification
        } else {
            console.error("Invalid data received:", data);
        }
    });
</script>

