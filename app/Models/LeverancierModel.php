<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LeverancierModel extends Model
{
    public function sp_getAllLeveranciers()
    {
        return DB::select('CALL SP_GetAllLeveranciers');
    }

    public function sp_GetLeverancierById($id)
    {
        return DB::select('CALL sp_GetLeverancierById(:id)',
        ['id' => $id]);
    }

}
