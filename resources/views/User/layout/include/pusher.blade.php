<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    /* Custom yellow theme for the modal */
    .custom-modal-yellow {
        background-color: #fff3cd;
        /* Light yellow background */
        border: 2px solid #ffeeba;
        /* Yellow border */
        border-radius: 10px;
        /* Rounded corners */
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        /* Add shadow */
    }

    /* Modal header styling */
    .custom-modal-header {
        background-color: #ffeeba;
        /* Yellow header background */
        border-bottom: 2px solid #ffc107;
        /* Darker yellow border */
        border-radius: 10px 10px 0 0;
        /* Rounded top corners */
        padding: 1rem;
        /* Add padding */
    }

    /* Modal title styling */
    .custom-modal-title {
        color: #856404;
        /* Dark yellow text color */
        font-size: 1.5rem;
        /* Larger title */
        font-weight: bold;
        /* Bold title */
    }

    /* Close button styling */
    .custom-close-btn {
        background-color: transparent;
        /* Remove default background */
        border: none;
        /* Remove border */
        opacity: 0.8;
        /* Slightly transparent */
        color: #856404;
        /* Dark yellow text color */
    }

    .custom-close-btn:hover {
        opacity: 1;
        /* Fully opaque on hover */
    }

    /* Textarea styling */
    .custom-textarea {
        background-color: #fff8e1;
        /* Light yellow background */
        border: 1px solid #ffeeba;
        /* Yellow border */
        border-radius: 5px;
        /* Rounded corners */
        color: #856404;
        /* Dark yellow text color */
        resize: vertical;
        /* Allow vertical resizing */
    }

    .custom-textarea:focus {
        border-color: #ffc107;
        /* Darker yellow border on focus */
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        /* Yellow shadow on focus */
    }

    /* Reply button styling */
    .custom-reply-btn {
        background-color: #ffc107;
        /* Yellow button */
        border: none;
        /* Remove border */
        color: #856404;
        /* Dark yellow text color */
        padding: 0.5rem 1.5rem;
        /* Add padding */
        border-radius: 5px;
        /* Rounded corners */
        font-weight: bold;
        /* Bold text */
    }

    .custom-reply-btn:hover {
        background-color: #e0a800;
        /* Darker yellow on hover */
        color: #856404;
        /* Dark yellow text color */
    }
</style>
@php
    $now = \Carbon\Carbon::now();
    $replyIsEmpty = \App\Models\PopupMessage::where('user_id', auth()->user()->id)
        ->where('reply', null)
        ->latest()
        ->first();
    $popupNotice = \App\Models\PopupNotice::where('end_time', '>=', $now)
        ->whereDoesntHave('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })
        ->latest()
        ->first();
@endphp

<audio id="notificationAudio" src="{{ asset('notification_sound/notification-sound.wav') }}"></audio>
<!-- Bootstrap Modal -->
<div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered"> <!-- Center the modal -->
        <div class="modal-content custom-modal-yellow"> <!-- Add custom class for yellow theme -->
            <!-- Modal Header with Close Button -->
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title" id="customModalLabel">Attention!!!</h5>
                {{-- <button type="button" class="btn-close custom-close-btn" data-bs-dismiss="modal"
                    aria-label="Close"></button> --}}
            </div>
            <!-- Modal Body -->
            <div class="modal-body text-center p-4"> <!-- Center content and add padding -->
                <!-- Icon -->
                <div class="mb-4">
                    <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                    <!-- Example: Font Awesome warning icon -->
                </div>
                <!-- Message -->
                <p id="modalMessage" class="mb-5 text-dark"></p> <!-- Dark text color -->

                <!-- Reply Form -->
                <form id="replyForm" class="mt-3" action="{{ route('popup-message.update', auth()->user()->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea id="replyField" name="reply" class="form-control custom-textarea" rows="2"
                            placeholder="Type your reply here..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary custom-reply-btn">Send Reply</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Modal Notice -->
<div class="modal fade" id="customModalNotice" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered"> <!-- Center the modal -->
        <div class="modal-content custom-modal-notice"> <!-- Add custom class for yellow theme -->
            <!-- Modal Header with Close Button -->
            <div class="modal-header notice-modal-header bg-success">
                <h3 class="modal-title" id="customModalLabel">Important Notice!!!</h3>
                {{-- <button type="button" class="btn-close custom-close-btn" data-bs-dismiss="modal"
                    aria-label="Close"></button> --}}
            </div>
            <!-- Modal Body -->
            <div class="modal-body text-center p-4"> <!-- Center content and add padding -->
                <!-- Icon -->
                <div class="mb-4">
                    <i class="fas fa-info-circle fa-4x text-info p-3 rounded-pill"></i>
                    <!-- Example: Font Awesome warning icon -->
                </div>
                <!-- Message -->
                <p id="modalNotice" class="mb-5 text-dark"></p> <!-- Dark text color -->

                <!-- Reply Form -->
                <form id="noticeForm" class="mt-3" action="{{ route('popup-notice.update', auth()->user()->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" id="modalStatus" value="">
                    <button type="submit" class="btn btn-success">OK</button>
                </form>
            </div>
        </div>
    </div>
</div>
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

            } else if (data.status === 10) {
                // Play notification sound
                playNotificationSound();
                // Set the modal content
                document.getElementById('modalMessage').textContent = data.message;

                // Open the Bootstrap modal
                const modal = new bootstrap.Modal(document.getElementById('customModal'));
                modal.show();
            } else {
                // Play notification sound
                playNotificationSound();
                toastr.success(data.message, 'Notification');
            }
        } else if (data.user_id === 0) {
            // Play notification sound
            playNotificationSound();
            // Set the modal content
            document.getElementById('modalNotice').textContent = data.message;
            document.getElementById('modalStatus').value = data.status;

            // Open the Bootstrap modal
            const modal = new bootstrap.Modal(document.getElementById('customModalNotice'));
            modal.show();
        } else {
            console.log("Notification received for a different user.");
        }
    });
</script>
@if (isset($replyIsEmpty))
    <script>
        // Function to play notification sound
        function playNotificationSound() {
            const audio = new Audio('path/to/notification-sound.mp3'); // Replace with your sound file path
            audio.play();
        }

        // Wait for the page to load
        document.addEventListener('DOMContentLoaded', function() {
            // Play notification sound
            playNotificationSound();

            // Set the modal content
            document.getElementById('modalMessage').textContent = "{{ $replyIsEmpty->message }}";

            // Open the Bootstrap modal
            const modal = new bootstrap.Modal(document.getElementById('customModal'));
            modal.show();
        });
    </script>
@endif
@if (isset($popupNotice))
    <script>
        // Function to play notification sound
        function playNotificationSound() {
            const audio = new Audio('path/to/notification-sound.mp3'); // Replace with your sound file path
            audio.play();
        }

        // Wait for the page to load
        document.addEventListener('DOMContentLoaded', function() {
            // Play notification sound
            playNotificationSound();

            // Set the modal content
            document.getElementById('modalNotice').innerHTML = `{!! $popupNotice->message !!}`;
            document.getElementById('modalStatus').value = "{{ $popupNotice->status }}";


            // Open the Bootstrap modal
            const modal = new bootstrap.Modal(document.getElementById('customModalNotice'));
            modal.show();
        });
    </script>
@endif
<script>
    $(document).ready(function() {
        $("#noticeForm").on("submit", function(e) {
            e.preventDefault(); // Prevent page reload

            var formData = $(this).serialize(); // Serialize form data

            $.ajax({
                url: $(this).attr("action"), // Form action URL
                type: "POST", // HTTP method
                data: formData, // Data to be sent
                success: function(response) {
                    // Success message (You can replace this with a notification)
                    // alert("Form submitted successfully!");

                    // Close the modal
                    $("#customModalNotice").modal("hide");
                },
                error: function(xhr) {
                    // alert("Error: " + xhr.responseText);
                }
            });
        });
    });
</script>

