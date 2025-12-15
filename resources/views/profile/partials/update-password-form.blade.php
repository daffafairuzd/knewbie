{{-- resources/views/profile/partials/update-password-form.blade.php --}}
<form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-5">
    @csrf
    @method('PUT')

    <div>
        <h2 class="text-lg font-semibold text-gray-900">Update Password</h2>
        <p class="mt-1 text-sm text-gray-500">
            Password baru harus minimal <span class="font-semibold">9 karakter</span>,
            mengandung <span class="font-semibold">huruf besar</span>, <span class="font-semibold">huruf kecil</span>,
            <span class="font-semibold">angka</span>, dan <span class="font-semibold">symbol</span>
            (misal: @ $ ! % ? &amp; ^ # - = + &lt; &gt; . ,).
        </p>
    </div>

    {{-- Current Password --}}
    <div class="flex flex-col gap-2">
        <label for="current_password" class="text-sm font-semibold text-gray-700">
            Current Password
        </label>

        <div class="relative">
            <input
                id="current_password"
                type="password"
                name="current_password"
                class="w-full py-3 px-5 pr-16 rounded-xl border border-gray-300
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                       outline-none text-sm"
                placeholder="Type your current password"
                autocomplete="current-password"
                required
            >
            <button
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-gray-500 hover:text-gray-700"
                data-toggle-password="current_password"
            >
                Show
            </button>
        </div>

        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
    </div>

    {{-- New Password --}}
    <div class="flex flex-col gap-2">
        <label for="password" class="text-sm font-semibold text-gray-700">
            New Password
        </label>

        <div class="relative">
            <input
                id="password"
                type="password"
                name="password"
                minlength="9"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&^#\-=\+<>\.,])[A-Za-z\d@$!%?&^#\-=\+<>\.,]{9,}$"
                class="w-full py-3 px-5 pr-16 rounded-xl border border-gray-300
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                       outline-none text-sm"
                placeholder="Type your new password"
                autocomplete="new-password"
                required
            >
            <button
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-gray-500 hover:text-gray-700"
                data-toggle-password="password"
            >
                Show
            </button>
        </div>

        <p class="text-xs text-gray-500">
            Minimal 9 karakter, wajib ada huruf besar, huruf kecil, angka, dan symbol.
        </p>

        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
    </div>

    {{-- Confirm Password --}}
    <div class="flex flex-col gap-2">
        <label for="password_confirmation" class="text-sm font-semibold text-gray-700">
            Confirm New Password
        </label>

        <div class="relative">
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                minlength="9"
                class="w-full py-3 px-5 pr-16 rounded-xl border border-gray-300
                       focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                       outline-none text-sm"
                placeholder="Confirm your new password"
                autocomplete="new-password"
                required
            >
            <button
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-gray-500 hover:text-gray-700"
                data-toggle-password="password_confirmation"
            >
                Show
            </button>
        </div>

        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
    </div>

    <button
        type="submit"
        class="w-full mt-2 rounded-xl py-3.5 px-6 bg-blue-600 text-white font-semibold
               hover:bg-blue-700 hover:shadow-xl transition transform hover:-translate-y-0.5 text-sm"
    >
        Save New Password
    </button>

    @if (session('status') === 'password-updated')
        <p class="text-xs text-green-600 mt-3">
            Password berhasil diperbarui.
        </p>
    @endif
</form>

<script>
    (function () {
        const buttons = document.querySelectorAll('[data-toggle-password]');

        buttons.forEach((btn) => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-toggle-password');
                const input = document.getElementById(targetId);
                if (!input) return;

                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                btn.textContent = isHidden ? 'Hide' : 'Show';
            });
        });
    })();
</script>
