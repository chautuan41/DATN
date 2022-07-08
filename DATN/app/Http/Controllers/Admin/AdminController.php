<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\InvoiceDetail;
use App\Models\Invoice;
use App\Models\Categories;

class AdminController extends Controller
{
    public function indexLayoutAdmin(){
        $CT = Categories::all();
        return view('dashboard.layout.dashboard-admin',compact('CT'));
    }

    public function indexAdmin(){
        $dtInvD = DB::table('invoice_details')
        ->where('status','=', 1)
        ->get();
        //dd($dtInvD);
        $acc=DB::table('accounts')
        ->where('status','=', 1)
        ->where('role','=', 1)
        ->get();
        $acc=count($acc);
        $dtInv=DB::table('invoices')
        ->where('status','=', 1)
        ->get();
        //dd($dtInvD);
        return view('dashboard.home.home',compact('dtInvD','acc','dtInv'));
    }
    public function indexAdminDH(){
        return view('dashboard.layout.dashboard-watches');
    }
    public function indexAdminCL(){
        return view('dashboard.layout.dashboard-clothing');
    }
    public function indexAdminWH(){
        return view('dashboard.layout.dashboard-warehouse');
    }
    public function indexAdminSL(){
        return view('dashboard.layout.dashboard-seller');
    }

    // Admin
    public function personalInfo($id_admin){
        $lsAdmin = Account::find($id_admin);
        // dd($lsAdmin);
        return view('dashboard.admin.admin_personal',compact('id_admin','lsAdmin'));

    }
    
    public function handlePersonalInfo(Request $request, $id_admin){
        $ad = Account::find($id_admin);
        $ad->email = $request->email;
        $ad->full_name = $request->full_name;
        $ad->date_of_birth = $request->date_of_birth;
        $ad->phone = $request->phone;
        $ad->address = $request->address;
        $ad->avatar = "empty";
        $ad->save();
        return redirect()->back()->with("success","Update successful");
    }

    public function formChangePW($id_admin){
        $lsAdmin = Account::find($id_admin); 
        return view('dashboard.admin.changepw',compact('id_admin','lsAdmin'));
        
    }
    
    public function handleChangePW(Request $request,$id_admin) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Current Passwords cannot match",$id_admin);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","New Passwords do not match the Current Password",$id_admin);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Confirm Password Fail",$id_admin);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Change Password successful",$id_admin);
    }

    //Clothing
    public function personalInfoCL($id_staff){
        $lsStaff = Account::find($id_staff);
        // dd($lsAdmin);
        return view('dashboard.PersonalInfo.cl_personal',compact('id_staff','lsStaff'));

    }
    
    public function handlePersonalInfoCL(Request $request, $id_staff){
        $staff = Account::find($id_staff);
        $staff->email = $request->email;
        $staff->full_name = $request->full_name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->avatar = "empty";
        $staff->save();
        return redirect()->back()->with("success","Update successful");
    }

    public function formChangePWCL($id_staff){
        $lsStaff = Account::find($id_staff); 
        return view('dashboard.changepassword.cl_changepw',compact('id_staff','lsStaff'));
        
    }
    
    public function handleChangePWCL(Request $request,$id_staff) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Current Passwords cannot match",$id_staff);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","New Passwords do not match the Current Password",$id_staff);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Confirm Password Fail",$id_staff);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Change Password successful",$id_staff);
    }

    //WareHouse
    public function personalInfoWH($id_staff){
        $lsStaff = Account::find($id_staff);
        // dd($lsStaff);
        return view('dashboard.PersonalInfo.wh_personal',compact('id_staff','lsStaff'));

    }
    
    public function handlePersonalInfoWH(Request $request, $id_staff){
        $staff = Account::find($id_staff);
        $staff->email = $request->email;
        $staff->full_name = $request->full_name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->avatar = "empty";
        $staff->save();
        return redirect()->back()->with("success","Update successful");
    }

    public function formChangePWWH($id_staff){
        $lsStaff = Account::find($id_staff); 
        return view('dashboard.changepassword.wh_changepw',compact('id_staff','lsStaff'));
        
    }
    
    public function handleChangePWWH(Request $request,$id_staff) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Current Passwords cannot match",$id_staff);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","New Passwords do not match the Current Password",$id_staff);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Confirm Password Fail",$id_staff);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Change Password successful",$id_staff);
    }

    // Watches
    public function personalInfoWC($id_staff){
        $lsStaff = Account::find($id_staff);
        // dd($lsStaff);
        return view('dashboard.PersonalInfo.wc_personal',compact('id_staff','lsStaff'));

    }
    
    public function handlePersonalInfoWC(Request $request, $id_staff){
        $staff = Account::find($id_staff);
        $staff->email = $request->email;
        $staff->full_name = $request->full_name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->avatar = "empty";
        $staff->save();
        return redirect()->back()->with("success","Update successful");
    }

    public function formChangePWWC($id_staff){
        $lsStaff = Account::find($id_staff); 
        return view('dashboard.changepassword.wc_changepw',compact('id_staff','lsStaff'));
        
    }
    
    public function handleChangePWWC(Request $request,$id_staff) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Current Passwords cannot match",$id_staff);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","New Passwords do not match the Current Password",$id_staff);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Confirm Password Fail",$id_staff);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Change Password successful",$id_staff);
    }

    // Seller
    public function personalInfoSL($id_staff){
        $lsStaff = Account::find($id_staff);
        // dd($lsStaff);
        return view('dashboard.PersonalInfo.sl_personal',compact('id_staff','lsStaff'));

    }
    
    public function handlePersonalInfoSL(Request $request, $id_staff){
        $staff = Account::find($id_staff);
        $staff->email = $request->email;
        $staff->full_name = $request->full_name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->avatar = "empty";
        $staff->save();
        return redirect()->back()->with("success","Update successful");
    }

    public function formChangePWSL($id_staff){
        $lsStaff = Account::find($id_staff); 
        return view('dashboard.changepassword.sl_changepw',compact('id_staff','lsStaff'));
        
    }
    
    public function handleChangePWSL(Request $request,$id_staff) {
        if (!(Hash::check($request->get('password_old'), Auth::user()->password))) {
            // Mật khẩu phù hợp
            return redirect()->back()->with("error","Current Passwords cannot match",$id_staff);
        }

        if(strcmp($request->get('password_old'), $request->get('password_new')) == 0){
            // Mật khẩu hiện tại và mật khẩu mới giống nhau
            return redirect()->back()->with("error","New Passwords do not match the Current Password",$id_staff);
        }
        if(strcmp($request->get('password_new'), $request->get('password_cf')) != 0){
            // Xác nhận mật khẩu không khớp.
            return redirect()->back()->with("error","Confirm Password Fail",$id_staff);
        }

        $validatedData = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|string|min:5',
            'password_cf' => 'required|same:password_new',
        ]);

        //Thay đổi password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password_new'));
        $user->save();

        return redirect()->back()->with("success","Change Password successful",$id_staff);
    }
}
