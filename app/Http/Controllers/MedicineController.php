<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::paginate(20);
        return view('medicines.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->brand = $request->brand;
        $medicine->dosage = $request->dosage;
        $medicine->form = $request->form;
        $medicine->price = $request->price;
        $medicine->stock = $request->stock;
        $medicine->save();

        return redirect()->route('medicines.index')->with('success', 'Medicine created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        return view('medicines.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        return view('medicines.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        $medicine->name = $request->name;
        $medicine->brand = $request->brand;
        $medicine->dosage = $request->dosage;
        $medicine->form = $request->form;
        $medicine->price = $request->price;
        $medicine->stock = $request->stock;
        $medicine->save();

        return redirect()->route('medicines.index')->with('success', 'Medicine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Medicine deleted successfully');
    }
}