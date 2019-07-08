<?php

namespace OEMS\Http\Controllers;

use OEMS\Machine;
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
    
    public function index()
    {
        return view('machine.index', ['page_name' => 'Machine Management']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = 'image.png';

        if (isset($_FILES["img_input_machine"]) && $_FILES["img_input_machine"]['error'] == 0) {
            $file = $_FILES["img_input_machine"];
            $filename = $file['name'];
        }

        $data =
        [
            'image_name' => $filename,
            'control_number' => request('txt_machine_control_number'),
            'machine_name' => request('txt_machine_name'),
            'model' => request('txt_model'),
            'machine_controller' => request('txt_machine_controller'),
            'manufacturer' => request('txt_manufacturer'),
            'serial_number' => request('txt_serial_number'),
            'date_made' => request('txt_year_made'),
            'location_user' => request('txt_user'),
            'machine_location' => request('txt_machine_location'),
            'line' => request('txt_line'),
            'fixed_asset_number' => request('txt_asset_number'),
            'arrival_date' => request('txt_date_arrived'),
            'padlock_number' => request('txt_padlock_number'),
            'working_capacity' => request('txt_working_capacity'),
            'remarks' => request('txt_remarks'),
            'registrant_id' => Auth::user()->employee_number
        ];

        $validator = $this->validator($data);

        if (!$validator->fails()) {
            if (!file_exists('upload/machine/'.$filename)) move_uploaded_file($file['tmp_name'], 'upload/machine/'.$filename);
            MACHINE::create($data);
        }
        

        return $validator->errors()->all();

        // return $data['registrant_id'];

    }

    public function validator(array $data)
    {
        $validator = Validator::make($data, [
            'image' => ['string','max:80'],
            'control_number' => ['required', 'string', 'max:50', 'unique:machines'],
            'machine_name' => ['required', 'string', 'max:50'],
            'model' => ['required', 'string', 'max:30'],
            'machine_controller' => ['required', 'string', 'max:30'],
            'manufacturer' =>['required', 'string', 'max:20'],
            'serial_number' => ['required', 'string', 'max:25'],
            'date_made' => ['required', 'date'],
            'location_user' => ['required', 'string', 'max:15'],
            'machine_location' => ['required', 'string', 'max:25'],
            'line' => ['required', 'string', 'max:20'],
            'fixed_asset_number' => ['required', 'string', 'max:20'],
            'arrival_date' => ['required', 'date'],
            'padlock_number' => ['required', 'string', 'max:5'],
            'working_capacity' => ['required', 'string', 'max:20'],
            'remarks' => ['max:30'],
            'registrant_id' => ['required']
        ]);

        return $validator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        //
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
    public function update(Request $request, Machine $machine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \OEMS\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        return USER::select('id')
        ->where('machine_number', $machine)->get();
    }

    public function load()
    {
        $machine['data'] = MACHINE::all();
        
        $collection_machine = array();
        $collection_user = array();
        $collection_machine_location = array();
        $collection_line = array();
        
        foreach ($machine['data'] as $key => $value) {
            $collection_machine[] = $value['machine_name'];
            $collection_user[] = $value['location_user'];
            $collection_machine_location[] = $value['machine_location'];
            $collection_line[] = $value['line'];
        }

        $machine['machine_name'] = array_unique($collection_machine);
        $machine['location_user'] = array_unique($collection_user);
        $machine['machine_location'] = array_unique($collection_machine_location);
        $machine['line'] = array_unique($collection_line);
        

        return $machine;
    }

    public function getData($column, $find)
    {
        $machine = $this->load();

        $collection_model = array();
        $collection_machine_controller = array();
        $collection_manufacturer = array();

        foreach ($machine['data'] as $key => $value) {
            if ($value[$column] == $find) {
                $collection_model[] = $value['model'];
                $collection_machine_controller[] = $value['machine_controller'];
                $collection_manufacturer[] = $value['manufacturer'];
            }
        }
        $data['model'] = array_values(array_unique($collection_model));
        $data['machine_controller'] = array_values(array_unique($collection_machine_controller));
        $data['manufacturer'] = array_values(array_unique($collection_manufacturer));
        return $data;
    }
}
