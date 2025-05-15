<?php

namespace App\Http\Controllers;

use App\Models\GeneralInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GeneralController extends Controller
{
    

public function add_general(Request $request)
{
    // معالجة الملفات المرفوعة
    if ($request->has('general_file')) {
        foreach ($request->file('general_file', []) as $name => $file) {
            if ($file && $file->isValid()) {
               
                // توليد اسم فريد للملف
                $filename = Str::random(40) . '.' . $file->getClientOriginalExtension();
                
                // تخزين الملف في storage/app/public
                $path = $file->storeAs('general', $filename, 'public');
                
                // حفظ المسار في قاعدة البيانات
                GeneralInfo::setValue($name, $path);
            }
        }
    }

    // معالجة القيم النصية
    if ($request->has('general')) {
        foreach ($request->input('general', []) as $name => $value) {
            if ($value !== null) {
                GeneralInfo::setValue($name, $value);
            }
        }
    }

    return redirect()->back()->with(['success' => trans('تم التعديل بنجاح')]);
}
public function upload_file(Request $request)
{
    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('uploads/temp', 'public'); // Save to public disk
        $url = Storage::disk('public')->url($path);
        return response()->json(['url' => $url]);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
}
}
