<?php

namespace OEMS;

use Illuminate\Database\Eloquent\Model;

class SpareParts extends Model
{
    //
    protected $guarded = [];
    protected $table = 'spare_parts';
    protected $primaryKey = 'id';

    public static function update_spare_parts($id, $request)
    {
        try {
            $result = SpareParts::where('id', $id)->update($request);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError($e->getMessage())->withInput();
        }

        return $result;
    }
}
