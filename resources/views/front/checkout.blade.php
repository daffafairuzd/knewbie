<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <title>CheckOut - Knewbie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F0F4F8;
        }
        
        .card-shadow {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
        
        .card-hover:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }
    </style>
</head>
<body class="min-h-screen ">
    <x-nav-dashboard/>
    <div class="max-w-5xl mx-auto px-4 md:px-6">
        
        <!-- Title -->
        <h1 class="text-2xl md:text-3xl font-bold text-blue-600 text-center my-14 md:mb-10">
            CheckOut
        </h1>

        <!-- Account Information -->
        <div class="mb-6">
            <h2 class="text-base md:text-lg font-semibold mb-3">Account Information</h2>
            <div class="bg-white rounded-2xl p-4 md:p-5 card-shadow card-hover transition-shadow">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3 md:gap-4">
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" 
                             alt="User Photo" 
                             class="w-12 h-12 md:w-14 md:h-14 rounded-full object-cover">
                        <div>
                            <h3 class="font-semibold text-base md:text-lg">{{ Auth::user()->name }}</h3>
                            <p class="text-sm text-gray-500">{{ Auth::user()->occupation }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail Benefit -->
        <div class="mb-6">
            <h2 class="text-base md:text-lg font-semibold mb-3">Detail Benefit</h2>
            <div class="bg-white rounded-2xl p-5 md:p-6 card-shadow">
                <h3 class="font-bold text-lg md:text-xl mb-4">{{ $pricing->name }}</h3>
                
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center border-2 border-blue-600 rounded">
                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <span class="text-sm md:text-base text-gray-700">Access Full Class</span>
                        </div>
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-5 h-5 flex items-center justify-center border-2 border-blue-600 rounded">
                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path>
                                </svg>
                            </div>
                            <span class="text-sm md:text-base text-gray-700">Learning Packet</span>
                        </div>
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>

                </div>
            </div>
        </div>

        <!-- Detail Transaction -->
        <div class="mb-8">
            <h2 class="text-base md:text-lg font-semibold mb-3">Detail Transaction</h2>
            <div class="bg-white rounded-2xl p-5 md:p-6 card-shadow">
                <div class="space-y-3 md:space-y-3.5">
                    <div class="flex items-center justify-between text-sm md:text-base">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                            </svg>
                            <span>Subscription</span>
                        </div>
                        <span class="font-medium">Rp. {{ number_format($pricing->price, 0, '', '.') }}</span>
                    </div>

                    <div class="flex items-center justify-between text-sm md:text-base">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                            </svg>
                            <span>Access Duration</span>
                        </div>
                        <span class="font-medium">{{ $pricing->duration }} Months</span>
                    </div>

                    <div class="flex items-center justify-between text-sm md:text-base">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                            </svg>
                            <span>Started At</span>
                        </div>
                        <span class="font-medium">{{ $started_at->format('d M, Y') }}</span>
                    </div>

                    <div class="flex items-center justify-between text-sm md:text-base">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                            </svg>
                            <span>Ended At</span>
                        </div>
                        <span class="font-medium">{{ $ended_at->format('d M, Y') }}</span>
                    </div>

                    <div class="flex items-center justify-between text-sm md:text-base">
                        <div class="flex items-center gap-2 text-gray-600">
                            <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                            </svg>
                            <span>PPN 11%</span>
                        </div>
                        <span class="font-medium">Rp. {{ number_format($total_tax_amount, 0, '', '.') }}</span>
                    </div>

                    <div class="border-t border-gray-200 pt-3 mt-2">
                        <div class="flex items-center justify-between text-sm md:text-base">
                            <div class="flex items-center gap-2 text-gray-600">
                                <svg class="w-4 h-4 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <rect x="3" y="3" width="14" height="3" rx="1"></rect>
                                    <rect x="3" y="8" width="14" height="3" rx="1"></rect>
                                    <rect x="3" y="13" width="14" height="3" rx="1"></rect>
                                </svg>
                                <span class="font-semibold">Total</span>
                            </div>
                            <span class="font-bold text-blue-600 text-base md:text-lg">
                                Rp. {{ number_format($grand_total_amount, 0, '', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex items-center justify-end gap-4 my-8 ">
            <!-- Back -->
            <a href="{{ url('/pricing') }}"
            class="h-[46px] px-16 rounded-full border border-gray-300
                    flex items-center justify-center
                    text-gray-700 font-semibold text-sm
                    hover:bg-gray-50 transition">
                Back
            </a>

            <!-- Payment -->
            <form action="#" method="POST">
                @csrf
                <input type="text" hidden name="package_id" value="Midtrans">
                <button id="pay-button" type="submit"
                        class="h-[46px] px-16 rounded-full
                            bg-blue-600 text-white font-semibold text-sm
                            hover:bg-blue-700 transition shadow-sm">
                    Payment
                </button>
            </form>
        </div>
    </div>
    <footer class="bg-[#0E1E46] text-white mt-20">
            <div class="max-w-6xl mx-auto px-6 md:px-10 lg:px-0 py-10">

                <div class="flex flex-col md:flex-row items-start justify-between gap-8">

                    {{-- Left --}}
                    <div class="space-y-3 max-w-sm">
                        <h3 class="text-2xl font-bold">KNewbie</h3>
                        <p class="text-sm leading-relaxed text-white/80">
                            Platform pembelajaran interaktif untuk membantu kamu menjadi expert dari basic.
                        </p>
                    </div>
                </div>

                <div class="border-t border-white/10 mt-10 pt-6 text-center text-xs text-white/60">
                    © {{ date('Y') }} KNewbie — All rights reserved.
                </div>

            </div>
    </footer>
</body>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.clientKey') }}"></script>

    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function(e) {
            e.preventDefault();
            // Fetch the Snap token from your backend
            fetch('{{ route("front.payment_store_midtrans") }}', {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                    },
                    body: JSON.stringify({
                        // Any additional data you want to send with the request
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snap_token) {
                        // Trigger Midtrans Snap payment popup
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                window.location.href = "{{ route('front.checkout.success') }}";
                            },
                            onPending: function(result) {
                                alert('Payment pending!');
                                window.location.href = "{{ route('front.index') }}";
                            },
                            onError: function(result) {
                                alert('Payment failed: ' + result.status_message);
                                window.location.href = "{{ route('front.index') }}";
                            },
                            onClose: function() {
                                alert('Payment popup closed');
                                window.location.href = "{{ route('front.index') }}";
                            }
                        });
                    } else {
                        alert('Error: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</html>