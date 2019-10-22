<?php

namespace OEMS\Http\Controllers;

use OEMS\SpareParts;
use Auth;
use Illuminate\Http\Request;

class SparePartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spare_parts.index', ['page_name' => 'Spare Parts Management', 'path' => 'Master List / Spare Parts Management']);
    }

    public function registration()
    {
    }

    public function load()
    {
        $spare_parts['data'] = SpareParts::all();

        $collection_type = array();
        $collection_brand = array();
        $collection_specification = array();
        $collection_supplier = array();
        $collection_line = array();
        $collection_location = array();
        $collection_unit = array();
        $collection_currency = array();

        foreach ($spare_parts['data'] as $key => $value) {
            $collection_type[] = $value['type'];
            $collection_brand[] = $value['brand'];
            $collection_specification[] = $value['specification'];
            $collection_supplier[] = $value['supplier'];
            $collection_line[] = $value['line'];
            $collection_location[] = $value['location'];
            $collection_unit[] = $value['unit'];
            $collection_currency[] = $value['currency'];
        }

        $spare_parts['type'] = array_unique(array_map("strtolower", $collection_type));
        $spare_parts['brand'] = array_unique(array_map("strtolower", $collection_brand));
        $spare_parts['specification'] = array_unique(array_map("strtolower", $collection_specification));
        $spare_parts['supplier'] = array_unique(array_map("strtolower", $collection_supplier));
        $spare_parts['line'] = array_unique(array_map("strtolower", $collection_line));
        $spare_parts['location'] = array_unique(array_map("strtolower", $collection_location));
        $spare_parts['unit'] = array_unique(array_map("strtolower", $collection_unit));
        $spare_parts['currency'] = array_unique(array_map("strtolower", $collection_currency));

        return $spare_parts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spare_parts.registration', ['page_name' => 'Spare Parts Registration', 'path' => 'Registration / Spare Parts Registration']);
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

        $data = [
            'alternative_unit' => request('txt_sp_alt_unit'),
            'brand' => request('txt_sp_brand'),
            'code' => request('txt_sp_code'),
            'currency' => request('txt_sp_currency'),
            'line' => request('txt_sp_line'),
            'location' => request('txt_sp_location'),
            'minimum_stock' => request('txt_sp_minimum'),
            'name' => request('txt_sp_name'),
            'price' => request('txt_sp_price'),
            'remarks' => request('txt_sp_remarks'),
            'specification' => request('txt_sp_specs'),
            'stock_quantity' => request('txt_sp_stock'),
            'supplier' => request('txt_sp_supplier'),
            'type' => request('txt_sp_type'),
            'unit' => request('txt_sp_unit'),
            'registrant_id' => Auth::user()->id
        ];

        $validator = $this->validator($data);

        if (!$validator->fails()) {
            $result = SpareParts::create($data);


            // return $result;
        }

        return $validator->errors()->all();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \OEMS\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SpareParts::where('id', $id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \OEMS\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function edit(SpareParts $spareParts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \OEMS\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        // return request()->all();
        $data =
        [
            'alternative_unit' => request('txt_sp_alt_unit'),
            'brand' => request('txt_sp_brand'),
            'code' => request('txt_sp_code'),
            'currency' => request('txt_sp_currency'),
            'line' => request('txt_sp_line'),
            'location' => request('txt_sp_location'),
            'minimum_stock' => request('txt_sp_minimum'),
            'name' => request('txt_sp_name'),
            'price' => request('txt_sp_price'),
            'remarks' => request('txt_sp_remarks'),
            'specification' => request('txt_sp_specs'),
            'stock_quantity' => request('txt_sp_stock'),
            'supplier' => request('txt_sp_supplier'),
            'type' => request('txt_sp_type'),
            'unit' => request('txt_sp_unit'),
            'registrant_id' => Auth::user()->id
        ];

        $validator = $this->validator($data);

        if (!$validator->fails()) {
            SpareParts::update_spare_parts($id, $data);
        }

        return $validator->errors()->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \OEMS\SpareParts  $spareParts
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpareParts $spareParts)
    {
        //
    }

    public function validator(array $data)
    {
        $validator = \Validator::make($data, [
            'alternative_unit' => 'required|string|max:30',
            'brand' => 'string|max:30',
            'code' => 'required|string|max:30',
            'currency' => 'required|string|max:30',
            'line' => 'required|string|max:30',
            'location' => 'required|string|max:30',
            'minimum_stock' => 'required|numeric|min:0',
            'name' => 'required|string|max:30',
            'price' => 'required|numeric|min:0|not_in:0',
            'remarks' => 'string|max:50',
            'specification' => 'string|max:30',
            'stock_quantity' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:30',
            'type' => 'required|string|max:30',
            'unit' => 'required|string|max:30'
        ]);

        return $validator;
    }
}
