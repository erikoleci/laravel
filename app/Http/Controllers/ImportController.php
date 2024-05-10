<?php

namespace App\Http\Controllers;

use App\CsvData;
use App\ImportCsv;
use App\Imports\CsvImport;
use App\ToolsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;


class ImportController extends Controller
{

    public function index()
    {


    }

    public function getImport()
    {
        return view('admin.import');
    }






    public function parseImport(Request $request)
    {

        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) {
            $data = Excel::toArray(new CsvImport(),request()->file('csv_file'))[0];
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $value;
                }
            }
            $csv_data = array_slice($data, 1, 5);
//             return $csv_data;
            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'all_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

//        return $csv_header_fields;

        return view('admin.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));

    }



    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->all_data, true);
        $request->fields = array_flip($request->fields);
        $rules=['*.phone'=>['unique:leads']];
        $messages=['*.phone.unique'=>'Phone dublicate'];
        $validator = Validator::make($csv_data,$rules,$messages);
        if($validator->fails()){
            dd($validator->errors());
        }
        foreach ($csv_data as $row) {
            $contact = new ImportCsv();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->all_data) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }

         return redirect('admin/leads');
    }



}
