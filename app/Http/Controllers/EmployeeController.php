<?php

namespace App\Http\Controllers;

use App\Asal;
use App\AsalBill;
use App\Employee;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use PDF;
use Session;

class EmployeeController extends Controller
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
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('admin.employees.employee',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.add-employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 public function store(Request $request)
    {
        $fileName =   $this->upload($request);
        $signature =   $this->signature($request);
        $this->validate($request,[
            'first_name'             => 'required', 
            'last_name'              => 'required', 
            'gender'                 => 'required', 
            'nationality'            => 'required', 
            'remarks'                => 'required', 
            'ref_no'                 => 'required', 
            'date'                   => 'required', 
            'issue_date'             => 'required', 
            'place_issue'            => 'required', 
            'fee_paid'               => 'required', 
            'receipt_no'             => 'required', 
            'vd'                     => 'required', 
            'vp_no'                  => 'required', 
            'picture'                => 'required', 
            'signature'              => 'required', 
            'company_reg_no'         => 'required', 
            'identification_card_no' => 'required', 
            'application_number'     => 'required', 
            'doc_number'             => 'required',  
            'country'                => 'required',  
            'seramay'                => 'required',  
            'surat'                  => 'required',  
            'sejumlah'               => 'required',  
            'tempoh'                 => 'required',  
            'jawatan'                => 'required',  
        ]);
         $employee = Employee::insert([
            'first_name'            => $request['first_name'], 
            'last_name'             => $request['last_name'], 
            'gender'                => $request['gender'], 
            'nationality'           => $request['nationality'], 
            'remarks'               => $request['remarks'], 
            'ref_no'                => $request['ref_no'], 
            'date'                  => $request['date'], 
            'issue_date'            => $request['issue_date'], 
            'place_issue'           => $request['place_issue'], 
            'fee_paid'              => $request['fee_paid'], 
            'receipt_no'            => $request['receipt_no'], 
            'vd'                    => $request['vd'], 
            'vp_no'                 => $request['vp_no'], 
            'picture'               => $fileName,  
            'signature'             => $signature,   
            'identification_card_no'=> $request['identification_card_no'],  
            'company_reg_no'        => $request['company_reg_no'],  
            'application_number'    => $request['application_number'],  
            'doc_number'            => $request['doc_number'],  
            'country'               => $request['country'],  
            'seramay'               => $request['seramay'],  
            'surat'                 => $request['surat'],  
            'sejumlah'              => $request['sejumlah'],  
            'tempoh'                => $request['tempoh'],  
            'jawatan'                => $request['tempoh'],  
            'created_at'            => Carbon::now('Asia/Dhaka')->toDateTimeString()
        ]); 
         if($employee){
            Session::flash('success','value');
            return redirect(route('employees')); 
         }
         
    }

    // for upload picture
    public function upload($request){
        if($request->hasFile('picture')){
            $picture = $request->file('picture');
            $images = Image::make($picture);
            $images->resize(480,600,function($constrain){
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_Employee_'.'_'.rand(),PATHINFO_FILENAME).'.'.$picture->getClientOriginalExtension();
            $images->save('uploads/'.$fileName); 
           return $fileName;
        } 
    } 
       // for upload picture
    public function signature($request){
        if($request->hasFile('signature')){
            $signature = $request->file('signature');
            $images = Image::make($signature);
            $images->resize(80,120,function($constrain){
                $constrain->aspectRatio();
            });
            $signature = pathinfo('_signature'.'_'.rand(),PATHINFO_FILENAME).'.'.$signature->getClientOriginalExtension();
            $images->save('uploads/'.$signature); 
           return $signature;
        } 
    }
 
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $viewEmployees = Employee::where('id',$id)
                           ->first();  
        return view('admin.employees.view-employee',compact('viewEmployees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $editEmployee = Employee::where('id',$id)
                           ->first();  
        return view('admin.employees.edit-employee',compact('editEmployee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $fileName =  $this->updatePhoto($request);
        $signature =  $this->updateSignature($request);
        $this->validate($request,[
            'first_name'             => 'required', 
            'last_name'              => 'required', 
            'gender'                 => 'required', 
            'nationality'            => 'required', 
            'remarks'                => 'required', 
            'ref_no'                 => 'required', 
            'date'                   => 'required', 
            'issue_date'             => 'required', 
            'place_issue'            => 'required', 
            'fee_paid'               => 'required', 
            'receipt_no'             => 'required', 
            'vd'                     => 'required', 
            'vp_no'                  => 'required',  
            'company_reg_no'         => 'required', 
            'identification_card_no' => 'required', 
            'application_number'     => 'required', 
            'doc_number'             => 'required',  
            'country'                => 'required',  
            'seramay'                => 'required',  
            'surat'                  => 'required',  
            'sejumlah'               => 'required',  
            'tempoh'                 => 'required',  
            'jawatan'                 => 'required',  
        ]);

         $employeeUpdate = Employee::find($request->id);
         $employeeUpdate->first_name            = $request->first_name;
         $employeeUpdate->last_name             = $request->last_name;
         $employeeUpdate->gender                = $request->gender;
         $employeeUpdate->nationality           = $request->nationality;
         $employeeUpdate->remarks               = $request->remarks;
         $employeeUpdate->ref_no                = $request->ref_no;
         $employeeUpdate->date                  = $request->date;
         $employeeUpdate->issue_date            = $request->issue_date;
         $employeeUpdate->place_issue           = $request->place_issue;
         $employeeUpdate->fee_paid              = $request->fee_paid;
         $employeeUpdate->receipt_no            = $request->receipt_no;
         $employeeUpdate->vp_no                 = $request->vp_no; 
         $employeeUpdate->picture               = $fileName;
         $employeeUpdate->signature             = $signature; 
         $employeeUpdate->company_reg_no        = $request->company_reg_no;
         $employeeUpdate->identification_card_no= $request->identification_card_no;
         $employeeUpdate->application_number    = $request->application_number;
         $employeeUpdate->doc_number            = $request->doc_number;
         $employeeUpdate->country               = $request->country; 
         $employeeUpdate->seramay               = $request->seramay; 
         $employeeUpdate->surat                 = $request->surat; 
         $employeeUpdate->sejumlah              = $request->sejumlah; 
         $employeeUpdate->tempoh                = $request->tempoh; 
         $employeeUpdate->jawatan                = $request->jawatan; 
         $employeeUpdate->Updated_at            = Carbon::now('Asia/Dhaka')->toDateTimeString();
         $employeeUpdate->save();
 
         if($employeeUpdate){
            Session::flash('success','value');
            return redirect(route('employees')); 
         }
         
    }

    // for update picture
    private function updatePhoto($request){
        $employeePhoto = Employee::where('id',$request->id)->first();
        if($request->hasFile('picture')){
            $file_path = $employeePhoto->picture;
            if(file_exists($file_path)){
                unlink('uploads/'.$file_path);
            }
            $picture = $request->file('picture');
            $images = Image::make($picture);
            $images->resize(480,600,function($constrain){
                $constrain->aspectRatio();
            });
            $fileName = pathinfo('_Employee_'.'_'.rand(),PATHINFO_FILENAME).'.'.$picture->getClientOriginalExtension();
            $images->save('uploads/'.$fileName);  
        }else{
            $fileName = $employeePhoto['picture'];
        }
        return $fileName;
    }  
     private function updateSignature($request){
        $signature = Employee::where('id',$request->id)->first();
        if($request->hasFile('signature')){
            $file_path = $employeePhoto->signature;
             if(file_exists($file_path)){
                unlink('uploads/'.$file_path);
            }
            $signature = $request->file('signature');
            $images = Image::make($signature);
            $images->resize(80,120,function($constrain){
                $constrain->aspectRatio();
            });
            $signature = pathinfo('_signature_'.'_'.rand(),PATHINFO_FILENAME).'.'.$signature->getClientOriginalExtension();
            $images->save(public_path('uploads/'.$signature));  
        }else{
            $signature = $signature['signature'];
        }
        return $signature;
    } 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Employee::where('id',$id)->delete();
         Asal::where('employee_id',$id)->delete();
         AsalBill::where('asal_id',$id)->delete();
        return redirect(route('employees'));
    }

    // for make pdf
    public function download($id){ 
        $employee = Employee::where('deleted_at','=', NULL)->where('id',$id)->first(); 
        $employees = Employee::where('deleted_at','=', NULL)->where('id',$id)->get();
        $pdf = PDF::loadView('admin.employees.employee-list',compact('employee','employees'));
        return $pdf->download();
    }      
    // for make visa copy
    public function visaPDF($id){  
        $employee = Employee::where('deleted_at','=', NULL)->where('status',1)->where('id',$id)->first();
        $pdf = PDF::loadView('admin.employees.visa-pdf',compact('employee'));
        return $pdf->download('visa.pdf');
    }  


    // coding for search 
    // 
    public function searchShow(){
        return view('admin.employees.search-employee');
    }

    // for live search
      public function search(Request $request){
        if($request->ajax()){
            $output = '';
            $i = 1;
            $shows = Employee::where('doc_number','LIKE','%'.$request->doc_number.'%')->get(); 

            if(count($shows) == 0){
                $data = "<h5 style='text-align:center; padding:10px; width: 400%;'>Data Not Found</h5>";
                return  $data;
            } else{
                foreach($shows as $key => $show){
                    $output.='<tr>'.
                                '<td>'.$i++.'</td>'.
                                '<td>'.$show->first_name .' '. $show->last_name.'</td>'.
                                '<td>'.$show->company_reg_no.'</td>'.
                                '<td>'.$show->application_number.'</td>'.
                                '<td>'.$show->doc_number.'</td>'.
                                '<td>'."<a href='". route('visa_pdf',['id'=>$show->id]) ."' class='btn btn-primary'> Visa </a>".'</td>'.
                                '<td>'."<a href='". route('download-pdf-employees',['id'=>$show->id]) ."' class='btn btn-success'> visa Details </a>".'</td>'.
                            '</tr>';
                }
                return response($output);
            }
        }
    }
}
