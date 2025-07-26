<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $table = 'admissions';

    protected $fillable = [
        'program_id',
        'title',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'national_id',
        'email',
        'phone',
        'alt_phone',
        'street_address',
        'city',
        'province',
        'postal_code',
        'next_of_kin_name',
        'next_of_kin_relationship',
        'next_of_kin_phone',
        'next_of_kin_alt_phone',
        'secondary_school',
        'completion_year',
        'id_document_path',
        'certificates_path',
        'photo_path',
        'admission_status',
        'rejected_comment',
    ];
       public function payment()
    {
        return $this->hasOne(Payment::class, 'admission_id');
    }
      public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
