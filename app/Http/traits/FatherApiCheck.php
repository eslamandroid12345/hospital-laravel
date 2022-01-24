<?php


namespace App\Http\traits;


trait FatherApiCheck
{

    public function returnMessageSuccess($message,$code){

        return response()->json([
            'status'=>true,
            'message'=>$message,
            'code'=>$code

        ]);

    }


    public function returnMessageError($message,$code){

        return response()->json([

            'status'=>false,
            'message'=>$message,
            'code'=>$code

        ]);

    }



    public function returnDataSuccess($message,$code,$key,$value){

        return response()->json([

            'status'=>true,
            'message'=>$message,
            'code'=>$code,
            $key=>$value,

        ]);

    }


}
