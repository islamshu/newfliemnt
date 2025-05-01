<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PagesList extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.pages-list';
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $title = 'صفحات الموقع';
    protected static ?string $slug = 'hiddenlinks';

}
