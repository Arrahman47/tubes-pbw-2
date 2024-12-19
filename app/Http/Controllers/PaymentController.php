<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
   

    public function create()
{
    return view('payments.create');
}
    public function store(Request $request): JsonResponse
    {
        // Validasi request
        $validated = $request->validate([
            'user_name'      => 'required|string|max:255',
            'payment_method' => 'required|string',
            'amount'         => 'required|numeric|min:1',
        ]);

        // Simpan data pembayaran
        $payment = Payment::create([
            'user_name'      => $validated['user_name'],
            'payment_method' => $validated['payment_method'],
            'amount'         => $validated['amount'],
            'status'         => 'pending',
        ]);

        // Respon sukses
        return response()->json([
            'message' => 'Payment created successfully',
            'data'    => $payment,
        ], 201);
    }
    public function destroy($id)
{
    $payment = Payment::find($id);

    if (!$payment) {
        return redirect()->route('payments.index')->with('error', 'Payment not found.');
    }

    $payment->delete();

    return redirect()->route('payments.index')->with('success', 'Payment deleted successfully.');
}


    // Get all payments
    public function index()
    {
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }
    // Get single payment
    public function show($id): JsonResponse
    {
        $payment = Payment::find($id);

        if (!$payment) {
            return response()->json([
                'message' => 'Payment not found',
            ], 404);
        }

        return response()->json([
            'message' => 'Payment fetched successfully',
            'data'    => $payment,
        ]);
    }
}
