<?php

namespace App\Http\Controllers;

use App\Asal;
use App\AsalBill;
use App\Employee;
use Carbon\Carbon; 
use Illuminate\Http\Request;
use Session;
use PDF;
class AsalController extends Controller
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
    	$asals = Employee::join('asals', 'asals.employee_id', '=', 'employees.id')
                          ->select('employees.doc_number','asals.*')
                          ->orderBy('id', 'DESC')
                          ->get();
       return view('admin.asal.asal',compact('asals'));
    }


    //download asal
     // for make pdf
    public function download($id){  
        $asal = Employee::join('asals', 'asals.employee_id', '=', 'employees.id')
                      ->select('employees.application_number','asals.*')
                      ->where('asals.id',$id)
                      ->first();
        $asalBills = AsalBill::where('asal_id',$id)->get(); 
        $sum = AsalBill::where('asal_id',$id)->sum('jumlash'); 
        $pdf = PDF::loadView('admin.asal.asal-pdf',compact('asal','asalBills','sum'));
        return $pdf->download('asal.pdf')->header('Content-Type','application/pdf');
        dd($asal);
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    	if(Asal::where('employee_id',$id)->first()){
            return '<div style="background: #C7E8FA; margin: 0; padding: 0;color: #003C73; width: 100hr; height: 100vh; display: flex; align-items: center; justify-content:center; font-size: 60px; text-shadow: 1px 3px 2px #00A1FC; text-transform:capitalize">all ready asal created &nbsp;&nbsp;&nbsp;<a href="/admin/employee/asal" >go Back</a></div> ';
        }else{
        $asal = Employee::where('id',$id)
                           ->first(); 
         return view('admin.asal.add-asal',compact('asal'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'daripada'             	=> 'required', 
            'perniagaan'            => 'required', 
            'alamat'                => 'required', 
            'im'            		=> 'required', 
            'no_resit'    			=> 'required|unique:asals|max:255', 
            'date'        			=> 'required', 
            'ringgit'               => 'required', 
            'bayaran_name'          => 'required', 
            'bayaran_number'        => 'required|unique:asals|max:255', 
            'ptj'                   => 'required', 
            'mashana_name'          => 'required', 
            'mashana_no'            => 'required', 
            'n_name'                => 'required', 
            'n_number'              => 'required', 
            'kelulusan'             => 'required', 
        ]);
         $asal = Asal::insert([
         	'employee_id'	   => $request['employee_id'],
            'daripada'         => $request['daripada'], 
            'perniagaan'       => $request['perniagaan'], 
            'alamat'           => $request['alamat'], 
            'im'               => $request['im'], 
            'no_resit'         => $request['no_resit'],  
            'date'              => $request['date'],  
            'ringgit'		   => $request['ringgit'],  
            'bayaran_name'     => $request['bayaran_name'],  
            'bayaran_number'   => $request['bayaran_number'],  
            'ptj'              => $request['ptj'],  
            'mashana_name'     => $request['mashana_name'],  
            'mashana_no'       => $request['mashana_no'],  
            'n_name'           => $request['n_name'],  
            'n_number'         => $request['n_number'],  
            'kelulusan'        => $request['kelulusan'],  
            'created_at'       => Carbon::now('Asia/Dhaka')->toDateTimeString()
        ]); 
         if($asal){
            Session::flash('success','value');
            return redirect(route('asals')); 
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $viewAsal = Asal::where('id',$id)
                           ->first();  
        return view('admin.asal.view-asal',compact('viewAsal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $editAsal = Asal::where('id',$id)
                           ->first();  
        return view('admin.asal.edit-asal',compact('editAsal'));
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
        $this->validate($request,[
            'daripada'             	=> 'required', 
            'perniagaan'            => 'required', 
            'alamat'                => 'required', 
            'im'            		=> 'required', 
            'no_resit'    			=> 'required|unique:asals|max:255', 
            'date'        			=> 'required', 
            'ringgit'               => 'required', 
            'bayaran_name'          => 'required', 
            'bayaran_number'        => 'required|unique:asals|max:255', 
            'ptj'                   => 'required', 
            'mashana_name'          => 'required', 
            'mashana_no'            => 'required', 
            'n_name'                => 'required', 
            'n_number'              => 'required', 
            'kelulusan'             => 'required', 
        ]);
         $updateAsal = Asal::find($request->asal_id);
         $updateAsal->daripada          = $request->daripada;
         $updateAsal->perniagaan        = $request->perniagaan;
         $updateAsal->alamat            = $request->alamat;
         $updateAsal->im           		= $request->im;
         $updateAsal->no_resit          = $request->no_resit; 
         $updateAsal->date          = $request->date;
         $updateAsal->ringgit           = $request->ringgit;
         $updateAsal->bayaran_name      = $request->bayaran_name;
         $updateAsal->bayaran_number    = $request->bayaran_number;  
         $updateAsal->ptj        		= $request->ptj;
         $updateAsal->mashana_name		= $request->mashana_name;
         $updateAsal->mashana_no    	= $request->mashana_no;
         $updateAsal->n_name            = $request->n_name;
         $updateAsal->n_number          = $request->n_number; 
         $updateAsal->kelulusan         = $request->kelulusan;  
         $updateAsal->Updated_at        = Carbon::now('Asia/Dhaka')->toDateTimeString();
         $updateAsal->save();
 
         if($updateAsal){
            Session::flash('success','value');
            return redirect(route('asals')); 
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
 */
}
