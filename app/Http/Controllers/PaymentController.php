<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function checkout($id)
    {
        $course = Course::findOrFail($id);
        return view('layouts.checkout.checkout',compact('course'));
    }

    public function createPayment(Request $request, $courseId) {
        $course = Course::findOrFail($courseId);

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'amount' => $course->price,
            'status' => 'pending'
        ]);

        $payment->status = 'pending';
        $payment->save();

        return redirect()->back()->with('success, Pembayaran berhasil dilakukan');
    }

    public function updatePaymentStatus(Request $request, $paymentId) {
        $payment = Payment::findOrFail($paymentId);
        $payment->status = $request->status;
        $request->save();

        return redirect()->back()->with('success, Pembayaran berhasil diperbarui');
    }
}
