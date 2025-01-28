<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    // Pusher.logToConsole = true;

    // Initialize Pusher
    const pusher = new Pusher('6d5c0efa3bf0828da699', {
        cluster: 'ap2'
    });

    // Subscribe to the delivery notification channel
    const channel = pusher.subscribe('notify-delivery-channel');

    // Bind to the notification event
    channel.bind('notify-delivery-event', function(data) {
        if (data.user_id === userId) {


            // Check the message type and display appropriate Toastr notification
            if (data.message === 'orderReceived') {
                // Play notification sound
                playNotificationSound();
                Swal.fire({
                    title: "Order Received",
                    text: "অ্যাডমিন আপনার অর্ডারটি গ্রহণ করেছেন। অনুগ্রহ করে কিছুক্ষণ অপেক্ষা করুন এবং নোটিফিকেশন পাওয়ার পর পেজ রিলোড করুন।",
                    icon: "info",
                    showCloseButton: true, // Adds a close button in the top-right corner
                    backdrop: true, // Adds a backdrop behind the modal
                    allowOutsideClick: true, // Prevent closing the modal by clicking outside
                    allowEscapeKey: false, // Prevent closing the modal with the Escape key
                    customClass: {
                        popup: "custom-swal-popup", // Custom CSS class for styling
                        title: "custom-swal-title", // Custom CSS class for the title
                        content: "custom-swal-content", // Custom CSS class for the content
                        footer: "custom-swal-footer", // Custom CSS class for the footer
                    },
                    showClass: {
                        popup: "animate__animated animate__fadeInUp animate__faster"
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutDown animate__faster"
                    }
                });

            } else {
                // Play notification sound
                playNotificationSound();
                toastr.success(data.message, 'Notification');
            }
        } else {
            console.log("Notification received for a different user.");
        }
    });
</script>
