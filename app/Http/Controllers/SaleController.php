<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Medicine;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('medicine')->paginate(20); // Đảm bảo có dữ liệu thuốc kèm theo
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all(); // Lấy danh sách thuốc để chọn
        return view('sales.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity' => 'required|integer',
            'sale_date' => 'required|date',
            'customer_phone' => 'required|string|max:255',
        ]);

        $sale = new Sale();
        $sale->medicine_id = $request->medicine_id;
        $sale->quantity = $request->quantity;
        $sale->sale_date = $request->sale_date;
        $sale->customer_phone = $request->customer_phone;
        $sale->save();

        return redirect()->route('sales.index')->with('success', 'Sale created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $medicines = Medicine::all(); // Lấy danh sách thuốc để chọn
        return view('sales.edit', compact('sale', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity' => 'required|integer',
            'sale_date' => 'required|date',
            'customer_phone' => 'required|string|max:255',
        ]);

        $sale->medicine_id = $request->medicine_id;
        $sale->quantity = $request->quantity;
        $sale->sale_date = $request->sale_date;
        $sale->customer_phone = $request->customer_phone;
        $sale->save();

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully');
    }
}