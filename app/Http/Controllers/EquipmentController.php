<?php

namespace OEMS\Http\Controllers;

use OEMS\Equipment;
use Auth;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('equipment.index', ['page_name' => 'Equipment Management' , 'path' => 'Master List / Equipment Management']);
    }

    public function registration()
    {
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipment.registration', ['page_name' => 'Equipment Registration', 'path' => 'Registration / Equipment Registration']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return request()->all();
        $filename = 'image.png';

        if (isset($_FILES["img_input_equipment"]) && $_FILES["img_input_equipment"]['error'] == 0) {
            $file = $_FILES["img_input_equipment"];
            $filename = $file['name'];
        }

        $data = [
            'equipment_name' => request()->txt_equipment_name,
            'model' => request()->txt_model,
            'equipment_controller' => request()->txt_controller,
            'serial_number' => request()->txt_serial_number,
            'fixed_asset_number' => request()->txt_fixed_asset_number,
            'manufacturer' => request()->txt_manufacturer,
            'working_capacity' => request()->txt_working_capacity,
            'line' => request()->txt_line,
            'equipment_location' => request()->txt_equipment_location,
            'section' => request()->txt_section,
            'date_made' => request()->txt_date_made,
            'date_arrived' => request()->txt_arrival_date,
            'remarks' => (request('txt_remarks') == '' ? 'N/A' : request('txt_remarks')),
            'registrant_id' => Auth::user()->id,
            'file' => $_FILES['img_input_equipment']['tmp_name']
        ];

        // return $_FILES["img_input_equipment"];

        $validator = $this->validator($data);

        if (!$validator->fails()) {
            if (!file_exists('upload/equipment/'.$filename)) {
                move_uploaded_file($file['tmp_name'], 'upload/equipment/'.request()->txt_equipment_name.'.jpg');
            }

            unset($data['file']);

            $result = EQUIPMENT::create($data);
            // return $result;
        }
        

        return $validator->errors()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \OEMS\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Equipment::where('id', $id)->select('*')->get()->first();
        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \OEMS\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \OEMS\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // return request()->all();
        $data =
        [
                'equipment_name' => request('txt_equipment_name'),
                'model' => request('txt_model'),
                'equipment_controller' => request('txt_controller'),
                'serial_number' => request('txt_serial_number'),
                'fixed_asset_number' => request('txt_fixed_asset_number'),
                'manufacturer' => request('txt_manufacturer'),
                'working_capacity' => request('txt_working_capacity'),
                'line' => request('txt_line'),
                'equipment_location' => request('txt_equipment_location'),
                'section' => request('txt_section'),
                'date_made' => request('txt_date_made'),
                'date_arrived' => request('txt_arrival_date'),
                'remarks' => (request('txt_remarks') == '' ? 'N/A' : request('txt_remarks')),
                'registrant_id' => Auth::user()->employee_number,
                'file' => 'test_value'
        ];

        // return $data;

        $validator = $this->validator($data);

        
        if (!$validator->fails()) {
            unset($data['file']);
            $result = Equipment::update_equipment($id, $data);
        };
        // return $result;
        
        return $validator->errors()->all();
    }

    public function validator(array $data)
    {
        $validator = \Validator::make($data, [
            'equipment_name' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'equipment_controller' => 'required|string|max:50',
            'serial_number' => 'required|string|max:50',
            'fixed_asset_number' => 'required|string|max:50',
            'manufacturer' => 'required|string|max:50',
            'working_capacity' => 'required|string|max:50',
            'line' => 'required|string|max:50',
            'equipment_location' => 'required|string|max:50',
            'section' => 'required|string|max:50',
            'date_made' => 'required|date',
            'date_arrived' => 'required|date',
            'remarks' => 'string|max:50',
            'registrant_id' => 'required',
            'file' => 'required'
        ]);

        return $validator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \OEMS\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }

    public function load()
    {
        $equipment['data'] = Equipment::all();

        $collection_equipment = array();
        $collection_section = array();
        $collection_equipment_location = array();
        $collection_line = array();
                                    
        foreach ($equipment['data'] as $key => $value) {
            $collection_equipment[] = $value['equipment_name'];
            $collection_section[] = $value['section'];
            $collection_equipment_location[] = $value['equipment_location'];
            $collection_line[] = $value['line'];
        }

        $equipment['equipment_name'] = array_unique(array_map("strtolower", $collection_equipment));
        $equipment['section'] = array_unique(array_map("strtolower", $collection_section));
        $equipment['equipment_location'] = array_unique(array_map("strtolower", $collection_equipment_location));
        $equipment['line'] = array_unique(array_map("strtolower", $collection_line));
                                    

        return $equipment;
    }

    public function getData($column, $find)
    {
        $equipment = $this->load();

        $collection_model = array();
        $collection_equipment_controller = array();
        $collection_manufacturer = array();

        foreach ($equipment['data'] as $key => $value) {
            if ($value[$column] == $find) {
                $collection_model[] = $value['model'];
                $collection_equipment_controller[] = $value['equipment_controller'];
                $collection_manufacturer[] = $value['manufacturer'];
            }
        }
        $data['model'] = array_values(array_unique(array_map("strtolower", $collection_model)));
        $data['controller'] = array_values(array_unique(array_map("strtolower", $collection_equipment_controller)));
        $data['manufacturer'] = array_values(array_unique(array_map("strtolower", $collection_manufacturer)));
        return $data;
    }
}
