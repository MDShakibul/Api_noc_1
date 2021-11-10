<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NocIssuedFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'noc_appication_number',
        'noc_applicant_name',
        'noc_applicant_contact_no',
        'noc_applicant_mausa_name',
        'noc_applicant_address',
        'noc_issue_date',
        'noc_status',
        'noc_issued_files',
    ];
}
