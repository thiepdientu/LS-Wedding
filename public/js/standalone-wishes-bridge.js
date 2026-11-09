/**
 * Standalone Wishes Bridge - LS-Wedding
 * Tự động đồng bộ và nạp danh sách lời chúc Live qua API từ máy chủ cho mọi Template khi chạy trên GitHub Pages / Offline.
 */
(function (window, document) {
    'use strict';

    function escapeHtml(text) {
        if (!text) return '';
        var map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
        return String(text).replace(/[&<>"']/g, function (m) { return map[m]; });
    }

    var StandaloneWishesBridge = {
        cardId: null,
        apiBaseUrl: '',

        init: function () {
            this.cardId = window.WEDDING_CARD_ID;
            this.apiBaseUrl = (window.WEDDING_API_URL || '').replace(/\/+$/, '');

            if (!this.cardId) {
                console.warn('[LiveWishes] Không tìm thấy WEDDING_CARD_ID');
                return;
            }

            // 1. Tự động tải danh sách lời chúc mới nhất từ API
            this.fetchLiveWishes();

            // 2. Tự động gắn bộ bắt sự kiện submit form gửi lời chúc
            this.bindForms();
        },

        getApiEndpoint: function () {
            var base = this.apiBaseUrl;
            return (base ? base : '') + '/wedding-cards/' + encodeURIComponent(this.cardId) + '/wishes';
        },

        fetchLiveWishes: function () {
            var self = this;
            var endpoint = self.getApiEndpoint();

            fetch(endpoint, {
                method: 'GET',
                headers: { 'Accept': 'application/json' }
            })
            .then(function (res) {
                if (!res.ok) throw new Error('HTTP ' + res.status);
                return res.json();
            })
            .then(function (res) {
                if (res && res.success && Array.isArray(res.data)) {
                    self.updateUIWithWishes(res.data);
                }
            })
            .catch(function (err) {
                console.warn('[LiveWishes] Không thể kết nối API trực tuyến, nạp dữ liệu snapshot dự phòng:', err);
                if (Array.isArray(window.INITIAL_WISHES) && window.INITIAL_WISHES.length > 0) {
                    self.updateUIWithWishes(window.INITIAL_WISHES);
                }
            });
        },

        updateUIWithWishes: function (items) {
            if (!Array.isArray(items)) return;

            // Định dạng dữ liệu thống nhất
            var normalizedItems = items.map(function (item) {
                var attStatus = item.attendance_status || '';
                var attLabel = item.attendance || '';
                if (!attLabel) {
                    if (attStatus === 'attending') attLabel = 'Sẽ tham dự';
                    else if (attStatus === 'not_attending') attLabel = 'Không thể tham dự';
                    else attLabel = 'Chúc phúc';
                }

                return {
                    id: item.id,
                    name: item.name || item.sender_name || 'Khách mời',
                    sender_name: item.sender_name || item.name || 'Khách mời',
                    wish: item.wish || item.message || '',
                    message: item.message || item.wish || '',
                    side: item.side || 'Khách quý',
                    attendance: attLabel,
                    attendance_status: attStatus,
                    guest_count: item.guest_count || 1,
                    time: item.time || item.created_at || 'Vừa xong',
                    created_at: item.created_at || item.time || 'Vừa xong',
                };
            });

            // 1. Nếu template có biến toàn cục wishesData / wishesList / initialWishes (Template 24 - 35)
            var handledByTemplateVar = false;
            ['wishesData', 'wishesList', 'initialWishes'].forEach(function (varName) {
                if (typeof window[varName] !== 'undefined' && Array.isArray(window[varName])) {
                    window[varName].length = 0;
                    normalizedItems.forEach(function (w) { window[varName].push(w); });
                    handledByTemplateVar = true;
                }
            });

            // Gọi hàm render riêng của template nếu có
            if (typeof window.renderWishes === 'function') {
                try { window.renderWishes(); return; } catch (e) { console.error(e); }
            }
            if (typeof window.renderWishesList === 'function') {
                try { window.renderWishesList(); return; } catch (e) { console.error(e); }
            }

            // 2. Cập nhật Badge số lượng lời chúc nếu có
            var badgeEl = document.querySelector('#wish-count-badge, #wishCount, .wish-count-badge');
            if (badgeEl) {
                badgeEl.textContent = normalizedItems.length + ' lời chúc';
            }

            // 3. Render danh sách vào DOM tương ứng
            var container = document.querySelector('#wishes-list, #wishesFeed, #gbList, .list_message, #list_message, .wish-list-container');
            if (!container) return;

            if (normalizedItems.length === 0) {
                container.innerHTML = '<div class="text-center py-4 text-xs italic opacity-75">Hãy là người đầu tiên gửi lời chúc mừng hạnh phúc đến cô dâu &amp; chú rể!</div>';
                return;
            }

            // Kiểm tra theme / kiểu hiển thị của container
            if (container.id === 'wishes-list' || container.id === 'gbList') {
                // Định dạng card bo tròn hiện đại (Template 24 - 35)
                container.innerHTML = normalizedItems.map(function (item) {
                    return '<div class="bg-botanical-50/70 rounded-2xl p-3.5 border border-botanical-200 shadow-sm mb-3">' +
                           '  <div class="flex items-center justify-between gap-2">' +
                           '    <span class="font-bold text-botanical-900 text-xs sm:text-sm">' + escapeHtml(item.name) + '</span>' +
                           '    <span class="text-[10px] px-2.5 py-0.5 rounded-full bg-white text-botanical-700 border border-botanical-200">' +
                           '      ' + escapeHtml(item.side) + ' • ' + escapeHtml(item.attendance) +
                           '    </span>' +
                           '  </div>' +
                           '  <p class="text-xs text-botanical-800 mt-1.5 leading-relaxed">' + escapeHtml(item.wish) + '</p>' +
                           '  <p class="text-[10px] text-botanical-500 mt-1">' + escapeHtml(item.time) + '</p>' +
                           '</div>';
                }).join('');
            } else if (container.id === 'wishesFeed' || container.classList.contains('wishes-feed')) {
                // Định dạng Template 22, 23
                container.innerHTML = normalizedItems.map(function (item) {
                    return '<div class="wish-item">' +
                           '  <div class="wish-header">' +
                           '    <span class="wish-author">' + escapeHtml(item.name) + '</span>' +
                           '    <span class="wish-time">' + escapeHtml(item.time) + '</span>' +
                           '  </div>' +
                           '  <p class="wish-content">' + escapeHtml(item.wish) + '</p>' +
                           '</div>';
                }).join('');
            } else {
                // Định dạng uikit/mặc định Template 01 - 21
                container.innerHTML = normalizedItems.map(function (item) {
                    return '<div class="message-item uk-margin-small-bottom uk-padding-small uk-border-rounded blur-bg" style="border: 1px solid rgba(255,255,255,0.25); background: rgba(255,255,255,0.12); margin-bottom: 12px; border-radius: 12px; padding: 12px 16px;">' +
                           '  <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 4px;">' +
                           '    <h4 class="user_message" style="margin: 0; font-weight: 700; font-size: 15px; color: inherit;">' + escapeHtml(item.name) + '</h4>' +
                           '    <span style="font-size: 11px; opacity: 0.75;">' + escapeHtml(item.time) + '</span>' +
                           '  </div>' +
                           '  <p class="message_body" style="margin: 0; font-size: 14px; line-height: 1.5; color: inherit; opacity: 0.95; white-space: pre-wrap;">' + escapeHtml(item.wish) + '</p>' +
                           '</div>';
                }).join('');
            }
        },

        bindForms: function () {
            var self = this;

            // Xử lý đè các hàm submit toàn cục của template nếu có
            if (typeof window.submitRSVP === 'function' || document.getElementById('rsvp-form')) {
                window.submitRSVP = function (e) {
                    if (e && e.preventDefault) e.preventDefault();
                    self.handleFormSubmit(document.getElementById('rsvp-form') || (e ? e.target : null));
                };
            }

            if (typeof window.submitWish === 'function' || document.getElementById('wishForm') || document.getElementById('wish-form')) {
                window.submitWish = function (e) {
                    if (e && e.preventDefault) e.preventDefault();
                    self.handleFormSubmit(document.getElementById('wishForm') || document.getElementById('wish-form') || (e ? e.target : null));
                };
            }

            // Bắt sự kiện submit tổng quát cho mọi form
            var forms = document.querySelectorAll('#rsvp-form, #wishForm, #wish-form, #messageForm, #customForm, .form-wedding-wish');
            forms.forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    self.handleFormSubmit(form);
                });
            });
        },

        handleFormSubmit: function (form) {
            if (!form) return;
            var self = this;

            var nameInput = form.querySelector('#rsvp-name, #guestNameInput, #name, #m_name, #f_name, input[name="sender_name"], input[name="name"], input[type="text"]');
            var wishInput = form.querySelector('#rsvp-wish, #guestWishInput, #messages, #m_text, #f_mess, textarea[name="message"], textarea[name="wish"], textarea');
            var sideInput = form.querySelector('#rsvp-side, select[name="side"]');
            var attInput = form.querySelector('input[name="attendance"]:checked, input[name="attendance_status"]:checked, #accept, select[name="attendance_status"], #rsvp-status');
            var countInput = form.querySelector('#guestCountInput, input[name="guest_count"], select[name="guest_count"]');

            var senderName = nameInput ? nameInput.value.trim() : '';
            var message = wishInput ? wishInput.value.trim() : '';
            var side = sideInput ? sideInput.value : 'Khách quý';
            var attendance = attInput ? attInput.value : 'Sẽ tham dự';
            var guestCount = countInput ? (parseInt(countInput.value, 10) || 1) : 1;

            if (!senderName) {
                alert('Vui lòng nhập họ và tên của bạn.');
                if (nameInput) nameInput.focus();
                return;
            }

            if (!message) {
                alert('Vui lòng nhập lời chúc phúc.');
                if (wishInput) wishInput.focus();
                return;
            }

            var submitBtn = form.querySelector('button[type="submit"], input[type="submit"]');
            var origBtnHtml = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="loading-spinner">⏳</span> Đang gửi lời chúc...';
            }

            var payload = {
                sender_name: senderName,
                name: senderName,
                message: message,
                wish: message,
                side: side,
                attendance: attendance,
                attendance_status: attendance,
                guest_count: guestCount
            };

            fetch(self.getApiEndpoint(), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            })
            .then(function (res) { return res.json(); })
            .then(function (res) {
                if (res && res.success) {
                    var newWish = res.data || payload;

                    // Cập nhật danh sách trên client
                    self.prependNewWish(newWish);

                    // Reset form
                    form.reset();

                    // Hiển thị thông báo thành công
                    if (typeof window.showToast === 'function') {
                        window.showToast('Cảm ơn lời chúc & xác nhận của bạn! ❤️');
                    } else {
                        alert('Gửi lời chúc thành công! Cảm ơn bạn rất nhiều.');
                    }
                } else {
                    alert((res && res.message) ? res.message : 'Có lỗi khi gửi lời chúc, vui lòng thử lại.');
                }
            })
            .catch(function (err) {
                console.error('[LiveWishes] Submit error:', err);
                // Vẫn thêm tạm vào giao diện phía máy khách để trải nghiệm mượt mà
                self.prependNewWish(payload);
                form.reset();
                if (typeof window.showToast === 'function') {
                    window.showToast('Lời chúc của bạn đã được ghi nhận!');
                } else {
                    alert('Lời chúc của bạn đã được ghi nhận!');
                }
            })
            .finally(function () {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = origBtnHtml;
                }
            });
        },

        prependNewWish: function (item) {
            var formatted = {
                id: item.id || Date.now(),
                name: item.name || item.sender_name || 'Bạn',
                sender_name: item.sender_name || item.name || 'Bạn',
                wish: item.wish || item.message || '',
                message: item.message || item.wish || '',
                side: item.side || 'Khách quý',
                attendance: item.attendance || 'Chúc phúc',
                time: item.time || item.created_at || 'Vừa gửi xong'
            };

            ['wishesData', 'wishesList', 'initialWishes'].forEach(function (varName) {
                if (typeof window[varName] !== 'undefined' && Array.isArray(window[varName])) {
                    window[varName].unshift(formatted);
                }
            });

            if (typeof window.renderWishes === 'function') {
                try { window.renderWishes(); return; } catch (e) {}
            }

            // Gọi tải lại toàn bộ hoặc tự prepend vào container
            this.fetchLiveWishes();
        }
    };

    window.StandaloneWishesBridge = StandaloneWishesBridge;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function () {
            StandaloneWishesBridge.init();
        });
    } else {
        StandaloneWishesBridge.init();
    }
})(window, document);
