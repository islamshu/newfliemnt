<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
        <label for="web_logo" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
            رفع ملف
        </label>
        <div class="md:col-span-2 space-y-2">
            <!-- Loader -->
            <div id="loader" class="hidden text-sm text-blue-600 flex items-center gap-2">
                <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8v4l3.5-3.5L12 0v4a8 8 0 000 16v4l3.5-3.5L12 20v-4a8 8 0 01-8-8z" />
                </svg>
                جاري رفع الملف...
            </div>

            <!-- Uploaded File URL Preview -->
            <div id="fileUrlPreview" class="hidden">
                <label class="block mb-1 text-green-600">رابط الملف:</label>
                <div class="flex items-center gap-2">
                    <input type="text" id="fileUrlInput" readonly
                        class="w-full text-sm rounded-md border border-gray-300 dark:border-gray-600 dark:bg-gray-800 p-2"
                        value="">
                    <button type="button" onclick="copyFileUrl()"
                        class="px-3 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">
                        نسخ
                    </button>
                </div>
            </div>

            <!-- File Input -->
            <input type="file" id="web_logo" name="web_logo"
                class="block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500" />
        </div>
    </div>

    <script>
        function copyFileUrl() {
            const input = document.getElementById("fileUrlInput");
            input.select();
            input.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand("copy");
        }

        document.getElementById('web_logo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const fileUrlPreview = document.getElementById('fileUrlPreview');
            const fileUrlInput = document.getElementById('fileUrlInput');
            const loader = document.getElementById('loader');

            fileUrlPreview.classList.add('hidden');
            loader.classList.remove('hidden');

            if (file) {
                const formData = new FormData();
                formData.append('file', file);
                formData.append('_token', '{{ csrf_token() }}');

                fetch("{{ route('filament.admin.upload.temp.file') }}", {
                    method: "POST",
                    body: formData,
                })
                    .then(response => response.json())
                    .then(data => {
                        loader.classList.add('hidden');

                        if (data.url) {
                            fileUrlInput.value = data.url;
                            fileUrlPreview.classList.remove('hidden');
                        }
                    })
                    .catch(error => {
                        loader.classList.add('hidden');
                        fileUrlPreview.innerHTML = `<span class="text-red-600">فشل في رفع الملف</span>`;
                        fileUrlPreview.classList.remove('hidden');
                    });
            }
        });
    </script>
</x-filament-panels::page>
