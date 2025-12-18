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
    <x-nav-dashboard />
    <main class="flex justify-center py-10 flex-1 items-center">
        <div class="w-[520px] flex flex-col gap-8">
            <div class="flex flex-col gap-3">
                <div
                    class="rounded-full w-fit mx-auto py-2 px-4 bg-obito-light-green flex items-center gap-2">
                    <img src="{{ asset('assets/images/icons/crown-green.svg') }}"
                        class="w-5 h-5" alt="icon" />
                    <p class="font-bold text-sm">PRO UNLOCKED</p>
                </div>

                <h1 class="font-bold text-[28px] leading-[40px] text-center">
                    Payment Successful
                </h1>

                <p class="text-center text-obito-text-secondary leading-[26px] px-4">
                    Anda telah memiliki akses kelas materi terbaru sebagai persiapan
                    bekerja di era digital industri saat ini, yay!
                </p>
            </div>

            <section
                class="relative rounded-2xl border border-obito-grey bg-white
                    p-4 flex gap-4 items-center shadow-sm">

                <div
                    class="w-[170px] h-[120px] rounded-xl overflow-hidden shrink-0">
                    <img src="{{ asset('assets/images/thumbnails/succes-checkout.png') }}"
                        class="w-full h-full object-cover" alt="image" />
                </div>

                <div class="flex flex-col gap-2">
                    <h2 class="font-bold leading-[24px]">
                        Subscription Active:<br>
                        {{ $pricing->name }}
                    </h2>

                    <div class="flex items-center gap-2 text-sm text-obito-text-secondary">
                        <img src="{{ asset('assets/images/icons/calendar-green.svg') }}"
                            class="w-5 h-5" alt="icon">
                        <span>{{ $pricing->duration }} Months Access</span>
                    </div>

                    <div class="flex items-center gap-2 text-sm text-obito-text-secondary">
                        <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}"
                            class="w-5 h-5" alt="icon">
                        <span>Job-Ready Skills</span>
                    </div>
                </div>

                <img src="{{ asset('assets/images/icons/cup-green-fill.svg') }}"
                    class="absolute -right-6 top-1/2 -translate-y-1/2 w-12 h-12"
                    alt="icon" />
            </section>
            
            <div class="flex items-center justify-center gap-4 mt-2">
                <a href="{{ route('profile.subscriptions') }}"
                class="px-6 py-2.5 rounded-full border border-obito-grey
                        font-semibold text-sm bg-white
                        hover:border-obito-green transition">
                    My Transactions
                </a>

                <a href="{{ route('dashboard') }}"
                class="px-6 py-2.5 rounded-full
                        font-semibold text-sm text-white
                        bg-blue-600 hover:bg-blue-700
                        transition shadow-sm">
                    Start Learning
                </a>
            </div>

        </div>
    </main>
</body>

