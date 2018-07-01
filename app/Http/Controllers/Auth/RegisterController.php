<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\userRole;
use DB; 
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */ 

 
    public function __construct()
    {
         
    }
    
    public function index(){
        $users = User::where('userStatus',1)
                ->join('user_roles', 'users.roleId', '=', 'user_roles.roleId') 
                ->select('users.*','user_roles.roleName')
                ->get();
        return view('admin.users.allUser',compact('users'));
    }

 public function showRegistrationForm()
    {
        $userRole = userRole:: get();
        return view('admin.users.addUser',compact('userRole'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'phone' => 'required|max:11', 
            'email' => 'required|string|email|max:255|unique:users', 
            'userRole' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    { 
        //for upload images
      if(isset($data['userPhoto'])){
           $uploadPath = 'uploads';
           $file = $data['userPhoto'];
           $fileExtension = $file->getClientOriginalExtension();
           $fileName = '_user'.time().'-'.rand().'.'.$fileExtension;
           $success = $file->move($uploadPath, $fileName);  
           if($success){
            //for save the database
                return User::create([
                    'firstName' => $data['firstName'],
                    'lastName' => $data['lastName'],
                    'userName' => $data['userName'],
                    'phone' => $data['phone'], 
                    'email' => $data['email'],
                    'userPhoto' => $fileName,
                    'roleId' => $data['userRole'],
                    'password' => bcrypt($data['password']),
                ]); 
           }
       }else{
       //for save the database
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'userName' => $data['userName'],
            'phone' => $data['phone'], 
            'email' => $data['email'], 
            'roleId' => $data['userRole'],
            'password' => bcrypt($data['password']),
        ]);
        } 
    }
   
    public function show(Request $request, $id){
        $viewUser = User::join('user_roles','users.roleId','=','user_roles.roleId')
                           ->select('users.*','user_roles.roleName')
                           ->where('userStatus',1)
                           ->where('id',$id)
                           ->first();  
        return view('admin.users.view',compact('viewUser'));
    }
     /*for edit user */
    public function edit($id){
        $edit= User::join('user_roles','users.roleId','=','user_roles.roleId')
                           ->select('users.*','user_roles.roleName')
                           ->where('userStatus',1)
                           ->where('id',$id)
                           ->first(); 
         $userRole = userRole::all();
        return view('admin.users.edit',['edit'=>$edit,'userRole'=>$userRole]);
    }
    /*coding for user update*/
    public function update(Request $request){
        $fileName = $this->photoExits($request);
        $users = User::find($request->updateUser);
        $users->firstName = $request->firstName;
        $users->lastName = $request->lastName;
        $users->userName = $request->userName;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->userPhoto = $fileName;
        $users->roleId = $request->userRole;
        $users->save();
        return redirect('admin/users');
    }
    
    //coding for update photo
    private function photoExits($request){
        $this->validate($request, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'userName' => 'required|string|max:255',
            'phone' => 'required|max:11', 
            'email' => 'required|string|email|max:255', 
        ]);
        $userImage= User::where('id',$request->updateUser)->first();
        $imgName = $request->hasFile('userImage');
        if($imgName){
           $file_path = $userImage->userPhoto;
           $path = 'uploads/'.$file_path; 
           unlink($path);
            //upload new image
                $uploadPath = 'uploads';
                $file = $request->userImage;
                $fileExtension = $file->getClientOriginalExtension();
                $fileName = '_user'.time().'-'.rand().'.'.$fileExtension;
                $file->move($uploadPath, $fileName); 
        }else{
            $fileName = $userImage->userPhoto;
        }
        return $fileName;
    } 
    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return  redirect('/admin/users');    }
}
