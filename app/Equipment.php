<?php

namespace OEMS;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    //
    protected $guarded = [];
    protected $table = 'equipment';
    protected $primaryKey = 'id';

    public static function update_equipment($id, $request)
    {
        try {
            $result = Equipment::where('id', $id)->update($request);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError($e->getMessage())->withInput();
        }

        return $result;
    }
}
