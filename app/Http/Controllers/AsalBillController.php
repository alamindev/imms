<?php

namespace App\Http\Controllers;

use App\Asal;
use App\AsalBill;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class AsalBillController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asalbills = Asal::join('asal_bills', 'asal_bills.asal_id', '=', 'asals.id')
                          ->select('asals.no_resit','asal_bills.*')
                          ->orderBy('id', 'DESC')
                          ->get();
       return view('admin.asalbill.asalbills',compact('asalbills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $asalbill = Asal::where('id',$id)
                           ->first(); 
         return view('admin.asalbill.asalbill-add',compact('asalbill'));
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
            'cod_imm'              => 'required|unique:asal_bills|max:255',  
            'keterangan'           => 'required',  
            'deposit'              => 'required|unique:asal_bills|max:255',  
            'kadar'                => 'required|numeric|digits_between:1,20',  
            'kuantiti'             => 'required|numeric|digits_between:1,10',  
        ]);
         $asalbill = AsalBill::insert([
            'asal_id'       => $request['asal_id'], 
            'cod_imm'       => $request['cod_imm'], 
            'keterangan'    => $request['keterangan'], 
            'deposit'       => $request['deposit'], 
            'kadar'         => $request['kadar'], 
            'kuantiti'      => $request['kuantiti'], 
            'jumlash'      => $request['kadar'] * $request['kuantiti'], 
            'created_at'    => Carbon::now('Asia/Dhaka')->toDateTimeString()
        ]); 
         if($asalbill){
            Session::flash('success','value');
            return redirect(route('asalbills')); 
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $viewAsalbill = AsalBill::where('id',$id)
                           ->first();  
        return view('admin.asalbill.view-asalbill',compact('viewAsalbill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $editAsalbill = AsalBill::where('id',$id)
                           ->first();  
        return view('admin.asalbill.edit-asalbill',compact('editAsalbill'));
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
            'cod_imm'               => 'required',  
            'keterangan'           => 'required',  
            'deposit'              => 'required',  
            'kadar'                => 'required|numeric|digits_between:1,20',  
            'kuantiti'             => 'required|numeric|digits_between:1,10',   
        ]);
         $updateAsalbill = AsalBill::find($request->asalbill_id);
         $updateAsalbill->asal_id           = $request->asal_id;  
         $updateAsalbill->cod_imm           = $request->cod_imm;  
         $updateAsalbill->keterangan        = $request->keterangan;  
         $updateAsalbill->deposit           = $request->deposit;  
         $updateAsalbill->kadar             = $request->kadar;  
         $updateAsalbill->kuantiti          = $request->kuantiti;  
         $updateAsalbill->Updated_at        = Carbon::now('Asia/Dhaka')->toDateTimeString();
         $updateAsalbill->save();
 
         if($updateAsalbill){
            Session::flash('success','value');
            return redirect(route('asalbills')); 
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
       public function destroy($id)
    {
        $delete = AsalBill::where('id',$id)->delete();
        return redirect(route('asalbills'));
    }
}
