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

    <div class="admin-chat-body">
        <!-- Left: user list -->
        <div class="admin-users-list" id="adminUsersList">
            <div class="admin-empty-hint">
                <i class="fas fa-inbox me-1"></i> No active chats
            </div>
        </div>

        <!-- Right: conversation -->
        <div class="admin-conversation" id="adminConversation">
            <div class="admin-conv-empty">
                <i class="fas fa-comments me-1"></i> Select a user to view chat
            </div>
        </div>
    </div>
</div>

<!-- Admin chat styles -->
<style>
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
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    cursor: pointer;
    z-index: 1050;
    transition: transform 0.2s, background-color 0.2s;
    border: 2px solid #cfe2ff;
  }
  .admin-chat-fab:hover { background-color: #0b5ed7; transform: scale(1.05); }
  .admin-chat-fab i { font-size: 26px; }

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
  .admin-unread-badge.show { display: flex; }

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
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    display: none;
    flex-direction: column;
    z-index: 1060;
    overflow: hidden;
    font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
  }
  .admin-chat-panel.show { display: flex; }

  .admin-chat-header {
    background: #cfe2ff;
    padding: 12px 16px;
    border-bottom: 2px solid #0d6efd;
    display: flex;
    align-items: center;
    justify-content: space-between;
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
  .close-admin-chat:hover { background: #a9c9ff; }

  .admin-chat-body {
    flex: 1;
    display: flex;
    overflow: hidden;
  }

  /* left user list */
  .admin-users-list {
    width: 220px;
    border-right: 1px solid #e9ecef;
    overflow-y: auto;
    background: #f8f9fa;
  }
  .admin-user-item {
    padding: 10px 12px;
    border-bottom: 1px solid #e9ecef;
    cursor: pointer;
    transition: background 0.15s;
    position: relative;
  }
  .admin-user-item:hover { background: #e9ecef; }
  .admin-user-item.active { background: #cfe2ff; }
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
  .admin-user-item .u-badge.show { display: flex; }
  .admin-empty-hint {
    padding: 20px 12px;
    color: #adb5bd;
    font-style: italic;
    font-size: 0.85rem;
    text-align: center;
  }

  /* right conversation */
  .admin-conversation {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #fff;
  }
  .admin-conv-empty {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #adb5bd;
    font-style: italic;
    font-size: 0.9rem;
  }
  .admin-conv-messages {
    flex: 1;
    overflow-y: auto;
    padding: 12px 16px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    background: #f8f9fa;
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
  .admin-msg.sending { opacity: 0.6; }
  .admin-msg.failed {
    background: #f8d7da !important;
    color: #721c24 !important;
    border: 1px solid #f5c6cb;
    cursor: pointer;
  }
  .admin-conv-input {
    display: flex;
    gap: 8px;
    padding: 10px 12px;
    border-top: 1px solid #e9ecef;
    background: #fff;
  }
  .admin-conv-input input {
    flex: 1;
    border: 1px solid #ced4da;
    border-radius: 24px;
    padding: 8px 16px;
    font-size: 0.9rem;
    outline: none;
  }
  .admin-conv-input input:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13,110,253,0.15);
  }
  .admin-conv-input button {
    background: #0d6efd;
    border: none;
    color: #fff;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
    cursor: pointer;
  }
  .admin-conv-input button:hover { background: #0b5ed7; }
  .admin-conv-input button:disabled { opacity: 0.5; cursor: not-allowed; }
</style>

<!-- Admin chat script -->
<script>
(function () {
  // ---------- config ----------
  const ADMIN_ID        = String(@json(auth()->id() ?? ''));
  const ADMIN_SEND_URL  = @json(route('admin.chat.send'));
  const CSRF_TOKEN      = @json(csrf_token());

  // ---------- DOM ----------
  const fab          = document.getElementById('adminChatFab');
  const panel        = document.getElementById('adminChatPanel');
  const closeBtn     = document.getElementById('adminCloseChatBtn');
  const unreadBadge  = document.getElementById('adminUnreadBadge');
  const usersList    = document.getElementById('adminUsersList');
  const conversation = document.getElementById('adminConversation');

  // ---------- state ----------
  // Map<userId, { email, messages: [{text, type, ts, sending?, failed?}], unread }>
  const chats = new Map();
  let activeUserId = null;

  // ---------- helpers ----------
  function escapeHtml(s) {
    return String(s ?? '').replace(/[&<>"']/g, c => ({
      '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
    }[c]));
  }

  function totalUnread() {
    let n = 0;
    chats.forEach(c => { n += (c.unread || 0); });
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
      usersList.innerHTML = '<div class="admin-empty-hint"><i class="fas fa-inbox me-1"></i> No active chats</div>';
      return;
    }
    usersList.innerHTML = '';
    // Most recent first
    const entries = Array.from(chats.entries()).sort((a, b) => {
      const aLast = a[1].messages[a[1].messages.length - 1]?.ts || 0;
      const bLast = b[1].messages[b[1].messages.length - 1]?.ts || 0;
      return bLast - aLast;
    });

    entries.forEach(([userId, chat]) => {
      const last = chat.messages[chat.messages.length - 1];
      const item = document.createElement('div');
      item.className = 'admin-user-item' + (String(userId) === String(activeUserId) ? ' active' : '');
      item.dataset.userId = userId;
      item.innerHTML = `
        <div class="u-email">${escapeHtml(chat.email)}</div>
        <div class="u-preview">${last ? escapeHtml(last.text) : '<em>No messages</em>'}</div>
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
  }

  function renderConversation() {
    if (!activeUserId || !chats.has(activeUserId)) {
      conversation.innerHTML = '<div class="admin-conv-empty"><i class="fas fa-comments me-1"></i> Select a user to view chat</div>';
      return;
    }
    const chat = chats.get(activeUserId);

    conversation.innerHTML = `
      <div style="padding:8px 12px;border-bottom:1px solid #e9ecef;background:#fff;font-size:0.85rem;">
        <strong>${escapeHtml(chat.email)}</strong>
        <span style="color:#6c757d;"> &middot; #${escapeHtml(activeUserId)}</span>
      </div>
      <div class="admin-conv-messages" id="adminConvMessages"></div>
      <div class="admin-conv-input">
        <input type="text" id="adminReplyInput" placeholder="Type a reply..." maxlength="1000" autocomplete="off">
        <button id="adminReplySend" aria-label="Send reply"><i class="fas fa-paper-plane"></i></button>
      </div>
    `;

    const msgWrap = document.getElementById('adminConvMessages');
    chat.messages.forEach(m => appendMessageEl(msgWrap, m));
    msgWrap.scrollTop = msgWrap.scrollHeight;

    // Bind send
    const input = document.getElementById('adminReplyInput');
    const btn   = document.getElementById('adminReplySend');
    btn.addEventListener('click', () => sendAdminReply(activeUserId));
    input.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') { e.preventDefault(); sendAdminReply(activeUserId); }
    });
    input.focus();
  }

  // Create a single message element
  function appendMessageEl(wrap, msg) {
    const d = document.createElement('div');
    d.className = 'admin-msg ' + (msg.type === 'admin' ? 'from-admin' : 'from-user');
    if (msg.sending) d.classList.add('sending');
    if (msg.failed)  d.classList.add('failed');
    d.textContent = msg.text;
    d.dataset.ts = msg.ts;
    wrap.appendChild(d);
    wrap.scrollTop = wrap.scrollHeight;
    return d;
  }

  function sendAdminReply(userId) {
    const input = document.getElementById('adminReplyInput');
    if (!input) return;
    const text = input.value.trim();
    if (!text) return;

    const ts = Date.now();

    // Optimistic UI
    appendMessage(userId, { text, type: 'admin', ts, sending: true });
    input.value = '';
    input.focus();

    const sendBtn = document.getElementById('adminReplySend');
    if (sendBtn) sendBtn.disabled = true;

    fetch(ADMIN_SEND_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': CSRF_TOKEN,
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({ message: text, receiver_id: userId })
    })
    .then(async (r) => {
      const data = await r.json().catch(() => ({}));
      if (!r.ok || !data.success) throw new Error(data.message || data.error || 'Failed');
      return data;
    })
    .then(() => {
      // Mark as sent (remove sending state from the last matching element)
      const wrap = document.getElementById('adminConvMessages');
      if (wrap) {
        const el = wrap.querySelector(`.admin-msg.sending[data-ts="${ts}"]`);
        if (el) el.classList.remove('sending');
      }
      // Update stored message
      const chat = chats.get(String(userId));
      if (chat) {
        const m = chat.messages.find(m => m.ts === ts);
        if (m) m.sending = false;
      }
    })
    .catch((err) => {
      console.error('Admin reply failed:', err);
      // Mark as failed
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
            // Remove from stored messages
            const chat = chats.get(String(userId));
            if (chat) chat.messages = chat.messages.filter(m => m.ts !== ts);
            // Re-send
            input.value = text;
            sendAdminReply(userId);
          });
        }
      }
      if (typeof toastr !== 'undefined') {
        toastr.error('Failed to send reply. Click the message to retry.', 'Chat');
      }
    })
    .finally(() => {
      if (sendBtn) sendBtn.disabled = false;
    });
  }

  function appendMessage(userId, msg) {
    userId = String(userId);
    if (!chats.has(userId)) {
      chats.set(userId, { email: 'User #' + userId, messages: [], unread: 0 });
    }
    const chat = chats.get(userId);
    chat.messages.push(msg);

    // Increment unread only if it's a user message and this conversation isn't active
    if (msg.type === 'user' && activeUserId !== userId) {
      chat.unread = (chat.unread || 0) + 1;
      renderUnreadBadge();
    }

    // Append to the open conversation if it's this one
    if (activeUserId === userId) {
      const wrap = document.getElementById('adminConvMessages');
      if (wrap) appendMessageEl(wrap, msg);
    }
    renderUsersList();
  }

  // ---------- toggle ----------
  fab.addEventListener('click', () => {
    panel.classList.toggle('show');
    if (panel.classList.contains('show')) {
      // Clear unread for currently active user
      if (activeUserId && chats.has(activeUserId)) {
        chats.get(activeUserId).unread = 0;
      }
      renderUnreadBadge();
      renderUsersList();
      if (activeUserId) renderConversation();
    }
  });
  closeBtn.addEventListener('click', () => panel.classList.remove('show'));

  // ---------- Pusher ----------
  const pusher  = new Pusher('6d5c0efa3bf0828da699', { cluster: 'ap2' });
  const channel = pusher.subscribe('notify-delivery-channel');

  channel.bind('notify-delivery-event', function (data) {
    // Only handle chat events
    if (Number(data.status) !== 100) return;

    const senderId   = String(data.sender_id);
    const receiverId = String(data.receiver_id);

    // Skip echoes of this admin's own messages
    if (senderId === ADMIN_ID) return;

    // Only accept messages from users
    if (data.sender_type !== 'user') return;

    // Optional: only accept messages addressed to this admin OR broadcast to all admins (receiver_id === '0')
    if (receiverId !== ADMIN_ID && receiverId !== '0') return;

    const userId = senderId;   // the user who sent it
    const email  = data.user_name || ('User #' + userId);

    // Ensure chat entry exists with proper email
    if (!chats.has(userId)) {
      chats.set(userId, { email, messages: [], unread: 0 });
    } else {
      // Update email in case it changed / was missing
      chats.get(userId).email = email;
    }

    // Play notification sound
    if (typeof playNotificationSound === 'function') {
      playNotificationSound();
    }

    // Append the message (this also handles unread + UI)
    appendMessage(userId, {
      text: data.message,
      type: 'user',
      ts: Date.now()
    });

    // If panel is open AND this user is the active one → no toast
    const isActiveAndOpen = panel.classList.contains('show') && activeUserId === userId;
    if (isActiveAndOpen) {
      chats.get(userId).unread = 0;
      renderUnreadBadge();
    } else {
      // Toast for visibility when panel is closed or another chat is active
      if (typeof toastr !== 'undefined') {
        toastr.info(data.message, 'Chat from ' + email);
      }
    }
  });

  // ---------- init ----------
  renderUsersList();
  renderUnreadBadge();
})();
</script>
@endauth