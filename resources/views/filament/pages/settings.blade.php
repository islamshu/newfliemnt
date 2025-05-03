<x-filament-panels::page>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
            <!-- Card Header -->
            <div class="bg-primary-600 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-white">تحديث إعدادات الموقع</h2>
            </div>
            
            <!-- Card Body -->
            <div class="p-6">
                <form action="{{ route('filament.admin.settings.generral.add') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    
                    <!-- Website Basic Info -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="website_name" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            اسم الموقع (عربي)
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="website_name" name="general[website_name]" 
                                   value="{{ get_general_value('website_name') ?? old('general.website_name') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                   placeholder="أدخل اسم الموقع بالعربية">
                        </div>
                    </div>
                
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="website_name_en" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            اسم الموقع (إنجليزي)
                        </label>
                        <div class="md:col-span-2">
                            <input type="text" id="website_name_en" name="general[website_name_en]" 
                                   value="{{ get_general_value('website_name_en') ?? old('general.website_name_en') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
                                   placeholder="أدخل اسم الموقع بالإنجليزية">
                        </div>
                    </div>
                
                    <!-- Website Logo -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="web_logo" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            شعار الموقع
                        </label>
                        <div class="md:col-span-2">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center gap-4">
                                    @if($currentLogo = get_general_value('web_logo'))
                                        <div class="flex-shrink-0">
                                            <img id="currentLogo" src="{{ asset('storage/' . $currentLogo) }}" alt="شعار الموقع الحالي" class="h-16 w-16 rounded-md object-cover">
                                        </div>
                                    @endif
                                    
                                    <label class="block">
                                        <span class="sr-only">اختر ملف</span>
                                        <input type="file" id="web_logo" name="general_file[web_logo]"
                                               class="block w-full text-sm text-gray-500 dark:text-gray-400
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-semibold
                                                      file:bg-primary-50 file:text-primary-700 dark:file:bg-gray-700 dark:file:text-primary-300
                                                      hover:file:bg-primary-100 dark:hover:file:bg-gray-600">
                                    </label>
                                </div>
                    
                                <!-- مكان ظهور معاينة الصورة -->
                                <div id="previewContainer" class="hidden mt-2">
                                    <img id="previewImage" src="" class="h-16 w-16 rounded-md object-cover" alt="معاينة الشعار الجديد">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="segnature" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            شعار الموقع
                        </label>
                        <div class="md:col-span-2">
                            <div class="flex flex-col gap-4">
                                <div class="flex items-center gap-4">
                                    @if($segnatureLogo = get_general_value('segnature'))
                                        <div class="flex-shrink-0">
                                            <img id="segnatureLogo" src="{{ asset('storage/' . $segnatureLogo) }}" alt="شعار الموقع الحالي" class="h-16 w-16 rounded-md object-cover">
                                        </div>
                                    @endif
                                    
                                    <label class="block">
                                        <span class="sr-only">اختر ملف</span>
                                        <input type="file" id="segnature" name="general_file[segnature]"
                                               class="block w-full text-sm text-gray-500 dark:text-gray-400
                                                      file:mr-4 file:py-2 file:px-4
                                                      file:rounded-md file:border-0
                                                      file:text-sm file:font-semibold
                                                      file:bg-primary-50 file:text-primary-700 dark:file:bg-gray-700 dark:file:text-primary-300
                                                      hover:file:bg-primary-100 dark:hover:file:bg-gray-600">
                                    </label>
                                </div>
                    
                                <!-- مكان ظهور معاينة الصورة -->
                                <div id="previewContainer" class="hidden mt-2">
                                    <img id="previewImage" src="" class="h-16 w-16 rounded-md object-cover" alt="معاينة الشعار الجديد">
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <!-- سكربت المعاينة -->
                   
                
                    <!-- Colors -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="primary_color" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            اللون الأساسي
                        </label>
                        <div class="md:col-span-2">
                            <input type="color" id="primary_color" name="general[primary_color]" 
                                   value="{{ get_general_value('primary_color') ?? old('general.primary_color') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500 h-10">
                        </div>
                    </div>
                
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                        <label for="forgin_color" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
                            اللون الثانوي
                        </label>
                        <div class="md:col-span-2">
                            <input type="color" id="forgin_color" name="general[forgin_color]" 
                                   value="{{ get_general_value('forgin_color') ?? old('general.forgin_color') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500 h-10">
                        </div>
                    </div>
                
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
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
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

<!-- العملة -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
    <label for="currancy" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
        العملة
    </label>
    <div class="md:col-span-2">
        <select name="general[currancy]" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500" id="">
           <option value="" selected disabled>اختر</option>
            <option value="ر.س" @if(get_general_value('currancy') == 'ر.س') selected @endif>ريال سعودي</option>
            <option value="$" @if(get_general_value('currancy') == '$') selected @endif>دولار امريكي</option>
            <option value="د.إ" @if(get_general_value('currancy') == 'د.إ') selected @endif >درهم إماراتي</option>
        
        </select>
     
    </div>
</div>

<!-- التوقيع -->


<!-- الدفعة -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
    <label for="batch" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
        ٌقيمة الدفعة الاولى

    </label>
    <div class="md:col-span-2">
        <input type="text" id="batch" name="general[batch]" 
               value="{{ get_general_value('batch') ?? old('general.batch') }}"
               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
               placeholder="أدخل الدفعة الاولى">
    </div>
</div>

<!-- الرقم الضريبي -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
    <label for="number_dareba" class="text-sm font-medium text-gray-900 dark:text-gray-300 pt-2">
        الرقم الضريبي
    </label>
    <div class="md:col-span-2">
        <input type="text" id="number_dareba" name="general[number_dareba]" 
               value="{{ get_general_value('number_dareba') ?? old('general.number_dareba') }}"
               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"
               placeholder="أدخل الرقم الضريبي">
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
        document.getElementById('web_logo').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
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