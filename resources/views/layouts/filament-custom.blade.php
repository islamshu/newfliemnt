@extends('filament-panels::layouts.base')

@section('content')
    <x-filament-panels::page>
        <x-filament::section heading="واجهتي المخصصة" icon="heroicon-o-document-text">
            <div dir="rtl" class="space-y-4">
                <h2 class="text-xl font-bold">{{ $title }}</h2>
                
                <p>بيانات المثال: {{ $data['key'] }}</p>
                
                <form method="POST" action="{{ route('filament.custom.store') }}">
                    @csrf
                    
                    <x-filament::input.wrapper>
                        <x-filament::input.text 
                            name="input_field" 
                            placeholder="أدخل البيانات هنا" 
                        />
                    </x-filament::input.wrapper>
                    
                    <x-filament::button type="submit" class="mt-4">
                        حفظ البيانات
                    </x-filament::button>
                </form>
            </div>
        </x-filament::section>
    </x-filament-panels::page>
@endsection