<form method="post" action="{{ route('profile.update') }}" class="space-y-4">
    @csrf
    @method('patch')

    <div>
        <h2 class="text-lg font-semibold text-gray-900">Update Occupation</h2>
        <p class="mt-1 text-sm text-gray-500">
            Atur pekerjaan atau status kamu sekarang, misalnya: Student, Developer, Designer, dll.
        </p>
    </div>

    <div class="space-y-1">
        <label for="occupation" class="text-sm font-medium text-gray-700">
            Occupation
        </label>

        <input
            id="occupation"
            name="occupation"
            type="text"
            value="{{ old('occupation', $user->occupation) }}"
            class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            placeholder="Contoh: Student, Developer, UI/UX Designer"
        >

        @error('occupation')
            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="pt-2">
        <button
            type="submit"
            class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white
                   text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2
                   focus:ring-offset-2 focus:ring-blue-500"
        >
            Save
        </button>
    </div>

    @if (session('status') === 'profile-updated')
        <p class="text-xs text-green-600 mt-2">
            Occupation berhasil diperbarui.
        </p>
    @endif
</form>
