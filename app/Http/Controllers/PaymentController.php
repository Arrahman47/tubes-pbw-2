<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:payment-list|payment-create|payment-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:payment-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:payment-delete', ['only' => ['destroy']]);
        $this->middleware('permission:payment-accept', ['only' => ['accept']]);
    }
   

    public function create()
{
    return view('payments.create');
}

public function accept($id)
{
    $payment = Payment::findOrFail($id);
    $payment->status = 'Accepted';
    $payment->save();

    return redirect()->route('payments.index')->with('success', 'Pembayaran berhasil disetujui.');
}


public function store(Request $request): JsonResponse
{
    try {
        // Validasi request
        $validated = $request->validate([
            'user_name'      => 'required|string|max:255',
            'payment_method' => 'required|string|in:qris,bank_transfer',
            'amount'         => 'required|numeric|min:1',
        ]);

        // Gunakan transaksi untuk memastikan atomisitas
        $payment = DB::transaction(function () use ($validated) {
            return Payment::create([
                'user_name'      => $validated['user_name'],
                'payment_method' => $validated['payment_method'],
                'amount'         => $validated['amount'],
                'status'         => 'pending',
            ]);
        });

        // Berikan respons JSON sukses
        return response()->json([
            'message' => 'Payment created successfully.',
            'payment' => $payment, // Opsional, jika ingin mengirim data pembayaran
        ], 201);
    } catch (\Exception $e) {
        // Log error untuk debugging
        \Log::error('Failed to create payment:', [
            'error' => $e->getMessage(),
            'data'  => $request->all(),
        ]);

        // Berikan respons JSON error
        return response()->json([
            'message' => 'Failed to create payment. Please try again later.',
        ], 500);
    }
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
