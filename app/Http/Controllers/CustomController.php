<?php

namespace App\Http\Controllers;

use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CustomController extends Controller
{
    public function index()
    {
        return view('filament.custom.index');
    }

    public function store(Request $request)
    {
        // عمليات الحفظ
        Notification::make()
            ->title('تم الحفظ بنجاح')
            ->success()
            ->send();

        return back();
    }
}
