<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            console.error("Audio element not found.");
        }
    }

    // Ensure the user ID is safely passed to the frontend
    const userId = {{ json_encode(auth()->user()->id ?? null) }};
    if (!userId) {
        console.error("User ID is undefined. Please ensure the user is authenticated.");
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
        timeOut: 0, // Notification stays visible
        extendedTimeOut: 0, // No auto-hide on hover
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };

    // Enable Pusher logging (useful for debugging; disable in production)
    Pusher.logToConsole = true;

    // Initialize Pusher
    const pusher = new Pusher('6d5c0efa3bf0828da699', {
        cluster: 'ap2'
    });

    // Subscribe to the delivery notification channel
    const channel = pusher.subscribe('notify-delivery-channel');

    // Bind to the notification event
    channel.bind('notify-delivery-event', function(data) {
        if (data.user_id === userId) {
            playNotificationSound(); // Play the notification sound
            toastr.success(data.message, 'Notification'); // Display the notification
        } else {
            console.log("Notification received for a different user.");
        }
    });
</script>
