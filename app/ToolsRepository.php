<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToolsRepository extends Model
{
    //
    static function changeSpin($user_id, $value){
        $spin = User::where('id', $user_id)->update([
            'can_spin' => $value
        ]);

        return $spin;
    }

    static function getFile($upload){
//        if (Auth::user()->hasRole('admin')){
            $path = storage_path('uploads/'.$upload->user->name.'/') . $upload->filename;
            if (file_exists($path)) {
                return \Response::download($path);
            }
            else{
                return 'File does not exist';
            }
//        }
//        else {
//            $msg='Non hai i permessi per accedere a questo file';
//            session()->flash('info', [$msg]);
//            return redirect('/info');
//        }
    }


    static function updateUserAccount($user_id, $account_id){
        $user = User::find($user_id);

        $user->account_id=$account_id;
        $user->save();
//        User::where('id', $user_id)->update([
//            'account_id' => $account_id,
//        ]);
        return $user;
    }
}
