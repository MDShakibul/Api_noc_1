<?php

namespace App\Http\Controllers;

use App\Models\NocIssuedFile;
use Illuminate\Http\Request;

class NocIssuedFileController extends Controller
{
    public function index(){
        return view('index');
    }

    public function create(Request $request){
        //dd($request->all());

        $info = new NocIssuedFile();

        $info->noc_status = $request->noc_status;
        $info->noc_appication_number = $request->noc_appication_number;
        $info->noc_applicant_name = $request->noc_applicant_name;
        $info->noc_applicant_contact_no = $request->noc_applicant_contact_no;
        $info->noc_applicant_mausa_name = $request->noc_applicant_mausa_name;
        $info->noc_applicant_address = $request->noc_applicant_address;
        $info->noc_issue_date = $request->noc_issue_date;

        if(!empty($request->noc_issued_files)) {

            $destinationPath = 'image/';
            $file = $request->file('noc_issued_files');
            $file_name = $request->file('noc_issued_files')->getClientOriginalName();
            $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

            if ($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png') {
                $file_extension = 'png';
            } else {
                $file_extension = $file_extension;
            }

            $name = 'user_form_image_' . date('d-m-Y-G-i-s') . '_' . rand(1000, 9999) . '.' . $file_extension;

            $file->move($destinationPath, $name);
            $info->noc_issued_files = $name;
        }

        $info->save();
        $server_name = $_SERVER['SERVER_NAME'];
        $root_folder = $_SERVER['DOCUMENT_ROOT'];
        $image_folder_name = 'image';
        //$port_number = $_SERVER['SERVER_PORT']; //optional for localhost

        (env("APP_ENV") == "local") ? $noc_file = $server_name.'/'.$root_folder.'/'.$image_folder_name.'/'.$info->noc_issued_files : $noc_file = $server_name.'/'.$image_folder_name.'/'.$info->noc_issued_files;

        return response()->json(['success' => true,
        'noc_file' => $noc_file]);



    }
}
