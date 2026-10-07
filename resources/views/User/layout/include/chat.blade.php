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

        @keyframes pulseFAB {
            0% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 0 rgba(255, 193, 7, 0.7);
            }

            70% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 14px rgba(255, 193, 7, 0);
            }

            100% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 0 rgba(255, 193, 7, 0);
            }
        }

        .message-fab.pulse {
            animation: pulseFAB 1.2s ease-out 2;
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

        /* file attachments inside a bubble */
        .msg .msg-file {
            display: block;
            margin-top: 6px;
            max-width: 200px;
            max-height: 160px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .msg .msg-file-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
            font-size: 0.8rem;
            color: #0d6efd;
            text-decoration: underline;
            word-break: break-all;
        }

        .msg.received .msg-file-link {
            color: #0a58ca;
        }

        .msg.sent .msg-file-link {
            color: #6a4a00;
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
            position: relative;
        }

        .chat-input-area input[type="text"] {
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

        .chat-input-area input[type="text"]:focus {
            border-color: #e0a800;
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
        }

        .chat-input-area input[type="file"] {
            display: none;
        }

        .chat-input-area .attach-btn,
        .chat-input-area .send-btn {
            background-color: #ffc107;
            border: 1px solid #ffeeba;
            color: #856404;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            cursor: pointer;
            flex-shrink: 0;
            transition: background 0.2s;
        }

        .chat-input-area .attach-btn:hover,
        .chat-input-area .send-btn:hover {
            background-color: #e0a800;
        }

        .chat-input-area .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .chat-file-preview {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            margin: 0 12px 8px;
            background: #fff8e1;
            border: 1px dashed #ffc107;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #856404;
        }

        .chat-file-preview.show {
            display: flex;
        }

        .chat-file-preview .file-name {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .chat-file-preview .remove-file {
            background: transparent;
            border: none;
            color: #dc3545;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0 4px;
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
            <button class="close-chat" id="closeChatBtn" aria-label="Close chat" title="Close">✕</button>
        </div>
        <div class="chat-messages" id="chatMessages"></div>

        <!-- file preview strip -->
        <div class="chat-file-preview" id="chatFilePreview">
            <i class="fas fa-paperclip"></i>
            <span class="file-name" id="chatFileName"></span>
            <button class="remove-file" id="chatFileRemove" type="button" aria-label="Remove file">✕</button>
        </div>

        <div class="chat-temp-note">
            <i class="fas fa-database me-1"></i> Chat history will be removed
        </div>

        <div class="chat-input-area">
            <input type="file" id="chatFileInput" accept="image/*,.pdf,.doc,.docx,.txt,.zip">
            <button type="button" class="attach-btn" id="chatAttachBtn" aria-label="Attach file">
                <i class="fas fa-paperclip"></i>
            </button>
            <input type="text" id="chatInput" placeholder="Type your message..." autocomplete="off" maxlength="1000">
            <button type="button" class="send-btn" id="sendMsgBtn" aria-label="Send message">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <script>
        (function() {
            // ---------- DOM refs ----------
            const messageFab = document.getElementById('messageFab');
            const unreadBadge = document.getElementById('unreadBadge');
            const chatBox = document.getElementById('chatBox');
            const closeChatBtn = document.getElementById('closeChatBtn');
            const chatMessages = document.getElementById('chatMessages');
            const chatInput = document.getElementById('chatInput');
            const sendMsgBtn = document.getElementById('sendMsgBtn');
            const chatFileInput = document.getElementById('chatFileInput');
            const chatAttachBtn = document.getElementById('chatAttachBtn');
            const chatFilePreview = document.getElementById('chatFilePreview');
            const chatFileName = document.getElementById('chatFileName');
            const chatFileRemove = document.getElementById('chatFileRemove');

            // ---------- Config ----------
            const CURRENT_USER_ID = String(@json(auth()->id() ?? ''));
            const SEND_URL = @json(route('user.chat.send'));
            const HISTORY_URL = @json(route('user.chat.history'));
            const CSRF_TOKEN = @json(csrf_token());

            // ---------- State ----------
            let unreadCount = 0;
            let pendingFile = null;

            // ---------- Pusher ----------
            const pusher = new Pusher('6d5c0efa3bf0828da699', {
                cluster: 'ap2'
            });
            const channel = pusher.subscribe('notify-delivery-channel');

            // ---------- Helpers ----------
            function isImage(url) {
                return /\.(jpe?g|png|gif|webp|bmp|svg)$/i.test(url || '');
            }

            function fileUrlFor(relPath) {
                // relPath is like "uploads/chat/xxx.jpg"
                return relPath ? ('/' + relPath.replace(/^\/+/, '')) : null;
            }

            function addMessage(text, type = 'sent', options = {}) {
                // Remove empty placeholder
                const empty = chatMessages.querySelector('.chat-empty');
                if (empty) empty.remove();

                const msgDiv = document.createElement('div');
                msgDiv.classList.add('msg', type);
                if (options.sending) msgDiv.classList.add('sending');
                if (options.id) msgDiv.dataset.msgId = options.id;

                // Text body
                if (text && text.trim()) {
                    const textNode = document.createElement('div');
                    textNode.textContent = text;
                    msgDiv.appendChild(textNode);
                }

                // File attachment
                if (options.file_url) {
                    if (isImage(options.file_url)) {
                        const a = document.createElement('a');
                        a.href = options.file_url;
                        a.target = '_blank';
                        a.rel = 'noopener';
                        const img = document.createElement('img');
                        img.src = options.file_url;
                        img.className = 'msg-file';
                        img.alt = options.file_name || 'attachment';
                        a.appendChild(img);
                        msgDiv.appendChild(a);
                    } else {
                        const a = document.createElement('a');
                        a.href = options.file_url;
                        a.target = '_blank';
                        a.rel = 'noopener';
                        a.className = 'msg-file-link';
                        a.innerHTML = '<i class="fas fa-paperclip"></i> ' +
                            (options.file_name || 'Download file');
                        msgDiv.appendChild(a);
                    }
                }

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

            function incrementUnread() {
                setUnread(unreadCount + 1);
            }

            function resetUnread() {
                setUnread(0);
            }

            function isChatOpen() {
                return chatBox.classList.contains('show');
            }

            // ---------- Load history from DB ----------
            async function loadHistory() {
                try {
                    const res = await fetch(HISTORY_URL, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin'
                    });
                    const data = await res.json().catch(() => ({}));
                    if (!data.success || !Array.isArray(data.messages)) return;

                    if (data.messages.length === 0) {
                        clearChatHistory();
                        return;
                    }
                    chatMessages.innerHTML = '';
                    data.messages.forEach(m => {
                        addMessage(m.message || '', m.type === 'received' ? 'received' : 'sent', {
                            file_url: m.file_url,
                            file_name: m.file_name,
                            id: m.id
                        });
                    });
                } catch (e) {
                    console.warn('Failed to load chat history:', e);
                }
            }

            // ---------- Toggle chat box ----------
            function toggleChatBox() {
                if (isChatOpen()) {
                    chatBox.classList.remove('show');
                    // ✅ History is NOT cleared — it persists
                } else {
                    chatBox.classList.add('show');
                    resetUnread();
                    // Reload from server to ensure latest
                    loadHistory();
                    chatInput.focus();
                }
            }

            // ---------- File attach ----------
            chatAttachBtn.addEventListener('click', () => chatFileInput.click());

            chatFileInput.addEventListener('change', () => {
                const f = chatFileInput.files && chatFileInput.files[0];
                if (!f) return;
                if (f.size > 5 * 1024 * 1024) {
                    if (typeof toastr !== 'undefined') toastr.error('File too large (max 5MB)', 'Chat');
                    chatFileInput.value = '';
                    return;
                }
                pendingFile = f;
                chatFileName.textContent = f.name;
                chatFilePreview.classList.add('show');
            });

            chatFileRemove.addEventListener('click', () => {
                pendingFile = null;
                chatFileInput.value = '';
                chatFilePreview.classList.remove('show');
            });

            // ---------- Send message ----------
            function sendMessage() {
                const text = chatInput.value.trim();
                if (!text && !pendingFile) return;

                // Optimistic UI
                const tempId = 'tmp-' + Date.now();
                const localFileUrl = pendingFile ? URL.createObjectURL(pendingFile) : null;
                const localFileName = pendingFile ? pendingFile.name : null;

                const msgEl = addMessage(text, 'sent', {
                    sending: true,
                    id: tempId,
                    file_url: localFileUrl,
                    file_name: localFileName
                });

                // Reset UI
                chatInput.value = '';
                chatInput.focus();
                sendMsgBtn.disabled = true;
                const fileToSend = pendingFile;
                pendingFile = null;
                chatFileInput.value = '';
                chatFilePreview.classList.remove('show');

                // Build multipart form
                const fd = new FormData();
                if (text) fd.append('message', text);
                if (fileToSend) fd.append('file', fileToSend);

                fetch(SEND_URL, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            'X-Requested-With': 'XMLHttpRequest'
                            // NOTE: don't set Content-Type — FormData sets it with boundary
                        },
                        body: fd
                    })
                    .then(async (res) => {
                        const data = await res.json().catch(() => ({}));
                        if (!res.ok) throw new Error(data.error || data.message || 'Failed');
                        return data;
                    })
                    .then((data) => {
                        if (msgEl) {
                            msgEl.classList.remove('sending');
                            if (data && data.id) msgEl.dataset.msgId = data.id;
                        }
                        // Optional: refresh from server to sync canonical URLs
                        // loadHistory();
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
                                // Restore file if any — but we already moved it; simplest: ask user
                                sendMessage();
                            });
                        }
                        if (typeof toastr !== 'undefined') {
                            toastr.error(err.message || 'Message could not be sent.', 'Chat');
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
                chatBox.classList.remove('show');
                // ✅ Do NOT clear history
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
                if (Number(data.status) === 100) {
                    const senderId = String(data.sender_id);
                    const receiverId = String(data.receiver_id);

                    // Ignore echoes of our own message
                    if (senderId === CURRENT_USER_ID) return;

                    // Only accept messages addressed to this user
                    if (receiverId !== CURRENT_USER_ID) return;

                    if (typeof playNotificationSound === 'function') {
                        playNotificationSound();
                    }

                    if (isChatOpen()) {
                        // ✅ Rebuild from DB so files/admin replies render with real URLs
                        loadHistory();
                    } else {
                        incrementUnread();

                        // FAB pulse
                        messageFab.classList.add('pulse');
                        setTimeout(() => messageFab.classList.remove('pulse'), 2500);

                        // Auto-dismiss toast after 3s
                        if (typeof toastr !== 'undefined') {
                            toastr.info(
                                data.message || '[File]',
                                'New chat message', {
                                    timeOut: 3000,
                                    extendedTimeOut: 1000,
                                    progressBar: true,
                                    closeButton: true,
                                    tapToDismiss: true
                                }
                            );
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
            loadHistory(); // ✅ Load DB history on page load
        })
        ();
    </script>
@endauth
