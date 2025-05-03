<x-filament-panels::page>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
            <!-- Card Header -->
            <div class="bg-primary-600 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-white">تحديث إعدادات السوشل ميديا</h2>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <form action="{{ route('filament.admin.settings.generral.add') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf


                    <!-- Contact Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="email" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            البريد الإلكتروني
                        </label>
                        <div class="md:col-span-2">
                            <input type="email" id="email" name="general[email]"
                                value="{{ get_general_value('email') ?? old('general.email') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="example@domain.com">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="phone" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            رقم الهاتف
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="phone" name="general[phone]"
                                value="{{ get_general_value('phone') ?? old('general.phone') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="أدخل رقم الهاتف">
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="facebook" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            فيسبوك
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="facebook" name="general[facebook]"
                                value="{{ get_general_value('facebook') ?? old('general.facebook') }}"
                                class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-900 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm"
                                placeholder="رابط صفحة الفيسبوك">
                        </div>
                    </div>


                    <!-- باقي روابط السوشيال ميديا بنفس الطريقة -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="twitter" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            تويتر
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="twitter" name="general[twitter]"
                                value="{{ get_general_value('twitter') ?? old('general.twitter') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط حساب تويتر">
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="whatsapp" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            واتساب
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="whatsapp" name="general[whatsapp]"
                                value="{{ get_general_value('whatsapp') ?? old('general.whatsapp') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط رقم الواتساب">
                        </div>
                    </div>

                    <!-- Instagram -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="instagram" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            انستغرام
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="instagram" name="general[instagram]"
                                value="{{ get_general_value('instagram') ?? old('general.instagram') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط حساب انستغرام">
                        </div>
                    </div>

                    <!-- YouTube -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="youtube" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            يوتيوب
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="youtube" name="general[youtube]"
                                value="{{ get_general_value('youtube') ?? old('general.youtube') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط قناة اليوتيوب">
                        </div>
                    </div>

                    <!-- Snapchat -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="snapchat" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            سناب شات
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="snapchat" name="general[snapchat]"
                                value="{{ get_general_value('snapchat') ?? old('general.snapchat') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط حساب سناب شات">
                        </div>
                    </div>

                    <!-- TikTok -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="tiktok" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            تيك توك
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="tiktok" name="general[tiktok]"
                                value="{{ get_general_value('tiktok') ?? old('general.tiktok') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                placeholder="رابط حساب تيك توك">
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                            حفظ التغييرات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('web_logo').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                previewContainer.classList.add('hidden');
                previewImage.src = '';
            }
        });
    </script>
</x-filament-panels::page>
