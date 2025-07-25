<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
protected $table = 'Payments';
    protected $fillable = [
        'admission_id',
        'payment_mode',
        'amount',
        'payment_number',
        'card_number',
        'card_expiry',
        'card_cvc',
        'bank_name',
        'account_number',
        'transaction_reference',
    ];

    // Define relationship to admission
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
}
