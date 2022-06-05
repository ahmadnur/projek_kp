<?php

namespace App\Models;

use CodeIgniter\Model;

class InterviewModel extends Model
{
    protected $primaryKey = 'id_interview';
    protected $table      = 'interview';
    protected $allowedFields = [
        'id_daftar',
        'jawaban1i',
        'jawaban2i',
        'jawaban3i',
        'jawaban4i',
        'jawaban5i',
        'jawaban6i',
        'jawaban7_1i',
        'jawaban7_2i',
        'jawaban7_3i',
        'jawaban7_4i',
        'jawaban8i'
    ];
    protected $useTimestamps = true;
}
