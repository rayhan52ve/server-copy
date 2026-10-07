@auth
    <!-- ============================================================
         ADMIN CHAT INBOX
         ============================================================ -->
    <div class="admin-chat-fab" id="adminChatFab" role="button" aria-label="Open live chats" tabindex="0">
        <i class="fas fa-headset"></i>
        <span class="admin-unread-badge" id="adminUnreadBadge">0</span>
    </div>

    <div class="admin-chat-panel" id="adminChatPanel" role="dialog" aria-label="Live Chats">
        <div class="admin-chat-header">
            <h6><i class="fas fa-headset me-1"></i> Live Chats</h6>
            <button class="close-admin-chat" id="adminCloseChatBtn" aria-label="Close">✕</button>
        </div>

        <div class="admin-chat-body" id="adminChatBody">
            <div class="admin-users-list" id="adminUsersList">
                <div class="admin-empty-hint">
                    <i class="fas fa-inbox me-1"></i> No active chats
                </div>
            </div>

            <div class="admin-conversation" id="adminConversation">
                <div class="admin-conv-empty">
                    <i class="fas fa-comments me-1"></i> Select a user to view chat
                </div>
            </div>
        </div>
    </div>

    <style>
        /* ============================================================
           DESKTOP (default)
           ============================================================ */
        .admin-chat-fab {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #0d6efd;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            z-index: 1050;
            transition: transform 0.2s, background-color 0.2s;
            border: 2px solid #cfe2ff;
        }

        .admin-chat-fab:hover {
            background-color: #0b5ed7;
            transform: scale(1.05);
        }

        .admin-chat-fab i {
            font-size: 26px;
        }

        @keyframes adminPulse {
            0% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 0 rgba(13, 110, 253, 0.7);
            }

            70% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 14px rgba(13, 110, 253, 0);
            }

            100% {
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3), 0 0 0 0 rgba(13, 110, 253, 0);
            }
        }

        .admin-chat-fab.pulse {
            animation: adminPulse 1.2s ease-out 2;
        }

        .admin-unread-badge {
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
            border: 2px solid #fff;
        }

        .admin-unread-badge.show {
            display: flex;
        }

        .admin-chat-panel {
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 720px;
            max-width: calc(100vw - 40px);
            height: 480px;
            max-height: calc(100vh - 140px);
            background: #fff;
            border: 2px solid #cfe2ff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            display: none;
            flex-direction: column;
            z-index: 1060;
            overflow: hidden;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
        }

        .admin-chat-panel.show {
            display: flex;
        }

        .admin-chat-header {
            background: #cfe2ff;
            padding: 12px 16px;
            border-bottom: 2px solid #0d6efd;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .admin-chat-header h6 {
            margin: 0;
            color: #052c65;
            font-weight: bold;
            font-size: 1.05rem;
        }

        .close-admin-chat {
            background: transparent;
            border: none;
            color: #052c65;
            font-size: 1.4rem;
            line-height: 1;
            cursor: pointer;
            padding: 0 6px;
            border-radius: 50%;
        }

        .close-admin-chat:hover {
            background: #a9c9ff;
        }

        .admin-chat-body {
            flex: 1;
            display: flex;
            overflow: hidden;
            min-height: 0;
        }

        /* Left: users list */
        .admin-users-list {
            width: 220px;
            border-right: 1px solid #e9ecef;
            overflow-y: auto;
            background: #f8f9fa;
            flex-shrink: 0;
        }

        .admin-user-item {
            padding: 10px 12px;
            border-bottom: 1px solid #e9ecef;
            cursor: pointer;
            transition: background 0.15s;
            position: relative;
        }

        .admin-user-item:hover {
            background: #e9ecef;
        }

        .admin-user-item.active {
            background: #cfe2ff;
        }

        .admin-user-item .u-email {
            font-size: 0.8rem;
            font-weight: 600;
            color: #212529;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-right: 24px;
        }

        .admin-user-item .u-preview {
            font-size: 0.75rem;
            color: #6c757d;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-top: 2px;
            padding-right: 24px;
        }

        .admin-user-item .u-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background: #dc3545;
            color: #fff;
            border-radius: 50%;
            min-width: 18px;
            height: 18px;
            font-size: 0.65rem;
            font-weight: bold;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
        }

        .admin-user-item .u-badge.show {
            display: flex;
        }

        .admin-empty-hint {
            padding: 20px 12px;
            color: #adb5bd;
            font-style: italic;
            font-size: 0.85rem;
            text-align: center;
        }

        /* Right: conversation */
        .admin-conversation {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fff;
            min-width: 0;
            min-height: 0;
        }

        .admin-conv-empty {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            font-style: italic;
            font-size: 0.9rem;
            padding: 16px;
            text-align: center;
        }

        .admin-conv-messages {
            flex: 1;
            overflow-y: auto;
            padding: 12px 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            background: #f8f9fa;
            min-height: 0;
        }

        .admin-msg {
            max-width: 75%;
            padding: 8px 12px;
            border-radius: 16px;
            font-size: 0.9rem;
            line-height: 1.4;
            word-break: break-word;
        }

        .admin-msg.from-user {
            align-self: flex-start;
            background: #fff;
            border: 1px solid #dee2e6;
            border-bottom-left-radius: 4px;
            color: #212529;
        }

        .admin-msg.from-admin {
            align-self: flex-end;
            background: #0d6efd;
            color: #fff;
            border-bottom-right-radius: 4px;
        }

        .admin-msg.sending {
            opacity: 0.6;
        }

        .admin-msg.failed {
            background: #f8d7da !important;
            color: #721c24 !important;
            border: 1px solid #f5c6cb;
            cursor: pointer;
        }

        /* file attachments */
        .admin-msg .msg-file {
            display: block;
            margin-top: 6px;
            max-width: 200px;
            max-height: 160px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .admin-msg .msg-file-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            margin-top: 4px;
            font-size: 0.8rem;
            text-decoration: underline;
            word-break: break-all;
        }

        .admin-msg.from-user .msg-file-link {
            color: #0a58ca;
        }

        .admin-msg.from-admin .msg-file-link {
            color: #cfe2ff;
        }

        .admin-conv-input {
            display: flex;
            gap: 8px;
            padding: 10px 12px;
            border-top: 1px solid #e9ecef;
            background: #fff;
            align-items: center;
            flex-shrink: 0;
        }

        .admin-conv-input input[type="text"] {
            flex: 1;
            min-width: 0;
            border: 1px solid #ced4da;
            border-radius: 24px;
            padding: 8px 16px;
            font-size: 0.9rem;
            outline: none;
        }

        .admin-conv-input input[type="text"]:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        .admin-conv-input input[type="file"] {
            display: none;
        }

        .admin-conv-input .attach-btn,
        .admin-conv-input .send-btn {
            background: #0d6efd;
            border: none;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            cursor: pointer;
            flex-shrink: 0;
        }

        .admin-conv-input .attach-btn {
            background: #6c757d;
        }

        .admin-conv-input .attach-btn:hover {
            background: #5a6268;
        }

        .admin-conv-input .send-btn:hover {
            background: #0b5ed7;
        }

        .admin-conv-input .send-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .admin-file-preview {
            display: none;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            margin: 0 12px 6px;
            background: #f8f9fa;
            border: 1px dashed #0d6efd;
            border-radius: 8px;
            font-size: 0.8rem;
            color: #0a58ca;
            flex-shrink: 0;
        }

        .admin-file-preview.show {
            display: flex;
        }

        .admin-file-preview .file-name {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .admin-file-preview .remove-file {
            background: transparent;
            border: none;
            color: #dc3545;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 0 4px;
        }

        /* Back-to-list button (only visible on mobile) */
        .admin-back-btn {
            display: none;
            background: transparent;
            border: none;
            color: #052c65;
            font-size: 1.1rem;
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 6px;
            margin-right: 6px;
        }

        .admin-back-btn:hover {
            background: #a9c9ff;
        }

        /* ============================================================
           MOBILE (≤ 768px)
           ============================================================ */
        @media (max-width: 768px) {
            .admin-chat-fab {
                bottom: 20px;
                right: 20px;
                width: 52px;
                height: 52px;
            }

            .admin-chat-fab i {
                font-size: 22px;
            }

            /* Full-screen panel */
            .admin-chat-panel {
                bottom: 0;
                right: 0;
                left: 0;
                top: 0;
                width: 100vw;
                height: 100vh;
                height: 100dvh;
                /* modern mobile viewport */
                max-width: 100vw;
                max-height: 100vh;
                max-height: 100dvh;
                border-radius: 0;
                border: none;
            }

            .admin-chat-header {
                padding: 12px 14px;
                padding-top: calc(12px + env(safe-area-inset-top));
            }

            .admin-chat-header h6 {
                font-size: 1rem;
            }

            /* Users list takes full width — conversation slides in */
            .admin-users-list {
                width: 100%;
                border-right: none;
            }

            .admin-conversation {
                position: absolute;
                inset: 0;
                background: #fff;
                transform: translateX(100%);
                transition: transform 0.25s ease;
                z-index: 5;
            }

            /* When a conversation is active, slide it in and hide the list */
            .admin-chat-body.conv-active .admin-conversation {
                transform: translateX(0);
            }

            .admin-chat-body.conv-active .admin-users-list {
                visibility: hidden;
            }

            /* Bigger touch targets */
            .admin-user-item {
                padding: 14px 14px;
            }

            .admin-user-item .u-email {
                font-size: 0.9rem;
            }

            .admin-user-item .u-preview {
                font-size: 0.8rem;
            }

            .admin-conv-messages {
                padding: 10px 12px;
            }

            .admin-msg {
                max-width: 88%;
                font-size: 0.95rem;
            }

            .admin-conv-input {
                padding: 8px 10px;
                padding-bottom: calc(8px + env(safe-area-inset-bottom));
                gap: 6px;
            }

            .admin-conv-input input[type="text"] {
                font-size: 16px;
                /* prevents iOS zoom on focus */
                padding: 10px 14px;
            }

            .admin-conv-input .attach-btn,
            .admin-conv-input .send-btn {
                width: 44px;
                height: 44px;
                font-size: 1.1rem;
            }

            /* Show back button only on mobile when conversation is active */
            .admin-chat-body.conv-active .admin-back-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }

            /* Close button bigger tap area */
            .close-admin-chat {
                font-size: 1.6rem;
                padding: 4px 10px;
            }
        }

        /* ============================================================
           VERY SMALL MOBILE (≤ 380px)
           ============================================================ */
        @media (max-width: 380px) {
            .admin-msg {
                max-width: 92%;
            }

            .admin-chat-header h6 {
                font-size: 0.95rem;
            }
        }
    </style>

    <script>
        (function() {
            // ---------- config ----------
            const ADMIN_ID = String(@json(auth()->id() ?? ''));
            const ADMIN_SEND_URL = @json(route('admin.chat.send'));
            const ADMIN_HISTORY_URL = @json(route('admin.chat.history'));
            const CSRF_TOKEN = @json(csrf_token());

            // ---------- DOM ----------
            const fab = document.getElementById('adminChatFab');
            const panel = document.getElementById('adminChatPanel');
            const closeBtn = document.getElementById('adminCloseChatBtn');
            const unreadBadge = document.getElementById('adminUnreadBadge');
            const usersList = document.getElementById('adminUsersList');
            const conversation = document.getElementById('adminConversation');
            const chatBody = document.getElementById('adminChatBody');

            // ---------- state ----------
            const chats = new Map();
            let activeUserId = null;
            let pendingFile = null;

            // ---------- helpers ----------
            function escapeHtml(s) {
                return String(s ?? '').replace(/[&<>"']/g, c => ({
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#39;'
                } [c]));
            }

            function isImage(url) {
                return /\.(jpe?g|png|gif|webp|bmp|svg)$/i.test(url || '');
            }

            function isMobile() {
                return window.matchMedia('(max-width: 768px)').matches;
            }

            function totalUnread() {
                let n = 0;
                chats.forEach(c => {
                    n += (c.unread || 0);
                });
                return n;
            }

            function renderUnreadBadge() {
                const n = totalUnread();
                if (n > 0) {
                    unreadBadge.textContent = n > 99 ? '99+' : n;
                    unreadBadge.classList.add('show');
                } else {
                    unreadBadge.classList.remove('show');
                }
            }

            function renderUsersList() {
                if (chats.size === 0) {
                    usersList.innerHTML =
                        '<div class="admin-empty-hint"><i class="fas fa-inbox me-1"></i> No active chats</div>';
                    return;
                }
                usersList.innerHTML = '';
                const entries = Array.from(chats.entries()).sort((a, b) => {
                    const aLast = a[1].messages[a[1].messages.length - 1]?.ts || 0;
                    const bLast = b[1].messages[b[1].messages.length - 1]?.ts || 0;
                    return bLast - aLast;
                });

                entries.forEach(([userId, chat]) => {
                    const last = chat.messages[chat.messages.length - 1];
                    const preview = last ?
                        (last.message || (last.file_url ? '[File]' : '')) :
                        'No messages';

                    const item = document.createElement('div');
                    item.className = 'admin-user-item' + (String(userId) === String(activeUserId) ? ' active' :
                        '');
                    item.dataset.userId = userId;
                    item.innerHTML = `
                <div class="u-email">${escapeHtml(chat.email)}</div>
                <div class="u-preview">${escapeHtml(preview)}</div>
                <span class="u-badge ${chat.unread > 0 ? 'show' : ''}">${chat.unread || 0}</span>
            `;
                    item.addEventListener('click', () => openConversation(userId));
                    usersList.appendChild(item);
                });
            }

            function openConversation(userId) {
                activeUserId = String(userId);
                const chat = chats.get(activeUserId);
                if (chat) chat.unread = 0;
                renderUnreadBadge();
                renderUsersList();
                renderConversation();
                // ✅ On mobile, slide in the conversation view
                if (isMobile()) {
                    chatBody.classList.add('conv-active');
                }
            }

            // ✅ Return to user list (mobile only)
            function closeConversationView() {
                chatBody.classList.remove('conv-active');
            }

            function renderConversation() {
                if (!activeUserId || !chats.has(activeUserId)) {
                    conversation.innerHTML =
                        '<div class="admin-conv-empty"><i class="fas fa-comments me-1"></i> Select a user to view chat</div>';
                    return;
                }
                const chat = chats.get(activeUserId);

                conversation.innerHTML = `
            <div style="padding:8px 12px;border-bottom:1px solid #e9ecef;background:#fff;font-size:0.85rem;display:flex;align-items:center;gap:6px;flex-shrink:0;">
                <button type="button" class="admin-back-btn" id="adminBackBtn" aria-label="Back to list">
                    <i class="fas fa-arrow-left"></i>
                </button>
                <strong>${escapeHtml(chat.email)}</strong>
                <span style="color:#6c757d;"> &middot; #${escapeHtml(activeUserId)}</span>
            </div>
            <div class="admin-conv-messages" id="adminConvMessages"></div>
            <div class="admin-file-preview" id="adminFilePreview">
                <i class="fas fa-paperclip"></i>
                <span class="file-name" id="adminFileName"></span>
                <button class="remove-file" id="adminFileRemove" type="button" aria-label="Remove file">✕</button>
            </div>
            <div class="admin-conv-input">
                <input type="file" id="adminFileInput" accept="image/*,.pdf,.doc,.docx,.txt,.zip">
                <button type="button" class="attach-btn" id="adminAttachBtn" aria-label="Attach file">
                    <i class="fas fa-paperclip"></i>
                </button>
                <input type="text" id="adminReplyInput" placeholder="Type a reply..." maxlength="1000" autocomplete="off">
                <button type="button" class="send-btn" id="adminReplySend" aria-label="Send reply">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        `;

                const msgWrap = document.getElementById('adminConvMessages');
                chat.messages.forEach(m => appendMessageEl(msgWrap, m));
                msgWrap.scrollTop = msgWrap.scrollHeight;

                // ✅ Bind back button (mobile)
                const backBtn = document.getElementById('adminBackBtn');
                if (backBtn) {
                    backBtn.addEventListener('click', closeConversationView);
                }

                // Bind events
                const input = document.getElementById('adminReplyInput');
                const btn = document.getElementById('adminReplySend');
                const fileInput = document.getElementById('adminFileInput');
                const attachBtn = document.getElementById('adminAttachBtn');
                const preview = document.getElementById('adminFilePreview');
                const fileNameEl = document.getElementById('adminFileName');
                const fileRemEl = document.getElementById('adminFileRemove');

                btn.addEventListener('click', () => sendAdminReply(activeUserId));
                input.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        sendAdminReply(activeUserId);
                    }
                });

                attachBtn.addEventListener('click', () => fileInput.click());
                fileInput.addEventListener('change', () => {
                    const f = fileInput.files && fileInput.files[0];
                    if (!f) return;
                    if (f.size > 5 * 1024 * 1024) {
                        if (typeof toastr !== 'undefined') toastr.error('File too large (max 5MB)', 'Chat');
                        fileInput.value = '';
                        return;
                    }
                    pendingFile = f;
                    fileNameEl.textContent = f.name;
                    preview.classList.add('show');
                });
                fileRemEl.addEventListener('click', () => {
                    pendingFile = null;
                    fileInput.value = '';
                    preview.classList.remove('show');
                });

                // Don't autofocus on mobile — avoids keyboard popping up immediately
                if (!isMobile()) input.focus();
            }

            function appendMessageEl(wrap, msg) {
                const d = document.createElement('div');
                d.className = 'admin-msg ' + (msg.type === 'admin' ? 'from-admin' : 'from-user');
                if (msg.sending) d.classList.add('sending');
                if (msg.failed) d.classList.add('failed');
                d.dataset.ts = msg.ts;

                if (msg.message && msg.message.trim()) {
                    const t = document.createElement('div');
                    t.textContent = msg.message;
                    d.appendChild(t);
                }

                if (msg.file_url) {
                    if (isImage(msg.file_url)) {
                        const a = document.createElement('a');
                        a.href = msg.file_url;
                        a.target = '_blank';
                        a.rel = 'noopener';
                        const img = document.createElement('img');
                        img.src = msg.file_url;
                        img.className = 'msg-file';
                        img.alt = msg.file_name || 'attachment';
                        a.appendChild(img);
                        d.appendChild(a);
                    } else {
                        const a = document.createElement('a');
                        a.href = msg.file_url;
                        a.target = '_blank';
                        a.rel = 'noopener';
                        a.className = 'msg-file-link';
                        a.innerHTML = '<i class="fas fa-paperclip"></i> ' + (msg.file_name || 'Download file');
                        d.appendChild(a);
                    }
                }

                wrap.appendChild(d);
                wrap.scrollTop = wrap.scrollHeight;
                return d;
            }

            // ---------- Load from DB ----------
            async function loadHistory() {
                try {
                    const res = await fetch(ADMIN_HISTORY_URL, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        credentials: 'same-origin'
                    });
                    const data = await res.json().catch(() => ({}));
                    if (!data.success || !Array.isArray(data.chats)) return;

                    const prevUnread = new Map();
                    chats.forEach((c, id) => prevUnread.set(id, c.unread || 0));

                    chats.clear();
                    data.chats.forEach(chat => {
                        const userId = String(chat.user_id);
                        chats.set(userId, {
                            email: chat.email,
                            messages: chat.messages || [],
                            unread: prevUnread.get(userId) || 0
                        });
                    });

                    if (activeUserId && chats.has(activeUserId)) {
                        chats.get(activeUserId).unread = 0;
                    }

                    renderUsersList();
                    renderUnreadBadge();
                    if (activeUserId) renderConversation();
                } catch (e) {
                    console.warn('Failed to load admin chat history:', e);
                }
            }

            // ---------- Send reply ----------
            function sendAdminReply(userId) {
                const input = document.getElementById('adminReplyInput');
                if (!input) return;
                const text = input.value.trim();
                if (!text && !pendingFile) return;

                const ts = Date.now();
                const localFileUrl = pendingFile ? URL.createObjectURL(pendingFile) : null;
                const localFileName = pendingFile ? pendingFile.name : null;

                appendMessage(userId, {
                    text,
                    type: 'admin',
                    ts,
                    sending: true,
                    file_url: localFileUrl,
                    file_name: localFileName
                });

                input.value = '';
                input.focus();

                const fileToSend = pendingFile;
                pendingFile = null;
                const fileInput = document.getElementById('adminFileInput');
                if (fileInput) fileInput.value = '';
                const preview = document.getElementById('adminFilePreview');
                if (preview) preview.classList.remove('show');

                const sendBtn = document.getElementById('adminReplySend');
                if (sendBtn) sendBtn.disabled = true;

                const fd = new FormData();
                if (text) fd.append('message', text);
                if (fileToSend) fd.append('file', fileToSend);
                fd.append('receiver_id', userId);

                fetch(ADMIN_SEND_URL, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': CSRF_TOKEN,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: fd
                    })
                    .then(async (r) => {
                        const data = await r.json().catch(() => ({}));
                        if (!r.ok || !data.success) throw new Error(data.message || data.error || 'Failed');
                        return data;
                    })
                    .then(() => loadHistory())
                    .catch((err) => {
                        console.error('Admin reply failed:', err);
                        const wrap = document.getElementById('adminConvMessages');
                        if (wrap) {
                            const el = wrap.querySelector(`.admin-msg.sending[data-ts="${ts}"]`);
                            if (el) {
                                el.classList.remove('sending');
                                el.classList.add('failed');
                                el.title = 'Failed to send. Click to retry.';
                                el.addEventListener('click', function retry() {
                                    el.removeEventListener('click', retry);
                                    el.remove();
                                    const chat = chats.get(String(userId));
                                    if (chat) chat.messages = chat.messages.filter(m => m.ts !== ts);
                                    input.value = text;
                                    sendAdminReply(userId);
                                });
                            }
                        }
                        if (typeof toastr !== 'undefined') {
                            toastr.error(err.message || 'Failed to send reply.', 'Chat');
                        }
                    })
                    .finally(() => {
                        if (sendBtn) sendBtn.disabled = false;
                    });
            }

            function appendMessage(userId, msg) {
                userId = String(userId);
                if (!chats.has(userId)) {
                    chats.set(userId, {
                        email: 'User #' + userId,
                        messages: [],
                        unread: 0
                    });
                }
                const chat = chats.get(userId);
                chat.messages.push(msg);

                if (msg.type === 'user' && activeUserId !== userId) {
                    chat.unread = (chat.unread || 0) + 1;
                    renderUnreadBadge();
                }

                if (activeUserId === userId) {
                    const wrap = document.getElementById('adminConvMessages');
                    if (wrap) appendMessageEl(wrap, msg);
                }
                renderUsersList();
            }

            // ---------- Toggle panel ----------
            fab.addEventListener('click', async () => {
                panel.classList.toggle('show');
                if (panel.classList.contains('show')) {
                    if (activeUserId && chats.has(activeUserId)) {
                        chats.get(activeUserId).unread = 0;
                    }
                    renderUnreadBadge();
                    renderUsersList();
                    await loadHistory();
                    if (activeUserId) renderConversation();

                    // Lock body scroll on mobile while panel is open
                    if (isMobile()) {
                        document.body.style.overflow = 'hidden';
                    }
                } else {
                    document.body.style.overflow = '';
                }
            });

            closeBtn.addEventListener('click', () => {
                panel.classList.remove('show');
                chatBody.classList.remove('conv-active'); // reset mobile view state
                document.body.style.overflow = '';
            });

            // ✅ Close conversation view on mobile when history back is pressed
            window.addEventListener('popstate', () => {
                if (chatBody.classList.contains('conv-active')) {
                    closeConversationView();
                }
            });

            // ---------- Pusher ----------
            const pusher = new Pusher('6d5c0efa3bf0828da699', {
                cluster: 'ap2'
            });
            const channel = pusher.subscribe('notify-delivery-channel');

            channel.bind('notify-delivery-event', function(data) {
                if (Number(data.status) !== 100) return;

                const senderId = String(data.sender_id);
                const receiverId = String(data.receiver_id);

                if (senderId === ADMIN_ID) return;
                if (data.sender_type !== 'user') return;
                if (receiverId !== '0' && receiverId !== '50' && receiverId !== ADMIN_ID) return;

                const userId = senderId;
                const email = data.user_name || ('User #' + userId);

                if (!chats.has(userId)) {
                    chats.set(userId, {
                        email,
                        messages: [],
                        unread: 0
                    });
                } else {
                    chats.get(userId).email = email;
                }

                if (typeof playNotificationSound === 'function') {
                    playNotificationSound();
                }

                fab.classList.add('pulse');
                setTimeout(() => fab.classList.remove('pulse'), 2500);

                const isActiveAndOpen = panel.classList.contains('show') && activeUserId === userId;

                if (!isActiveAndOpen) {
                    const chat = chats.get(userId);
                    chat.unread = (chat.unread || 0) + 1;
                    renderUnreadBadge();
                }

                loadHistory().then(() => {
                    if (isActiveAndOpen) {
                        if (chats.has(userId)) chats.get(userId).unread = 0;
                        renderUnreadBadge();
                    } else {
                        if (typeof toastr !== 'undefined') {
                            toastr.info(
                                data.message || '[File]',
                                'Chat from ' + email, {
                                    timeOut: 3000,
                                    extendedTimeOut: 1000,
                                    progressBar: true,
                                    closeButton: true,
                                    tapToDismiss: true
                                }
                            );
                        }
                    }
                });
            });

            // ---------- init ----------
            renderUsersList();
            renderUnreadBadge();
            loadHistory();
        })
        ();
    </script>
@endauth
