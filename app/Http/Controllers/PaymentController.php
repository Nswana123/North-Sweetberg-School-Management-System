<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Campus;
use App\Models\School;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

    // Build the query
    $query = Student::with(['user', 'program.fees', 'payments'])
        ->when($request->student_number, function ($q) use ($request) {
            $q->whereHas('user', function ($uq) use ($request) {
                $uq->where('student_number', 'like', '%' . $request->student_number . '%');
            });
        });

    $students = $query->get()->map(function ($student) {
        $year = $student->year_of_study;

        // Get all program fees
        $programFees = $student->program->fees ?? collect();

        if ($year > 1) {
            // Include fees from year 1 up to current year
            $applicableFees = $programFees->where('year_of_study', '<=', $year);
        } else {
            // Only include fees for year 1
            $applicableFees = $programFees->where('year_of_study', 1);
        }

        $totalFees = $applicableFees->sum('amount');
        $totalPaid = $student->payments->sum('amount');
        $balance = $totalFees - $totalPaid;

        return [
            'id' => $student->id,
            'student_number' => $student->user->student_number,
            'name' => $student->user->fname . ' ' . $student->user->lname,
            'program' => $student->program->name,
            'total_paid' => $totalPaid,
            'total_fees' => $totalFees,
            'balance' => $balance,
            'transaction_count' => $student->payments->count(),
        ];
    });

    return view('payments.statement', compact('students', 'permissions'));
}
public function studentStatement()
{
    $user = auth()->user();
     $permissions = $user->user_group->permissions;

    // Get the student record linked to the logged-in user
    $student = Student::with(['program.fees', 'payments'])
        ->where('user_id', $user->id)
        ->first();

    if (!$student) {
        // Provide an empty structure so Blade doesn't error
        $statement = [
            'student_number' => $user->student_number ?? '',
            'name' => $user->fname . ' ' . $user->lname,
            'program' => '',
            'year_of_study' => '',
            'total_fees' => 0,
            'total_paid' => 0,
            'balance' => 0,
            'breakdown' => [],
            'transactions' => [],
        ];
        return view('payments.student_statement', compact('statement'))
            ->with('error', 'Student record not found.');
    }

    $year = $student->year_of_study;
    $programFees = $student->program->fees ?? collect();
    $payments = $student->payments;

    // Filter fees up to the student's current year
    $applicableFees = $programFees->filter(function ($fee) use ($year) {
        return $fee->year_of_study <= $year;
    });

    $totalFees = $applicableFees->sum('amount');
    $totalPaid = $payments->sum('amount');
    $consolidatedBalance = $totalFees - $totalPaid;

    // Breakdown by year
    $yearlyBreakdown = [];
    $groupedFees = $applicableFees->groupBy('year_of_study');
    foreach ($groupedFees as $feeYear => $feesInYear) {
        $yearTotalFee = $feesInYear->sum('amount');

        // For simplicity, assume even distribution of payments (or improve this later)
        $yearPaid = min($totalPaid, $yearTotalFee);
        $totalPaid -= $yearPaid;

        $yearBalance = $yearTotalFee - $yearPaid;
        $status = $yearBalance <= 0 ? 'Paid' : ($yearPaid > 0 ? 'Partially Paid' : 'Unpaid');

        $yearlyBreakdown[] = [
            'year' => $feeYear,
            'total_fee' => $yearTotalFee,
            'paid' => $yearPaid,
            'balance' => $yearBalance,
            'status' => $status,
        ];
    }

    $statement = [
        'student_number' => $user->student_number,
        'name' => $user->fname . ' ' . $user->lname,
        'program' => $student->program->name,
        'year_of_study' => $year,
        'total_fees' => $totalFees,
        'total_paid' => $student->payments->sum('amount'),
        'balance' => $consolidatedBalance,
        'breakdown' => $yearlyBreakdown,
        'transactions' => $payments,
    ];

    return view('payments.student_statement', compact('statement','permissions'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
