<?php
/**
 * Created by PhpStorm.
 * User: 99455
 * Date: 7/24/2020
 * Time: 2:48 PM
 */
function microtimeFileName($file){

    $microtime=microtime();
    $microtime=str_replace(' ','',$microtime);
    $microtime=str_replace('.','',$microtime);
    $microtime=$microtime.'.'.$file->getClientOriginalExtension();
    return $microtime;
}
function permission(){

    $role=\App\Admins::find(admins_auth()->user()->id)->role->permission;
    $permisson=json_decode($role,true);
    return $permisson;
}
