<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Pages\Page;
use App\Models\GeneralInfo;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Actions\Modal\Actions\ButtonAction;

class Social extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog'; // أيقونة الإعدادات
    protected static string $view = 'filament.pages.social'; // الفيو الخاص بالصفحة
    protected static ?string $slug = 'data-social'; // الفيو الخاص بالصفحة
    protected static bool $shouldRegisterNavigation = true;
    protected static ?string $title = 'بيانات السوشل ميديا'; // عنوان الصفحة
    protected static ?string $navigationGroup = 'بيانات السوشل ميديا';// مجموعة التنقل

  
   
}
