<?php

namespace App\Http\Controllers;
use App\Models\Admission;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AdmissionController extends Controller
{
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'program' => 'required|string',
        'title' => 'required|string',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'dob' => 'required|date',
        'gender' => 'required|string',
        'national_id' => 'required|string|unique:admissions,national_id',
        'email' => 'required|email|unique:admissions,email',
        'phone' => 'required|string',
        'street_address' => 'required|string',
        'city' => 'required|string',
        'province' => 'required|string',
        'next_of_kin_name' => 'required|string',
        'next_of_kin_relationship' => 'required|string',
        'next_of_kin_phone' => 'required|string',
        'secondary_school' => 'required|string',
        'completion_year' => 'required|integer|min:1950|max:' . now()->year,
        'id_document_path' => 'required|file|mimes:pdf,jpeg,png,jpg|max:5120',
        'certificates_path.*' => 'required|file|mimes:pdf,jpeg,png,jpg|max:5120',
        'photo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',

         // ... existing fields ...
    'payment_mode' => 'required|string|in:mobile_money_payment,card,bank_transfer',
    'paymentAmount' => 'required|numeric|min:1',
    'payment_number' => 'required_if:payment_mode,mobile_money_payment|string',

    // Optional validations for other modes:
    'cardNumber' => 'nullable|string',
    'cardExpiry' => 'nullable|string',
    'cardCVC' => 'nullable|string',
    'bankName' => 'nullable|string',
    'accountNumber' => 'nullable|string',
    'transactionReference' => 'nullable|string',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $validated = $validator->validated();

    $admission = new Admission();
    $admission->program = $validated['program'];
    $admission->title = $validated['title'];
    $admission->first_name = $validated['first_name'];
    $admission->last_name = $validated['last_name'];
    $admission->dob = $validated['dob'];
    $admission->gender = $validated['gender'];
    $admission->national_id = $validated['national_id'];
    $admission->email = $validated['email'];
    $admission->phone = $validated['phone'];
    $admission->street_address = $validated['street_address'];
    $admission->city = $validated['city'];
    $admission->province = $validated['province'];
    $admission->next_of_kin_name = $validated['next_of_kin_name'];
    $admission->next_of_kin_relationship = $validated['next_of_kin_relationship'];
    $admission->next_of_kin_phone = $validated['next_of_kin_phone'];
    $admission->secondary_school = $validated['secondary_school'];
    $admission->completion_year = $validated['completion_year'];

    // Optional fields
    $admission->alt_phone = $request->input('alt_phone');
    $admission->postal_code = $request->input('postal_code');
    $admission->next_of_kin_alt_phone = $request->input('next_of_kin_alt_phone');

    // Handle file uploads
    if ($request->hasFile('id_document_path')) {
        $admission->id_document_path = $request->file('id_document_path')->store('uploads/ids', 'public');
    }

    if ($request->hasFile('certificates_path')) {
        $paths = [];
        foreach ($request->file('certificates_path') as $file) {
            $paths[] = $file->store('uploads/certificates', 'public');
        }
        $admission->certificates_path = json_encode($paths);
    }

    if ($request->hasFile('photo_path')) {
        $admission->photo_path = $request->file('photo_path')->store('uploads/photos', 'public');
    }

    $admission->save();

    // Save payment details
$payment = new Payment();
$payment->admission_id = $admission->id;
$payment->payment_mode = $validated['payment_mode'];
$payment->amount = $validated['paymentAmount'];

if ($validated['payment_mode'] === 'mobile_money_payment') {
    $payment->payment_number = $validated['payment_number'];
} elseif ($validated['payment_mode'] === 'card') {
    $payment->card_number = $request->input('cardNumber');
    $payment->card_expiry = $request->input('cardExpiry');
    $payment->card_cvc = $request->input('cardCVC');
} elseif ($validated['payment_mode'] === 'bank_transfer') {
    $payment->bank_name = $request->input('bankName');
    $payment->account_number = $request->input('accountNumber');
    $payment->transaction_reference = $request->input('transactionReference');
}

$payment->save();

    return redirect()->back()->with('success', 'Admission submitted successfully.');

// Or for error
return redirect()->back()->with('error', 'Something went wrong. Please try again.');
}
}
