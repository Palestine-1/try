<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BirthCertificateController extends Controller
{
public function search(Request $request)
{

    $nationalId = $request->input('national_id');
    // dd($nationalId);


    $user = Auth::user();

    if (!$user) {
        return back()->with('error', 'يجب تسجيل الدخول أولاً.');
    }

    if ((string) $user->national_id !== (string) $nationalId) {
        return back()->with('error', 'هذا الرقم القومي غير خاص بك.');
    }



    $birthCertificate = User::where('national_id', $nationalId)->first();

    if ($birthCertificate) {
        return view('main.resuly', ['birthCertificate' => $birthCertificate]);
    } else {
        return back()->with('error', 'لا يوجد سجل بهذا الرقم القومي.');
    }
}


//search in national id
public function searchID(Request $request)
{

    $nationalId = $request->input('national_id');


    $user = Auth::user();

    if (!$user) {
        return back()->with('error', 'يجب تسجيل الدخول أولاً.');
    }

    if ((string) $user->national_id !== (string) $nationalId) {
        return back()->with('error', 'هذا الرقم القومي غير خاص بك.');
    }



    $birthCertificate = User::where('national_id', $nationalId)->first();

    if ($birthCertificate) {
        return view('main.resultid', ['birthCertificate' => $birthCertificate]);
    } else {
        return back()->with('error', 'لا يوجد سجل بهذا الرقم القومي.');
    }
}
}
