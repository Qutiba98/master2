<?php

namespace App\Http\Controllers;

use App\Models\PackageType;
use App\Models\PackagePricing;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = PackageType::with('pricing')->get();
        return view('admin.transfers.index', compact('transfers'));
    }

    public function create()
    {
return view('admin.transfer.create_transfer');    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|in:Sea,Air,Land',
            'dimensions' => 'required|in:By Ship,By Air,By Truck',
            'price_1_month' => 'required|numeric',
            'space_dimensions_1_month' => 'required|string',
            'max_items_1_month' => 'required|integer',
            'surveillance_1_month' => 'required|in:yes,no',
            'rental_duration_1_month' => 'required|string',
            'delivery_service_1_month' => 'required|in:yes,no',
            'usage_rules_1_month' => 'required|string',
            'price_6_month' => 'required|numeric',
            'space_dimensions_6_month' => 'required|string',
            'max_items_6_month' => 'required|integer',
            'surveillance_6_month' => 'required|in:yes,no',
            'rental_duration_6_month' => 'required|string',
            'delivery_service_6_month' => 'required|in:yes,no',
            'usage_rules_6_month' => 'required|string',
            'price_1_year' => 'required|numeric',
            'space_dimensions_1_year' => 'required|string',
            'max_items_1_year' => 'required|integer',
            'surveillance_1_year' => 'required|in:yes,no',
            'rental_duration_1_year' => 'required|string',
            'delivery_service_1_year' => 'required|in:yes,no',
            'usage_rules_1_year' => 'required|string',
        ]);

        $packageType = PackageType::create([
            'name' => $validatedData['name'],
            'dimensions' => $validatedData['dimensions'],
        ]);

        $this->createPackagePricing($packageType->id, $validatedData);

    return redirect()->back()->with('success', 'Transfer type updated successfully.');
    }

    protected function createPackagePricing($packageTypeId, $validatedData)
    {
        PackagePricing::create([
            'package_type_id' => $packageTypeId,
            'price' => $validatedData['price_1_month'],
            'duration' => 'month_1',
            'space_dimensions' => $validatedData['space_dimensions_1_month'],
            'max_items' => $validatedData['max_items_1_month'],
            'surveillance' => $validatedData['surveillance_1_month'],
            'rental_duration' => $validatedData['rental_duration_1_month'],
            'delivery_service' => $validatedData['delivery_service_1_month'],
            'usage_rules' => $validatedData['usage_rules_1_month'],
        ]);

        PackagePricing::create([
            'package_type_id' => $packageTypeId,
            'price' => $validatedData['price_6_month'],
            'duration' => 'month_6',
            'space_dimensions' => $validatedData['space_dimensions_6_month'],
            'max_items' => $validatedData['max_items_6_month'],
            'surveillance' => $validatedData['surveillance_6_month'],
            'rental_duration' => $validatedData['rental_duration_6_month'],
            'delivery_service' => $validatedData['delivery_service_6_month'],
            'usage_rules' => $validatedData['usage_rules_6_month'],
        ]);

        PackagePricing::create([
            'package_type_id' => $packageTypeId,
            'price' => $validatedData['price_1_year'],
            'duration' => 'year_1',
            'space_dimensions' => $validatedData['space_dimensions_1_year'],
            'max_items' => $validatedData['max_items_1_year'],
            'surveillance' => $validatedData['surveillance_1_year'],
            'rental_duration' => $validatedData['rental_duration_1_year'],
            'delivery_service' => $validatedData['delivery_service_1_year'],
            'usage_rules' => $validatedData['usage_rules_1_year'],
        ]);
    }

    public function edit($id)
    {
        $transfer = PackageType::with('pricing')->findOrFail($id);
        return view('admin.transfers.edit', compact('transfer'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|in:Sea,Air,Land',
            'dimensions' => 'required|in:By Ship,By Air,By Truck',
            'price_1_month' => 'required|numeric',
            'space_dimensions_1_month' => 'required|string',
            'max_items_1_month' => 'required|integer',
            'surveillance_1_month' => 'required|in:yes,no',
            'rental_duration_1_month' => 'required|string',
            'delivery_service_1_month' => 'required|in:yes,no',
            'usage_rules_1_month' => 'required|string',
            'price_6_month' => 'required|numeric',
            'space_dimensions_6_month' => 'required|string',
            'max_items_6_month' => 'required|integer',
            'surveillance_6_month' => 'required|in:yes,no',
            'rental_duration_6_month' => 'required|string',
            'delivery_service_6_month' => 'required|in:yes,no',
            'usage_rules_6_month' => 'required|string',
            'price_1_year' => 'required|numeric',
            'space_dimensions_1_year' => 'required|string',
            'max_items_1_year' => 'required|integer',
            'surveillance_1_year' => 'required|in:yes,no',
            'rental_duration_1_year' => 'required|string',
            'delivery_service_1_year' => 'required|in:yes,no',
            'usage_rules_1_year' => 'required|string',
        ]);

        $packageType = PackageType::findOrFail($id);
        $packageType->update([
            'name' => $validatedData['name'],
            'dimensions' => $validatedData['dimensions'],
        ]);

        $this->updatePackagePricing($packageType->id, $validatedData);

        return redirect()->route('admin.transfers.index')->with('success', 'Transfer type updated successfully.');
    }

    protected function updatePackagePricing($packageTypeId, $validatedData)
    {
        PackagePricing::where('package_type_id', $packageTypeId)->where('duration', 'month_1')->update([
            'price' => $validatedData['price_1_month'],
            'space_dimensions' => $validatedData['space_dimensions_1_month'],
            'max_items' => $validatedData['max_items_1_month'],
            'surveillance' => $validatedData['surveillance_1_month'],
            'rental_duration' => $validatedData['rental_duration_1_month'],
            'delivery_service' => $validatedData['delivery_service_1_month'],
            'usage_rules' => $validatedData['usage_rules_1_month'],
        ]);

        PackagePricing::where('package_type_id', $packageTypeId)->where('duration', 'month_6')->update([
            'price' => $validatedData['price_6_month'],
            'space_dimensions' => $validatedData['space_dimensions_6_month'],
            'max_items' => $validatedData['max_items_6_month'],
            'surveillance' => $validatedData['surveillance_6_month'],
            'rental_duration' => $validatedData['rental_duration_6_month'],
            'delivery_service' => $validatedData['delivery_service_6_month'],
            'usage_rules' => $validatedData['usage_rules_6_month'],
        ]);

        PackagePricing::where('package_type_id', $packageTypeId)->where('duration', 'year_1')->update([
            'price' => $validatedData['price_1_year'],
            'space_dimensions' => $validatedData['space_dimensions_1_year'],
            'max_items' => $validatedData['max_items_1_year'],
            'surveillance' => $validatedData['surveillance_1_year'],
            'rental_duration' => $validatedData['rental_duration_1_year'],
            'delivery_service' => $validatedData['delivery_service_1_year'],
            'usage_rules' => $validatedData['usage_rules_1_year'],
        ]);
    }

    public function destroy($id)
    {
        $packageType = PackageType::findOrFail($id);
        $packageType->pricing()->delete(); 
        $packageType->delete(); 

        return redirect()->route('admin.transfers.index')->with('success', 'Transfer type deleted successfully.');
    }
}
