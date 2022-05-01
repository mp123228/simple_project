<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use App\DataTables\UserTableDataTable;
use DataTables;
use Illuminate\Foundation\Auth\UserModel as Authenticatable;
use Image;
use Debugbar;
use File;
use App\User;
class UserController extends Controller
{
    //hello

    public function index(UserTableDataTable $dataTable)
    {
            return $dataTable->render('user.display');
    }

    function insert()
    {
        return view('user.add');
    }

    function getuser()
    {
        // $model = UserModel::query();

        // return DataTables::eloquent($model)
        // ->addColumn('intro', 'user.details')
        // ->toJson();

        $model = UserModel::query();

        return DataTables::eloquent($model) ->addColumn('intro', 'hii name')->toJson();
    
    }

    // function show()
    // {
    //      $user=UserModel::all();
       
    //      return view('user.details',['data'=>$user]);
    // }

    function home()
    {
        return view('welcome');
    }

    function show(UserTableDataTable $dataTable)
    {
            return $dataTable->render('user.details');
    }
    
    function storein(Request $request)
    {

        // $this->validate($reqeust,['image'=>'required:image:mimes:jpeg
        // ,png,jpg,gif,svg|max:2048']);

        $user=new UserModel();
        $user->firstname=$request->input('firstname');
        $user->lastname=$request->input('lastname');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->types=$request->input('types');
        $image=$request->file('image');
        
        // error_log("iamge error log:".$image);

        $image_name=time().".".$image->getClientOriginalExtension();

        $destinationPath=public_path('/thumbnail');
        $resize_image=Image::make($image->getRealPath());
        $resize_image->resize(32,32,function($constraint)
        {
            $constraint->aspectRatio();

        })->save($destinationPath.'/'.$image_name);

        $user->thumbnail='thumbnail/'.$image_name;

        $destinationPathLowImage=public_path('/imageslowpx');
        $resize_imageLow=Image::make($image->getRealPath());
        $resize_imageLow->resize(128,128,function($constraintLow)
        {
            $constraintLow->aspectRatio();
        })->save($destinationPathLowImage.'/'.$image_name);

        $user->imagelowpx_path='imageslowpx/'.$image_name;

        $OriginaldestinationPath=public_path('/images');
        $image->move($OriginaldestinationPath,$image_name);    
        
        $user->image_path='images/'.$image_name;
        
        $user->save();

        return redirect('/details')->with('msg','Add Successfully');

    }

    function deletedata(request $request,$id)
    {
        $user=UserModel::findOrFail($id);

        if(!empty($user->image_path))
        {
            
                if(File::exists($user->image_path))
                {
                        File::delete($user->image_path);
                }

                if(File::exists($user->imagelowpx_path))
                {
                        File::delete($user->imagelowpx_path);
                }

                if(File::exists($user->thumbnail))
                {
                        File::delete($user->thumbnail);
                }
        }


        $user->delete();

        return redirect('/details')->with('msg','delete successfullly');
    
    }

    function updatefrm($id)
    {
        $user=UserModel::find($id);
        return view('user.update',['data'=>$user]);
    }

    function registerpage()
    {
        return view('auth.register');
    }

    function saveRegister(Request $request)
    {

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> \Hash::make($request->password)
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }

        return redirect('register')->withError('Error');

    }
 
    function loginpage()
    {

        return view('auth.login');
    }

    function saveLogin(Request $request)
    {
        
        session()->put('login',"login successfully");
        
        $data=['employee','manager','tl'];
        
        if(\Auth::attempt($request->only('email','password')))
        {
            // return redirect('/home')->with('login','login successfully in home');
            return view('welcome',['data'=>$data]);
        }

        return redirect('login')->withError('Login details are not valid');

    }

        function getdetails()
        {

            return view('user.displaycolne');

            // $user=UserModel::all();
            // return response()->json($user);

        }

        function getrecord()
        {

            $user=UserModel::all();

            return json_encode(array('data'=>$user));

        }



        function updatedata(request $request ,$id)
        {
            $user=UserModel::find($id);

            // $user->firstname=request('firstname');
            // $user->lastname=request('lastname');
            // $user->email=request('email');
            // $user->password=request('password');ail)
            // error_log("Original image path=".$user->image_path);
            // error_log("128px image path=".$user->imagelowpx_path);
            // error_log("thumbnail image path=".$user->thumbnail);

            if(!empty($user->image_path))
            {
                if($request->hasfile('image'))
                {

                    if(File::exists($user->image_path))
                    {
                            File::delete($user->image_path);
                    }

                    if(File::exists($user->imagelowpx_path))
                    {
                            File::delete($user->imagelowpx_path);
                    }

                    if(File::exists($user->thumbnail))
                    {
                            File::delete($user->thumbnail);
                    }
                }
            }

            // $user->save();
            $user->firstname=$request->input('firstname');
            $user->lastname=$request->input('lastname');
            $user->email=$request->input('email');
            $user->password=$request->input('password');
            $user->types=$request->input('types');
            $image=$request->file('image');
            
            // error_log("iamge error log:".$image);
    
            $image_name=time().".".$image->getClientOriginalExtension();
    
            $destinationPath=public_path('/thumbnail');

            $resize_image=Image::make($image->getRealPath());

            $resize_image->resize(32,32,function($constraint)
            {
                $constraint->aspectRatio();

            })->save($destinationPath.'/'.$image_name);
    
            $user->thumbnail='thumbnail/'.$image_name;
    
            $destinationPathLowImage=public_path('/imageslowpx');
            $resize_imageLow=Image::make($image->getRealPath());
            $resize_imageLow->resize(128,128,function($constraintLow)
            {
                $constraintLow->aspectRatio();

            })->save($destinationPathLowImage.'/'.$image_name);
    
            $user->imagelowpx_path='imageslowpx/'.$image_name;
    
            $OriginaldestinationPath=public_path('/images');
            $image->move($OriginaldestinationPath,$image_name);    
            
            $user->image_path='images/'.$image_name;
            
            $user->save();

            return redirect('/details')->with('msg','Record updaated successfully');

        }

        public function logout(){
            \Session::flush();
            \Auth::logout();
            return redirect('/login');
        }

}
