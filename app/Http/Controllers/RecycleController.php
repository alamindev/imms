<?php

namespace App\Http\Controllers;

use App\Asal;
use App\AsalBill;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function __construct(){
    	 $this->middleware('auth');
    }

    public function userRecycle(){
    	$users = User::onlyTrashed()->get();
    	return view('admin.recycle.user_re',compact('users'));
    } 
  public function searchUser(Request $request){
    	if($request->ajax()){
            $output = '';
            $i = 1;
            $shows = User::onlyTrashed()->where('email','LIKE','%'.$request->user.'%')->get(); 

            if(count($shows) == 0){
                $data = "<h5 style='text-align:center; padding:10px; width: 300%;'>Data Not Found</h5>";
                return  $data;
            } else{
                foreach($shows as $key => $show){
                    $output.='<tr>'.
                                '<td>'.$i++.'</td>'.
                                '<td>'.$show->userName.'</td>'.
                                '<td>'.$show->email.'</td>'.
                                '<td>'.$show->phone.'</td>'.
                                '<td>'.$show->roles->roleName .'</td>'.
                                '<td style="text-align:center">'."<button id='restore' data-id='".$show->id."' class='btn btn-success btn-sm'> restore </button><button id='del' data-id='".$show->id."' class='btn btn-danger btn-sm'> Delete </button> ".'</td>'.
                            '</tr>';
                }
                return response($output);
            }
        }
    } 

    public function restoreUser($id){
    	User::where('id',$id)->restore();
    	return response()->json(['success' => 'Restore successfully!']);
    }    
    public function permanentDeleteUser($id){
    	$user = User::onlyTrashed()->where('id',$id)->first();  
    	$file_path = $user->userPhoto;
    	if(empty($file_path)){
            $user->forceDelete();
        }else{
           if(file_exists($file_path)){
            unlink('/uploads/'.$file_path);
             
         }else{
            $user->forceDelete(); 
         }
        }
    	return response()->json(['success' => 'Data Permanently deleted successfully!']);
    }

//for parmently delete for employee

   public function employeeRecycle(){
        $employees = Employee::onlyTrashed()->get();
        return view('admin.recycle.employee_re',compact('employees'));
    } 

  public function searchEmployee(Request $request){
        if($request->ajax()){
            $output = '';
            $i = 1;
            $shows = Employee::onlyTrashed()->where('doc_number','LIKE','%'.$request->doc_number.'%')->get(); 

            if(count($shows) == 0){
                $data = "<h5 style='text-align:center; padding:10px; width: 400%;'>Data Not Found</h5>";
                return  $data;
            } else{
                foreach($shows as $key => $show){
                    $output.='<tr>'.
                                '<td>'.$i++.'</td>'.
                                '<td>'.$show->employee_name.'</td>'.
                                '<td>'.$show->company_reg_no.'</td>'.
                                '<td>'.$show->doc_number.'</td>'.
                                '<td>'.$show->application_number .'</td>'.
                                '<td style="text-align:center">'."<button id='restore' data-id='".$show->id."' class='btn btn-success btn-sm'> restore </button><button id='del' data-id='".$show->id."' class='btn btn-danger btn-sm'> Delete </button> ".'</td>'.
                            '</tr>';
                }
                return response($output);
            }
        }
    }
    public function restoreEmployee($id){
        Employee::where('id',$id)->restore();
        Asal::where('employee_id',$id)->restore();
        AsalBill::where('asal_id',$id)->restore();
        return response()->json(['success' => 'Restore successfully!']);
    }    
    public function permanentDeleteEmployee($id){
        $employee = Employee::onlyTrashed()->where('id',$id)->first();
                    Asal::where('employee_id',$id)->forceDelete();
                    AsalBill::where('asal_id',$id)->forceDelete();        
        $file_path = $employee->picture;
        if(empty($file_path)){
            $employee->forceDelete();
        }else{
            if (file_exists($file_path)) {
                unlink(public_path().'/uploads/'.$file_path);
                 $employee->forceDelete(); 
            }else{
                $employee->forceDelete(); 
            } 
        }
        return response()->json(['success' => 'Data Permanently deleted successfully!']);
    } 
//for parmently delete for asalbill

   public function asalBillRecycle(){
        $asalbills = AsalBill::onlyTrashed()->get();
        return view('admin.recycle.asalbill_re',compact('asalbills'));
    } 

  public function searchAsalBill(Request $request){
        if($request->ajax()){
            $output = '';
            $i = 1;
            $asalbills = Asal::join('asal_bills', 'asal_bills.asal_id', '=', 'asals.id')
                          ->select('asals.no_resit','asal_bills.*')
                          ->onlyTrashed()->where('cod_imm','LIKE','%'.$request->cod_imm.'%')
                          ->get(); 

            if(count($asalbills) == 0){
                $data = "<h5 style='text-align:center; padding:10px; width: 300%;'>Data Not Found</h5>";
                return  $data;
            } else{
                foreach($asalbills as $key => $asalbill){
                    $output.='<tr>'.
                                '<td>'.$i++.'</td>'.
                                '<td>'.$asalbill->cod_imm.'</td>'.
                                '<td>'.$asalbill->keterangan.'</td>'.
                                '<td>'.$asalbill->deposit.'</td>'.
                                '<td>'.$asalbill->no_resit.'</td>'.
                                '<td style="text-align:center">'."<button id='restore' data-id='".$asalbill->id."' class='btn btn-success btn-sm'> restore </button><button id='del' data-id='".$asalbill->id."' class='btn btn-danger btn-sm'> Delete </button> ".'</td>'.
                            '</tr>';
                }
                return response($output);
            }
        }
    }

    public function restoreAsalBill($id){
        AsalBill::where('id',$id)->restore();
        return response()->json(['success' => 'Restore successfully!']);
    }    

    public function permanentDeleteAsalBill($id){
        $asalbill = AsalBill::onlyTrashed()->where('id',$id)->first();  
        $asalbill->forceDelete();  
        return response()->json(['success' => 'Data Permanently deleted successfully!']);
    }


}
