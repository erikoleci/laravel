<?php

use App\User;
use App\Agents;
use App\Desks;
use Illuminate\Support\Facades\Auth;

if ( ! function_exists('logged_in')) {
    function logged_in()
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service', 'caposala' , 'officemanager' , 'admin'];

    
        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->check()) {
                return Auth::guard($guard)->user();
            }
        }

        return null;
    }
}

if ( ! function_exists('getGuards')) {
    function getGuards()
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service','caposala' , 'officemanager', 'admin'];

   

        return $validGuards;
    }
}

if ( ! function_exists('get_guard')) {
    function get_guard()
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service','caposala' , 'officemanager', 'admin'];

    
        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard;
            }
        }

        return null;
    }
}

if ( ! function_exists('hasanyguard')) {
    function hasanyguard($guards)
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service', 'caposala' , 'officemanager', 'admin'];

  
        foreach ($validGuards as $guard) {
            foreach($guards as $g) {
                if (Auth::guard($guard)->check()&&$guard==$g) {
                    return $guard;
                }
            }
        }

        return null;
    }
}

if ( ! function_exists('hasguard')) {
    function hasguard($g)
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service', 'caposala' , 'officemanager', 'admin'];

     
        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->check()&&$guard==$g) {
                return $guard;
            }
        }

        return null;
    }
}

if ( ! function_exists('onlyguard')) {
    function onlyguard($g)
    {
        $validGuards = ['starter', 'affiliator', 'manager', 'teamleader', 'customer_service', 'caposala' , 'officemanager', 'admin'];

        $otherGuard = array_diff( $validGuards, [$g] );
        // guard specified

        $onlyAdmin=true;

            foreach ($validGuards as $guard) {
                foreach($otherGuard as $og) {
                    if (Auth::guard($guard)->check()&&$guard==$og) {
                        $onlyAdmin = false;
                    }
                }
            }
            return $onlyAdmin;

    }
}

if ( ! function_exists('adminGuard')) {
    function adminGuard()
    {


        if (Auth::guard('admin')->check()) {
            return true;
        }
        else
            return false;
    }
}

if ( ! function_exists('logout_except')) {
    function logout_except($g)
    {
        $validGuards = ['starter', 'affiliator', 'manager',  'teamleader', 'customer_service', 'caposala' , 'officemanager', 'admin'];

 
        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->check()&&$guard!=$g) {
                Auth::guard($guard)->logout();
            }
        }

        return null;
    }
}

if ( ! function_exists('getAllGuards')) {
    function getAllGuards()
    {
        $validGuards = ['starter', 'affiliator', 'manager',  'teamleader', 'customer_service', 'caposala' , 'officemanager', 'admin'];

        // guard specified

        $userGuards=array();

        foreach ($validGuards as $guard) {
            if (Auth::guard($guard)->check()) {
                array_push($userGuards, $guard);
            }
        }



        return $userGuards;
    }
}

function guardAccount($g)
{
    $validGuards = ['starter'=>'WLB31-Starter', 'affiliator'=>'affiliator' , 'manager'=>'manager' , 'teamleader'=>'teamleader' , 'customer_service'=>'customer_service', 'caposala'=>'caposala', 'officemanager'=>'officemanager', 'admin'=>'admin'];

    foreach ($validGuards as $key=>$guard) {
        if ($key==$g) {
            return $guard;
        }
    }

    return null;
}

function accountToMT4($g)
{
    $validGuards = ['starter'=>'WLB31-Starter', 'affiliator'=>'affiliator' , 'manager'=>'manager', 'teamleader'=>'teamleader' , 'customer_service'=>'customer_service', 'caposala'=>'caposala', 'officemanager'=>'officemanager', 'admin'=>'admin'];

    foreach ($validGuards as $key=>$guard) {
        if ($guard==$g) {
            return $key;
        }
    }

    return null;
}

function groupToGuard($group){
    $validGuards = ['WLB31-Starter'=>'starter', 'affiliator'=>'affiliator' , 'manager'=>'manager', 'teamleader'=>'teamleader' ,   'caposala'=>'caposala', 'officemanager'=>'officemanager', 'customer_service'=>'customer_service', 'admin'=>'admin'];

    foreach ($validGuards as $key=>$guard) {
        if ($key==$group) {
            return $guard;
        }
    }

    return null;

}

function guardName($g)
{
    $validGuards = ['starter'=>'Starter', 'affiliator'=>'Affiliator' , 'manager'=>'Manager',  'teamleader'=>'Teamleader' , 'customer_service'=>'Customer_Service',  'caposala'=>'Caposala', 'officemanager'=>'Officemanager', 'admin'=>'Admin'];

    
    foreach ($validGuards as $key=>$guard) {
        if ($key==$g) {
            return $guard;
        }
    }

    return null;
}

function accountToGuard($g)
{
    $validGuards = ['starter'=>'WLB31-Starter', 'affiliator'=>'affiliator' , 'manager'=>'manager',  'teamleader'=>'teamleader' , 'customer_service'=>'customer_service',  'caposala'=>'caposala', 'officemanager'=>'officemanager', 'admin'=>'admin'];

    foreach ($validGuards as $key=>$guard) {
        if ($guard==$g) {
            return $key;
        }
    }

    return null;
}

function accountLeverage($g)
{
    $validGuards = ['starter' =>'100','affiliator'=>'100' ,'manager'=>'100', 'teamleader'=>'100' , 'customer_service'=>'100', 'caposala'=>'100', 'officemanager'=>'100', 'admin'=>'1'];

  
    foreach ($validGuards as $key=>$guard) {
        if ($key==$g) {
            return $guard;
        }
    }

    return null;
}

function allowedLanguage($lang){

    $validLanguages = ['EN'=>'en', 'UK'=>'en', 'US'=>'en', 'IT'=>'it', 'ES'=>'es', 'GR'=>'gr', 'DE'=>'de'];
    foreach ($validLanguages as $key=>$language) {
        if ($key==$lang) {
            return $language;
        }
    }
}

function fixPrefixNumber($prefix, $num){
    $withoutPlus = str_replace("+", "", $prefix);
    if ($withoutPlus[0]==0){
        $withoutZero = str_replace(0, "", $withoutPlus[0]);
    }
    else {
        $withoutZero = $withoutPlus;
    }
    return (string) $withoutZero.$num;
}


function findManager($id){
    $managers = \App\Agents::where('account_id', 'manager')->get();

    foreach ($managers as $manager){
        if ($manager->id === $id)

         return $manager->name;
    }

}


function findTeamleader($id){
    $teamleader = \App\Agents::where('account_id', 'teamleader')->get();

    foreach ($teamleader as $teamleader){
        if ($teamleader->id === $id)

         return $teamleader->name;
    }

}



function findStatus($id){
    $statuses = \App\Status::whereNotNull('id')->get();

    foreach ($statuses as $status){
        if ($status->id === $id)

            return $status->status;
    }

}


function findDesk($id){
    $desks = \App\Desks::whereNotNull('id')->get();

    foreach ($desks as $desk){
        if ($desk->id == $id)

            return $desk->desk;
    }

}



function getUsername($userId) {
    return User::where('user_id', $userId)->first()->name;
}
