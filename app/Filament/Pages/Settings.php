<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Models\GeneralInfo;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Actions\Modal\Actions\ButtonAction;

class Settings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // أيقونة الإعدادات
    protected static string $view = 'filament.pages.settings'; // الفيو الخاص بالصفحة
    protected static ?string $slug = 'data-setting'; // الفيو الخاص بالصفحة
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $title = 'إعدادات الموقع'; // عنوان الصفحة
    protected static ?string $navigationGroup = 'الإعدادات'; // مجموعة التنقل

  
   
}
