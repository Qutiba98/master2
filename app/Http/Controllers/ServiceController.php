<?php

namespace App\Http\Controllers;

use App\Models\PackageType;
use Illuminate\Http\Request;
use App\Models\PackagePricing;

class ServiceController extends Controller
{
    public function index()
    {
        $packageTypes = PackageType::all();
        return view('frontend.packeg.packeg', compact('packageTypes'));
    }

public function show($id)
{
    $packageType = PackageType::with('packagePricing')->findOrFail($id);
    return view('frontend.service.index', compact('packageType'));
}


public function paymentPage($id)
{
    $pricing = PackagePricing::findOrFail($id);

    return view('frontend.payment.payments', [
        'pricing' => $pricing,
        'id' => $pricing->id,          // إضافة id
        'duration' => $pricing->duration // إضافة duration
    ]);
}



}
