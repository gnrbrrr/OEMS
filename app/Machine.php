<?php

namespace OEMS;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Machine extends Model
{
    //
    protected $guarded = [];
    protected $table = 'machines';
    protected $primaryKey = 'id';

    public $image_name;
    public $control_number;
    public $machine_name;
    public $model;
    public $machine_controller;
    public $manufacturer;
    public $serial_number;
    public $date_made;
    public $section;
    public $machine_location;
    public $line;
    public $fixed_asset_number;
    public $date_arrived;
    public $padlock_number;
    public $working_capacity;
    public $remarks;
    public $registrant_id;


    public static function update_machine($id, $request)
    {
        try {
            $result = Machine::where('id', $id)->update($request);
        } catch (ModelNotFoundException  $e) {
            $result = back()->withError($e->getMessage())->withInput();
        }

        return $result;
    }

    // public function toArray($request)
    // {
    //     return [
    //         'image_name' => $this->image_name,
    //         'control_number' => $this->control_number,
    //         'machine_name' => $this->machine_name,
    //         'model' => $this->model,
    //         'machine_controller' => $this->machine_controller,
    //         'manufacturer' => $this->manufacturer,
    //         'serial_number' => $this->serial_number,
    //         'date_made' => $this->date_made,
    //         'section' => $this->section,
    //         'machine_location' => $this->machine_location,
    //         'line' => $this->line,
    //         'fixed_asset_number' => $this->fixed_asset_number,
    //         'arrival_date' => $this->arrival_date,
    //         'padlock_number' => $this->padlock_number,
    //         'working_capacity' => $this->working_capacity,
    //         'remarks' => $this->remarks,
    //         'registrant_id' => Auth::user()->employee_number
    //     ];
    // }
}
