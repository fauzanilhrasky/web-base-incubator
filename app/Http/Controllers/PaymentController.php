<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function checkout($id)
    {
        $course = Course::findOrFail($id);
        return view('layouts.checkout.checkout', compact('course'));
    }

    public function createPayment(Request $request, $courseId)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course = Course::findOrFail($courseId);

        DB::beginTransaction();

        try {
            if ($image = $request->file('payment_proof')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $profileImage); // Simpan gambar ke 'public/images'
            }

            $payment = new Payment();
            $payment->user_id = Auth::id();
            $payment->course_id = $course->id;
            $payment->amount = $course->price;
            $payment->status = 'pending';
            $payment->payment_proof = isset($profileImage) ? $profileImage : null;

            $payment->save();

            // Commit transaction
            DB::commit();

            return redirect()->back()->with('success', 'Pembayaran berhasil dilakukan, menunggu konfirmasi admin.');
        } catch (\Exception $e) {
            // Rollback jika terjadi kesalahan
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function updatePaymentStatus(Request $request, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->status = $request->status;
        $payment->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    public function pendingPayment() {
        $payments = Payment::with('user')->where('status', 'pending')->get();
        return view('layouts.checkout.pending', compact('payments'));
    }

    public function confirmPayment(Request $request, $paymentId)
    {
        $payment = Payment::findOrFail($paymentId);

        $payment->status = 'completed';

        $payment->save();

        return redirect()->route('payment.pending')->with('success', "Pembayaran berhasil dikonfirmasi");
    }

    public function showConfirmDetails($paymentId)
    {
        $payment = Payment::with('user')->findOrFail($paymentId);
        return view('layouts.checkout.confirm', compact('payment'));
    }

    public function myCourses() {
        $payments = Payment::with('course')
                    ->where('user_id', Auth::id())
                    ->where('status', 'completed')
                    ->get();
    
        return view('layouts.user.course.my_courses', compact('payments'));
    }
    
}
