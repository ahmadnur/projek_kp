<?php

namespace App\Models;

use CodeIgniter\Model;

class KeteranganModel extends Model
{
    protected $primaryKey = 'id_keterangan';
    protected $table      = 'keterangan';
    protected $allowedFields = [
        'id_daftar',
        'jawaban1',
        'jawaban1_1',
        'jawaban2',
        'jawaban2_1',
        'jawaban3',
        'jawaban4',
        'jawaban4_1',
        'jawaban5',
        'jawaban5_1',
        'jawaban6',
        'jawaban6_1',
        'jawaban7',
        'jawaban7_1',
        'jawaban8',
        'jawaban9',
        'jawaban10',
        'jawaban11',
        'jawaban12',
        'jawaban12_1',
        'jawaban13',
        'jawaban13_1',
        'jawaban14',
        'jawaban14_1',
        'jawaban15_1',
        'jawaban15_2',
        'jawaban15_3',
        'jawaban15_4',
        'jawaban15_5',
        'jawaban15_6',
        'jawaban15_7',
        'jawaban15_8',
    ];
    protected $useTimestamps = true;
}
