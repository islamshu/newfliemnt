<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting as ModelsSetting;
use Filament\Resources\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use App\Models\SettingData; // تأكد أن لديك هذا الموديل أو أنشئه

class Setting extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $resource = SettingResource::class;

    protected static string $view = 'filament.resources.setting-data-resource.pages.setting-data-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Setting::first()?->toArray() ?? []
        );
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('site_name')
                ->label('اسم الموقع')
                ->required(),
            Forms\Components\Textarea::make('site_description')
                ->label('وصف الموقع')
                ->required(),
            // أضف أي حقول تريدها هنا
        ];
    }

    public function save()
    {
        ModelsSetting::updateOrCreate(
            ['id' => 1], // أو حسب الحاجة
            $this->form->getState()
        );

        $this->notify('success', 'تم حفظ البيانات بنجاح.');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('حفظ')
                ->action('save'),
        ];
    }
}
