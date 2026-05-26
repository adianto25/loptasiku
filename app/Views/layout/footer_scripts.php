    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    
    <script>
        // Navbar Scroll Transition
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        let allTickets = [];
        let selectedTicketType = null;
        let selectedTicketPrice = 0;
        let ticketQuantity = 1;
        let selectedPaymentMethod = null;
        let selectedPaymentAccount = null;
        let currentStep = 1;
        let buyerData = {};

        async function loadMyTickets() {
            try {
                const response = await fetch('/api/tickets');
                if (response.ok) {
                    allTickets = await response.json();
                    renderTickets();
                    updateTicketAvailability();
                }
            } catch(e) {
                console.error('Failed to load tickets', e);
            }
        }

        function updateTicketAvailability() {
            const earlyBirdCount = allTickets.filter(t => t.ticket_type === 'early').reduce((sum, t) => sum + parseInt(t.quantity), 0);
            const remaining = Math.max(0, 500 - earlyBirdCount);

            const earlyBirdTicket = document.getElementById('early-bird-ticket');
            const regularTicket = document.getElementById('regular-ticket');
            const earlyBirdStock = document.getElementById('early-bird-stock');
            const regularStatus = document.getElementById('regular-status');

            if (earlyBirdStock) {
                earlyBirdStock.textContent = `${remaining} tiket`;
            }

            if (remaining === 0) {
                if (earlyBirdTicket) {
                    earlyBirdTicket.style.opacity = '0.5';
                    earlyBirdTicket.style.cursor = 'not-allowed';
                    earlyBirdTicket.classList.add('ticket-sold-out');
                }
                if (regularStatus) {
                    regularStatus.textContent = 'Tersedia sekarang!';
                    regularStatus.classList.add('text-success');
                }
            } else {
                if (regularTicket) {
                    regularTicket.style.opacity = '0.5';
                    regularTicket.style.cursor = 'not-allowed';
                    regularTicket.classList.add('ticket-not-available');
                }
            }
        }

        function showStep(step) {
            document.getElementById('step-1').classList.add('d-none');
            document.getElementById('step-2').classList.add('d-none');
            document.getElementById('step-3').classList.add('d-none');
            document.getElementById('step-4').classList.add('d-none');

            document.getElementById(`step-${step}`).classList.remove('d-none');
            currentStep = step;

            window.scrollTo({ top: document.getElementById('tiket').offsetTop - 100, behavior: 'smooth' });
        }

        function renderTickets() {
            const ticketsList = document.getElementById('tickets-list');
            const noTicketsMessage = document.getElementById('no-tickets-message');

            if (allTickets.length === 0) {
                ticketsList.innerHTML = '';
                noTicketsMessage.classList.remove('d-none');
                return;
            }

            noTicketsMessage.classList.add('d-none');
            ticketsList.innerHTML = '';

            allTickets.forEach(ticket => {
                const ticketCard = document.createElement('div');
                ticketCard.className = 'col-md-6 mb-3';

                const statusColor = ticket.status === 'pending' ? 'bg-warning text-dark' :
                    ticket.status === 'verified' ? 'bg-success text-white' : 'bg-danger text-white';

                const statusText = ticket.status === 'pending' ? 'Menunggu Verifikasi' :
                    ticket.status === 'verified' ? 'Terverifikasi' : 'Ditolak';

                const ticketName = ticket.ticket_type === 'early' ? 'Early Bird Ticket' : 'Regular Ticket';

                ticketCard.innerHTML = `
                    <div class="card card-custom h-100 position-relative">
                        <div class="position-absolute top-0 end-0 mt-3 me-3">
                            <span class="badge ${statusColor}">${statusText}</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <h5 class="fw-bold text-primary mb-1">${ticketName}</h5>
                                <p class="text-muted small mb-0"><i class="bi bi-person"></i> ${ticket.buyer_name}</p>
                            </div>
                            
                            <div class="bg-light p-3 rounded mb-3 text-center border">
                                <div class="small text-muted mb-1">Kode Pembayaran</div>
                                <div class="fs-4 fw-bold font-monospace text-primary">${ticket.payment_code}</div>
                            </div>
                            
                            <div class="d-flex justify-content-between mb-2 small">
                                <span class="text-muted">Jumlah Tiket</span>
                                <span class="fw-bold">${ticket.quantity}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3 small">
                                <span class="text-muted">Total Bayar</span>
                                <span class="fw-bold text-danger">Rp ${parseInt(ticket.total_price).toLocaleString('id-ID')}</span>
                            </div>

                            ${ticket.status === 'verified' ? `
                                <div class="p-3 border border-success rounded text-center bg-white mt-3">
                                    <div id="qr-${ticket.id}" class="d-flex justify-content-center mb-2"></div>
                                    <p class="small text-success mb-0 fw-bold"><i class="bi bi-check-circle"></i> Tiket Sah</p>
                                </div>
                            ` : ''}
                            
                            ${ticket.status === 'pending' ? `
                                <div class="alert alert-warning p-2 small text-center mb-0 mt-3 border-warning">
                                    <i class="bi bi-info-circle"></i> Selesaikan pembayaran ke <strong>${ticket.payment_method.toUpperCase()} ${ticket.payment_account}</strong>
                                </div>
                            ` : ''}
                        </div>
                    </div>
                `;

                ticketsList.appendChild(ticketCard);

                if (ticket.status === 'verified') {
                    setTimeout(() => {
                        const qrContainer = document.getElementById(`qr-${ticket.id}`);
                        if (qrContainer && qrContainer.innerHTML === '') {
                            new QRCode(qrContainer, {
                                text: `TICKET-${ticket.payment_code}-${ticket.id}`,
                                width: 100,
                                height: 100,
                                colorDark: "#0B2447",
                                colorLight: "#ffffff"
                            });
                        }
                    }, 100);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            loadMyTickets();

            const ticketOptions = document.querySelectorAll('.ticket-option');
            const selectedTicketInfo = document.getElementById('selected-ticket-info');
            const selectedTicketTypeEl = document.getElementById('selected-ticket-type');
            const ticketQuantityInput = document.getElementById('ticket-quantity');
            const decreaseBtn = document.getElementById('decrease-qty');
            const increaseBtn = document.getElementById('increase-qty');
            const paymentOptions = document.querySelectorAll('.payment-option');

            ticketOptions.forEach(option => {
                option.addEventListener('click', () => {
                    if (option.classList.contains('ticket-sold-out') || option.classList.contains('ticket-not-available')) {
                        return; // Prevent selection
                    }

                    ticketOptions.forEach(opt => {
                        opt.classList.remove('selected');
                    });

                    option.classList.add('selected');

                    selectedTicketType = option.getAttribute('data-type');
                    selectedTicketPrice = parseInt(option.getAttribute('data-price'));

                    document.getElementById('quantity-selector').classList.remove('d-none');
                    document.getElementById('continue-to-form-btn').classList.remove('d-none');
                });
            });

            const quantityDisplay = document.getElementById('ticket-quantity-display');

            decreaseBtn.addEventListener('click', () => {
                if (ticketQuantity > 1) {
                    ticketQuantity--;
                    quantityDisplay.textContent = ticketQuantity;
                }
            });

            increaseBtn.addEventListener('click', () => {
                if (ticketQuantity < 10) {
                    ticketQuantity++;
                    quantityDisplay.textContent = ticketQuantity;
                }
            });

            document.getElementById('continue-to-form-btn').addEventListener('click', () => {
                showStep(2);
            });

            document.getElementById('back-to-ticket-btn').addEventListener('click', () => {
                showStep(1);
            });

            paymentOptions.forEach(option => {
                option.addEventListener('click', async () => {
                    option.disabled = true;
                    option.classList.add('opacity-50');
                    option.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';

                    selectedPaymentMethod = option.getAttribute('data-method');
                    selectedPaymentAccount = option.getAttribute('data-account');

                    const ticketData = {
                        name: buyerData.name,
                        institution: buyerData.institution,
                        phone: buyerData.phone,
                        email: buyerData.email,
                        ticket_type: selectedTicketType,
                        quantity: ticketQuantity,
                        payment_method: selectedPaymentMethod,
                        payment_account: selectedPaymentAccount,
                    };

                    const showPaymentConfirmation = (data) => {
                        document.getElementById('payment-code-display').textContent = data.payment_code;
                        document.getElementById('final-ticket-type').textContent = selectedTicketType === 'early' ? 'Early Bird Ticket' : 'Regular Ticket';
                        document.getElementById('final-quantity').textContent = `${data.quantity} tiket`;
                        document.getElementById('final-name').textContent = data.buyer_name;
                        document.getElementById('bank-name-display').textContent = selectedPaymentMethod.toUpperCase();
                        document.getElementById('account-number-display').textContent = selectedPaymentAccount;
                        document.getElementById('final-total-payment').textContent = `Rp ${parseInt(data.total_price).toLocaleString('id-ID')}`;
                        showStep(4);
                    };

                    try {
                        const response = await fetch('/api/tickets', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify(ticketData)
                        });
                        const result = await response.json();
                        
                        if (response.ok && result.status === 201) {
                            showPaymentConfirmation(result.data);
                            loadMyTickets();
                        } else {
                            throw new Error(result.message || 'Terjadi kesalahan');
                        }
                    } catch (error) {
                        alert('Gagal memproses tiket. ' + error.message);
                        
                        // Reset button
                        option.disabled = false;
                        option.classList.remove('opacity-50');
                        option.innerHTML = `<div class="fw-bold text-dark">Bank ${selectedPaymentMethod.toUpperCase()}</div><div class="small">${selectedPaymentAccount} a/n Paskibra</div>`;
                    }
                });
            });

            document.getElementById('done-payment-btn').addEventListener('click', () => {
                document.getElementById('ticket-form').reset();
                selectedTicketType = null;
                selectedTicketPrice = 0;
                ticketQuantity = 1;
                selectedPaymentMethod = null;
                selectedPaymentAccount = null;
                buyerData = {};

                document.getElementById('ticket-quantity-display').textContent = '1';
                document.getElementById('quantity-selector').classList.add('d-none');
                document.getElementById('continue-to-form-btn').classList.add('d-none');

                ticketOptions.forEach(opt => {
                    opt.classList.remove('selected');
                });

                showStep(1);
            });

            document.getElementById('ticket-form').addEventListener('submit', (e) => {
                e.preventDefault();

                const formData = new FormData(e.target);
                buyerData = {
                    name: formData.get('name'),
                    institution: formData.get('institution'),
                    phone: formData.get('phone'),
                    email: formData.get('email')
                };

                const totalPrice = selectedTicketPrice * ticketQuantity;
                const ticketLabel = selectedTicketType === 'early' ? 'Early Bird Ticket' : 'Regular Ticket';

                document.getElementById('total-payment-display').textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                document.getElementById('ticket-type-display').textContent = ticketLabel;
                document.getElementById('ticket-qty-display').textContent = `${ticketQuantity} tiket`;

                showStep(3);
            });

            document.getElementById('back-to-form-btn').addEventListener('click', () => {
                showStep(2);
            });

            document.getElementById('contact-form').addEventListener('submit', (e) => {
                e.preventDefault();
                alert('Pesan berhasil dikirim. Terima kasih!');
                e.target.reset();
            });
        });
    </script>
</body>
</html>