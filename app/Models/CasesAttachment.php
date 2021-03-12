<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasesAttachment extends Model
{
    protected $table = 'cases_attachments';
    protected $fillable = ['attachable_id', 'attachable_type', 'case_id'];
}
