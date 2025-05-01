<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

      

        <x-filament::card>
            <div class="text-center">
                <h2 class="text-xl font-bold mb-2">عدد المنتجات</h2>
                <p class="text-3xl text-primary-600">{{App\Models\Product::count()}}</p>
            </div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-center">
                <h2 class="text-xl font-bold mb-2">طلبات جديدة</h2>
                <p class="text-3xl text-primary-600">5</p>
            </div>
        </x-filament::card>

    </div>
</x-filament-panels::page>
