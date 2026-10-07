@auth
<style>
    .message-fab {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #ffc107;
        color: #856404;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        z-index: 1050;
        transition: transform 0.2s, background-color 0.2s;
        border: 2px solid #ffeeba;
    }

    .message-fab:hover {
        background-color: #e0a800;
        transform: scale(1.05);
    }

    .message-fab i {
        font-size: 28px;
    }

    /* unread badge */
    .message-fab .unread-badge {
        position: absolute;
        top: -4px;
        right: -4px;
        background: #dc3545;
        color: #fff;
        border-radius: 50%;
        font-size: 0.7rem;
        font-weight: bold;
        min-width: 20px;
        height: 20px;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 0 4px;
        border: 2px solid #fff8e1;
    }

    .message-fab .unread-badge.show {
        display: flex;
    }

    .chat-box {
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 340px;
        max-width: calc(100vw - 40px);
        background-color: #fff8e1;
        border: 2px solid #ffeeba;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
        z-index: 1060;
        overflow: hidden;
        font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    }

    .chat-box.show {
        display: flex;
    }

    .chat-header {
        background-color: #ffeeba;
        padding: 12px 16px;
        border-bottom: 2px solid #ffc107;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chat-header h6 {
        margin: 0;
        color: #856404;
        font-weight: bold;
        font-size: 1.1rem;
    }

    .chat-header .close-chat {
        background: transparent;
        border: none;
        color: #856404;
        font-size: 1.4rem;
        line-height: 1;
        cursor: pointer;
        padding: 0 6px;
        border-radius: 50%;
        transition: background 0.2s;
    }

    .chat-header .close-chat:hover {
        background-color: #ffda7a;
    }

    .chat-messages {
        flex: 1;
        max-height: 300px;
        min-height: 180px;
        overflow-y: auto;
        padding: 14px 16px;
        background-color: #fffef7;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .chat-messages::-webkit-scrollbar {
        width: 6px;
    }

    .chat-messages::-webkit-scrollbar-thumb {
        background: #ffc107;
        border-radius: 4px;
    }

    .msg {
        max-width: 85%;
        padding: 8px 14px;
        border-radius: 20px;
        word-break: break-word;
        font-size: 0.95rem;
        line-height: 1.4;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .msg.sent {
        align-self: flex-end;
        background-color: #ffc107;
        color: #3d2e00;
        border-bottom-right-radius: 5px;
    }

    .msg.received {
        align-self: flex-start;
        background-color: #f1f1f1;
        color: #1e1e1e;
        border-bottom-left-radius: 5px;
        border: 1px solid #ddd;
    }

    .msg.sending {
        opacity: 0.6;
    }

    .msg.failed {
        background-color: #f8d7da !important;
        color: #721c24 !important;
        border: 1px solid #f5c6cb;
    }

    .chat-empty {
        color: #b08b3e;
        font-style: italic;
        text-align: center;
        padding: 20px 0;
        font-size: 0.9rem;
    }

    .chat-input-area {
        background-color: #fff3cd;
        border-top: 2px solid #ffeeba;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .chat-input-area input {
        flex: 1;
        border: 1px solid #ffc107;
        border-radius: 30px;
        padding: 8px 16px;
        font-size: 0.9rem;
        background-color: #fffef7;
        color: #3d2e00;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
    }

    .chat-input-area input:focus {
        border-color: #e0a800;
        box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
    }

    .chat-input-area button {
        background-color: #ffc107;
        border: none;
        color: #856404;
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background 0.2s;
        border: 1px solid #ffeeba;
        flex-shrink: 0;
    }

    .chat-input-area button:hover {
        background-color: #e0a800;
    }

    .chat-input-area button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .chat-temp-note {
        font-size: 0.7rem;
        text-align: center;
        padding: 6px 0 4px;
        color: #b08b3e;
        background-color: #fff3cd;
        border-top: 1px dashed #ffeeba;
    }
</style>

<!-- floating message button -->
<div class="message-fab" id="messageFab" role="button" aria-label="Open chat" tabindex="0">
    <i class="fas fa-comment-dots"></i>
    <span class="unread-badge" id="unreadBadge">0</span>
</div>

<!-- chat box -->
<div class="chat-box" id="chatBox" role="dialog" aria-label="Chat with support">
    <div class="chat-header">
        <h6><i class="fas fa-comment me-1"></i> Chat with support</h6>
        <button class="close-chat" id="closeChatBtn" aria-label="Close chat" title="Close & clear history">✕</button>
    </div>
    <div class="chat-messages" id="chatMessages"></div>
    <div class="chat-temp-note">
        <i class="fas fa-trash-alt me-1"></i> History cleared on close
    </div>
    <div class="chat-input-area">
        <input type="text" id="chatInput" placeholder="Type your message..." autocomplete="off" maxlength="1000">
        <button id="sendMsgBtn" aria-label="Send message"><i class="fas fa-paper-plane"></i></button>
    </div>
</div>

<script>
    (function() {
        // ---------- DOM refs ----------
        const messageFab   = document.getElementById('messageFab');
        const unreadBadge  = document.getElementById('unreadBadge');
        const chatBox      = document.getElementById('chatBox');
        const closeChatBtn = document.getElementById('closeChatBtn');
        const chatMessages = document.getElementById('chatMessages');
        const chatInput    = document.getElementById('chatInput');
        const sendMsgBtn   = document.getElementById('sendMsgBtn');

        // ---------- Config from Blade ----------
        const CURRENT_USER_ID = String(@json(auth()->id() ?? ''));
        const SEND_URL        = @json(route('user.chat.send'));
        const CSRF_TOKEN      = @json(csrf_token());
        // ✅ FIX: ADMIN_ID was missing — now defined with fallback
        const ADMIN_ID        = String(@json($adminId ?? 1));

        // ---------- State ----------
        let unreadCount = 0;

        // ---------- Pusher (shared with notification system) ----------
        const pusher  = new Pusher('6d5c0efa3bf0828da699', { cluster: 'ap2' });
        const channel = pusher.subscribe('notify-delivery-channel');

        // ---------- Helpers ----------
        function addMessage(text, type = 'sent', options = {}) {
            if (!text || !text.trim()) return null;

            // Remove the "empty" placeholder if present
            const empty = chatMessages.querySelector('.chat-empty');
            if (empty) empty.remove();

            const msgDiv = document.createElement('div');
            msgDiv.classList.add('msg', type);
            if (options.sending) msgDiv.classList.add('sending');
            msgDiv.textContent = text;
            if (options.id) msgDiv.dataset.msgId = options.id;

            chatMessages.appendChild(msgDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            return msgDiv;
        }

        function clearChatHistory() {
            chatMessages.innerHTML = '';
            const emptyDiv = document.createElement('div');
            emptyDiv.classList.add('chat-empty');
            emptyDiv.innerHTML = '<i class="fas fa-comment-slash me-1"></i> No messages yet. Start chatting!';
            chatMessages.appendChild(emptyDiv);
        }

        function setUnread(n) {
            unreadCount = Math.max(0, n);
            if (unreadCount > 0) {
                unreadBadge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                unreadBadge.classList.add('show');
            } else {
                unreadBadge.classList.remove('show');
            }
        }

        function incrementUnread() { setUnread(unreadCount + 1); }
        function resetUnread()     { setUnread(0); }

        function isChatOpen() {
            return chatBox.classList.contains('show');
        }

        // ---------- Toggle chat box ----------
        function toggleChatBox() {
            if (isChatOpen()) {
                // Closing → clear history + reset unread
                clearChatHistory();
                resetUnread();
                chatBox.classList.remove('show');
            } else {
                // Opening → focus input & reset unread
                if (!chatMessages.querySelector('.msg')) {
                    clearChatHistory();
                }
                chatBox.classList.add('show');
                resetUnread();
                chatInput.focus();
            }
        }

        // ---------- Send message (real backend) ----------
        function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            // Optimistic UI — show as "sending"
            const tempId = 'tmp-' + Date.now();
            const msgEl  = addMessage(text, 'sent', { sending: true, id: tempId });

            // Reset input
            chatInput.value = '';
            chatInput.focus();
            sendMsgBtn.disabled = true;

            // POST to backend
            fetch(SEND_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    message: text,
                    receiver_id: ADMIN_ID
                })
            })
            .then(async (res) => {
                const data = await res.json().catch(() => ({}));
                if (!res.ok) throw new Error(data.error || data.message || 'Failed to send');
                return data;
            })
            .then((data) => {
                if (msgEl) {
                    msgEl.classList.remove('sending');
                    if (data && data.created_at) {
                        msgEl.title = 'Sent at ' + data.created_at;
                    }
                }
            })
            .catch((err) => {
                console.error('Chat send error:', err);
                if (msgEl) {
                    msgEl.classList.remove('sending');
                    msgEl.classList.add('failed');
                    msgEl.title = 'Failed to send. Click to retry.';
                    msgEl.style.cursor = 'pointer';
                    msgEl.addEventListener('click', function retry() {
                        msgEl.removeEventListener('click', retry);
                        msgEl.remove();
                        chatInput.value = text;
                        sendMessage();
                    });
                }
                if (typeof toastr !== 'undefined') {
                    toastr.error('Message could not be sent. Please try again.', 'Chat');
                }
            })
            .finally(() => {
                sendMsgBtn.disabled = false;
            });
        }

        // ---------- Event listeners ----------
        messageFab.addEventListener('click', toggleChatBox);

        closeChatBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            clearChatHistory();
            resetUnread();
            chatBox.classList.remove('show');
        });

        sendMsgBtn.addEventListener('click', sendMessage);

        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                sendMessage();
            }
        });

        // ---------- Incoming Pusher events ----------
        channel.bind('notify-delivery-event', function(data) {
            // ============================================================
            // CHAT MESSAGE (status === 100)
            // ============================================================
            if (data.status === 100) {
                const senderId   = String(data.sender_id);
                const receiverId = String(data.receiver_id);

                // Ignore our own sent messages (echo)
                if (senderId === CURRENT_USER_ID) return;

                // Only handle messages addressed to this user
                if (receiverId !== CURRENT_USER_ID) return;

                // Play sound if available (defined in your master file)
                if (typeof playNotificationSound === 'function') {
                    playNotificationSound();
                }

                if (isChatOpen()) {
                    addMessage(data.message, 'received');
                } else {
                    incrementUnread();
                    if (typeof toastr !== 'undefined') {
                        toastr.info(data.message, 'New chat message');
                    }
                }
                return;
            }

            // ============================================================
            // EXISTING NOTIFICATION LOGIC — untouched
            // ============================================================
            const dataUserId = String(data.user_id);

            if (dataUserId === CURRENT_USER_ID) {
                if (data.message === 'orderReceived') {
                    // ... your existing handling
                } else if (data.message === 'fileDeleted') {
                    // ... your existing handling
                } else if (data.status === 10) {
                    // ... your existing handling
                } else {
                    // ... your existing handling
                }
            } else if (dataUserId === '0') {
                // ... admin broadcast handling
            } else {
                console.log('Notification for a different user.');
            }
        });

        // ---------- Init ----------
        clearChatHistory();
        setUnread(0);
    })();
</script>
@endauth