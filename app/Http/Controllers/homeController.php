<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Input as input;

class HomeController extends Controller
{
    /**
     * 
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return view('website.master');
    }

     // coding for search 
     public function search(Request $request){  
             $queryBuilder = Employee::query()->where('deleted_at','=', NULL);
                 if($request->employee_identy != NULL){
                     if (Input::has('employee_identy')){
                         $queryBuilder->identiy(Input::get('employee_identy'));
                        } 
                    if (Input::has('application_number')){
                         $queryBuilder->application(Input::get('application_number'));
                        } 
                    }else{ 
                        if (Input::has('company_reg_no')){
                             $queryBuilder ->company(Input::get('company_reg_no'));
                          } 
                        if (Input::has('application_number')){
                         $queryBuilder->application(Input::get('application_number'));
                        } 
                    }
             $employees= $queryBuilder->paginate(5);
                $employees->appends(array(
                    'identification_card_no' => Input::get('employee_identy'),
                    'application_number'     => Input::get('application_number'),
                    'company_reg_no'         => Input::get('company_reg_no'),
                ));
             if(count($employees)>0){
                      return view('website.master')->withDetails($employees);
            }else{
               return view('website.master')->withMessage("data not found"); 
            }
            
        }

// $employee= new Employee; 
            // if($application = Input::get('application_number') && $company_reg_no = Input::get('company_reg_no')){
            //      $employee ->where('application_number', 'LIKE', $application);
            //      $employee ->where('company_reg_no', 'LIKE', $company_reg_no);  
            // } 
            // $employees = $employee->paginate(10);
          // $employee->appends(array(
                //     'application_number' => Input::get('application_number'),
                // ));
                // if(count($employee)>0){
                //       return view('website.master')->withDetails($employee);
                // }
}
