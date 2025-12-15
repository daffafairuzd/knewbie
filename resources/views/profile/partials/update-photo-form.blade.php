{{-- resources/views/profile/partials/update-photo-form.blade.php --}}
@php
    $photoPath = $user->photo ?? null;
    $photoUrl  = $photoPath
        ? asset('storage/' . $photoPath)
        : asset('assets/images/photos/default-avatar.png');
@endphp

<form method="post"
      action="{{ route('profile.update') }}"
      enctype="multipart/form-data"
      class="space-y-4">
    @csrf
    @method('patch')

    <div>
        <h2 class="text-lg font-semibold text-gray-900">Update Profile Photo</h2>
        <p class="mt-1 text-sm text-gray-500">
            Unggah foto profil baru. Gunakan gambar dengan rasio persegi agar tampilan lebih rapi.
        </p>
    </div>

    {{-- Current photo preview --}}
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 rounded-full overflow-hidden border border-gray-200">
            <img
                id="photo-preview"
                src="{{ $photoUrl }}"
                alt="Current photo"
                class="w-full h-full object-cover"
            >
        </div>
        <p class="text-xs text-gray-500">
            Ini adalah foto profil kamu saat ini.
        </p>
    </div>

    {{-- Drag & drop area --}}
    <div
        id="photo-dropzone"
        class="mt-3 border-2 border-dashed border-gray-300 rounded-xl px-4 py-6
               flex flex-col items-center justify-center gap-2 text-center
               cursor-pointer bg-gray-50 hover:bg-gray-100 transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M3 16.5V8.25A2.25 2.25 0 015.25 6h4.378a2.25 2.25 0 011.59.659l1.823 1.823a2.25 2.25 0 001.591.659h2.118A2.25 2.25 0 0121 11.391V16.5A2.25 2.25 0 0118.75 18.75H5.25A2.25 2.25 0 013 16.5z" />
        </svg>

        <p class="text-sm font-medium text-gray-700">
            Drag & drop foto ke sini
        </p>
        <p class="text-xs text-gray-500">
            atau
        </p>

        <button
            type="button"
            id="photo-browse-btn"
            class="mt-1 inline-flex items-center px-3 py-1.5 rounded-lg bg-blue-600 text-white
                   text-xs font-semibold hover:bg-blue-700"
        >
            Browse from computer
        </button>

        <p id="photo-file-name" class="mt-2 text-xs text-gray-500"></p>

        <input
            id="photo-input"
            name="photo"
            type="file"
            accept="image/*"
            class="hidden"
        >
    </div>

    @error('photo')
        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
    @enderror

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
            Foto profil berhasil diperbarui.
        </p>
    @endif
</form>

<script>
    (function () {
        const dropzone   = document.getElementById('photo-dropzone');
        const fileInput  = document.getElementById('photo-input');
        const browseBtn  = document.getElementById('photo-browse-btn');
        const fileNameEl = document.getElementById('photo-file-name');
        const previewImg = document.getElementById('photo-preview');

        if (!dropzone || !fileInput) return;

        function setFile(file) {
            if (!file) return;
            const dt = new DataTransfer();
            dt.items.add(file);
            fileInput.files = dt.files;

            fileNameEl.textContent = file.name;

            const reader = new FileReader();
            reader.onload = function (e) {
                if (previewImg) {
                    previewImg.src = e.target.result;
                }
            };
            reader.readAsDataURL(file);
        }

        browseBtn.addEventListener('click', function () {
            fileInput.click();
        });

        dropzone.addEventListener('click', function (e) {
            if (e.target === browseBtn) return;
            fileInput.click();
        });

        fileInput.addEventListener('change', function () {
            const file = this.files[0];
            setFile(file);
        });

        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('bg-blue-50', 'border-blue-400');
        });

        dropzone.addEventListener('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('bg-blue-50', 'border-blue-400');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('bg-blue-50', 'border-blue-400');

            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                setFile(file);
            }
        });
    })();
</script>
