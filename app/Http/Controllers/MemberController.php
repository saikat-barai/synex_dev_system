<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
   public function member(){
    $members = Member::latest()->paginate(5);
    return view('member.member',compact('members'));
   }
   public function add_member(Request $request)
   {
      $member = new Member();
      $member->name = $request->name;
      $member->phone = $request->phone;
      $member->save();
      return response()->json([
        'status'=>'success',
      ]);
   }
   public function update_member(Request $request){
     Member::where('id', $request->update_id)->update([
        'name'=>$request->update_name,
        'phone'=>$request->update_phone,
     ]);
     return response()->json([
        'status'=>'success'
     ]);
   }
   public function delete_member(Request $request){
    Member::find($request->update_id)->delete();
   }
}
