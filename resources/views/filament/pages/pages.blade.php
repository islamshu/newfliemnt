<x-filament-panels::page>
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden">
            <!-- Card Header -->
            <div class="bg-primary-600 px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-white">تحديث الصفحات</h2>
            </div>

            <!-- Card Body -->
            <div class="p-6">
                <form action="{{ route('filament.admin.settings.generral.add') }}" method="POST"
                    enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    @php
                        $fields = [
                            'confirm' => 'صفحة الضمان والاستبدال',
                            'return' => 'صفحة استرجاع الطلبات',
                            'about_us' => 'من نحن',
                            'term' => 'الشروط والاحكام',
                            'ship' => 'الشحن والتوصيل',
                            'pay' => 'طرق الدفع',
                            'safe' => 'خدمة الحماية الشاملة',
                        ];
                    @endphp

                    @foreach ($fields as $field => $label)
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-start">
                            <label for="{{ $field }}"
                                class="block text-sm font-medium text-white dark:text-gray-300 md:pt-2">
                                {{ $label }}
                            </label>
                            <div class="md:col-span-2">
                                <textarea id="{{ $field }}" name="general[{{ $field }}]"
                                    class="editor custom-textarea mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300
                                    focus:border-primary-500 focus:ring focus:ring-primary-500 focus:ring-opacity-50 text-sm"
                                    placeholder="اكتب نبذة عن الموقع...">{{ old("general.$field", get_general_value($field)) }}</textarea>
                            </div>
                        </div>
                    @endforeach

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

    <style>
        .custom-textarea {
            height: 300px;
            /* ارتفاع التكسيت ايريا */
            min-height: 300px;
            max-height: 500px;
            resize: vertical
                /* السماح بتغيير الارتفاع فقط */
        }
        .cke_notifications_area{
            display: none !important;
        }

        ;
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        // تهيئة CKEditor لكل عنصر بمحرف editor
        $('.editor').each(function() {
            CKEDITOR.replace(this);
        });
        
        $("#form").submit(function(e) {
            var messageLength = CKEDITOR.instances['body'].getData().replace(/<[^>]*>/gi, '').length;
            if (!messageLength) {
                swal({
                    title: `يرجى اضافة وصف`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
                e.preventDefault();
            }
        });
    });
    </script>


</x-filament-panels::page>
