<?php

namespace OEMS\Http\Controllers;

use OEMS\Machine;
// use OEMS\Equipment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Auth;

class MachineController extends Controller
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

    public function load_registration(EquipmentController $equipment, SparePartsController $spare)
    {
        $data['user_credentials'] = Auth::user()->position;
        $data['machine_data'] = $this->load();
        $data['equipment_data'] = $equipment->load();
        $data['spare_parts_data'] = $spare->load();
        

        return $data;
    }
    

    public function index()
    {
        return view('machine.index', ['page_name' => 'Machine Management', 'path' => 'Master List / Machine Management']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('machine.registration', ['page_name' => 'Machine Registration', 'path' => 'Registration / Machine Registration']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $filename = 'image.png';

        if (isset($_FILES["img_input_machine"]) && $_FILES["img_input_machine"]['error'] == 0) {
            $file = $_FILES["img_input_machine"];
            $filename = $file['name'];
        }

        $data =
        [
            'control_number' => request('txt_control_number'),
            'machine_name' => request('txt_machine_name'),
            'model' => request('txt_model'),
            'machine_controller' => request('txt_machine_controller'),
            'manufacturer' => request('txt_manufacturer'),
            'serial_number' => request('txt_serial_number'),
            'date_made' => request('txt_date_made'),
            'section' => request('txt_section'),
            'machine_location' => request('txt_machine_location'),
            'line' => request('txt_line'),
            'fixed_asset_number' => request('txt_fixed_asset_number'),
            'date_arrived' => request('txt_arrival_date'),
            'padlock_number' => request('txt_padlock_number'),
            'working_capacity' => request('txt_working_capacity'),
            'remarks' => request('txt_remarks'),
            'registrant_id' => Auth::user()->id
        ];

        $validator = $this->validator($data);

        if (!$validator->fails()) {
            if (!file_exists('upload/machine/'.$filename)) {    mameh
(mooning)
                move_uploaded_file($file['tmp_name'], 'upload/machine/'.$filename);
            }
            MACHINE::create($data);
        }
    

        return $validator->errors()->all(); */

        return request()->all();
    }

    public function validator(array $data)
    {
        $validator = \Validator::make($data, [
            'image_name' => 'required|string|max:80',
            'control_number' => 'required|string|max:50|unique:machines',
            'machine_name' => 'required|string|max:50',
            'model' => 'required', 'string|max:30',
            'machine_controller' => 'required|string|max:30',
            'manufacturer' => 'requird|string|max:20',
            'serial_number' => 'required|string|max:25',
            'date_made' => 'required|date',
            'section' => 'required|string|max:15',
            'machine_location' => 'required|string|max:25',
            'line' => 'required', 'string|max:20',
            'fixed_asset_number' => 'required|string|max:20',
            'date_arrived' => 'required|date',
            'padlock_number' => 'required|string|max:5',
            'working_capacity' => 'required|string|max:20',
            'remarks' => 'max:30',
            'registrant_id' => 'required'
        ]);

        return $validator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return MACHINE::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $validator = \Validator::make(
            request()->all(),
            [
                'txt_fixed_asset_number' => 'required',
                'txt_arrival_date' => 'required',
                'txt_line' => 'required',
                'txt_control_number' => 'required',
                'txt_machine_controller' => 'required',
                'txt_machine_location' => 'required',
                'txt_machine_name' => 'required',
                'txt_manufacturer' => 'required',
                'txt_model' => 'required',
                'txt_padlock_number' => 'required',
                'txt_serial_number' => 'required',
                'txt_section' => 'required',
                'txt_working_capacity' => 'required',
                'txt_date_made' => 'required',
            ]
        );

        if (!$validator->fails()) {
            $result = Machine::update_machine($id, [
                'fixed_asset_number' => request()->txt_fixed_asset_number,
                'date_arrived' => request()->txt_arrival_date,
                'line' => request()->txt_line,
                'control_number' => request()->txt_control_number,
                'machine_controller' => request()->txt_machine_controller,
                'machine_location' => request()->txt_machine_location,
                'machine_name' => request()->txt_machine_name,
                'manufacturer' => request()->txt_manufacturer,
                'model' => request()->txt_model,
                'padlock_number' => request()->txt_padlock_number,
                'serial_number' => request()->txt_serial_number,
                'section' => request()->txt_section,
                'date_made' => request()->txt_date_made
            ]);
        }
        return $validator->errors()->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
    }

    public function load()
    {
        $machine['data'] = MACHINE::all();
                                    
        $collection_machine = array();
        $collection_section = array();
        $collection_machine_location = array();
        $collection_line = array();
                                    
        foreach ($machine['data'] as $key => $value) {
            $collection_machine[] = $value['machine_name'];
            $collection_section[] = $value['section'];
            $collection_machine_location[] = $value['machine_location'];
            $collection_line[] = $value['line'];
        }

        $machine['machine_name'] = array_unique(array_map("strtolower", $collection_machine));
        $machine['section'] = array_unique(array_map("strtolower", $collection_section));
        $machine['machine_location'] = array_unique(array_map("strtolower", $collection_machine_location));
        $machine['line'] = array_unique(array_map("strtolower", $collection_line));
                                    

        return $machine;
    }

    public function getData($column, $find)
    {
        $machine = $this->load();

        $collection_model = array();
        $collection_machine_controller = array();
        $collection_manufacturer = array();

        foreach ($machine['data'] as $key => $value) 
        {
            if ($value[$column] == $find) {
                $collection_model[] = $value['model'];
                $collection_machine_controller[] = $value['machine_controller'];
                $collection_manufacturer[] = $value['manufacturer'];
            }
        }
        $data['model'] = array_values(array_unique(array_map("strtolower", $collection_model)));
        $data['machine_controller'] = array_values(array_unique(array_map("strtolower", $collection_machine_controller)));
        $data['manufacturer'] = array_values(array_unique(array_map("strtolower", $collection_manufacturer)));
        return $data;
    }
}
