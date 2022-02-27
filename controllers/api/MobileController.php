<?php

namespace app\controllers\api;

use app\models\Wallet;
use Yii;

class MobileController extends ApiController {


    public function actionGetUserWallet() {


        $post = Yii::$app->request->post();
          $userId = $post["userId"];
          $wallet = Wallet::find()
                  ->where(["clientId"=>$userId])
                  ->one();
          return $wallet;
               
    }

//    public function actionSignup() {
//
//
//        $post = Yii::$app->request->post();
//
//        $fullname = $post["fullname"];
//
//        $password = $post["password"];
//        $phone = $post["phone"];
//        $villageId = $post["villageId"];
//        $address = $post["address"];
//        $token = $post["token"];
//        $email = $post["email"];
//        $secondPhone = $post["secondPhone"];
//
//
//        $user = new Users();
////        $user->username = $username;
//        $user->fullname = $fullname;
//        $user->password = $password;
//        $user->phone = $phone;
//        $user->address = $address;
//        $user->village = $villageId;
//        $user->token = $token;
//        $user->email = $email;
//        $user->second_phone = $secondPhone;
//
//
//
//
//
//
//        if ($user->save()) {
//
//
//            return true;
//        } else
//            return $user->errors;
//    }
//
//
//
//    public function actionLogin() {
//
//        $post = Yii::$app->request->post();
//        $phone = $post["phone"];
//        $password = $post["password"];
//        $token = $post["token"];
//
//        $user = Users::find()
//                ->where(['phone' => $phone])
//                ->andWhere(['password' => $password])
//                ->one();
//
//
//        if ($user) {
//            $user->token = $token;
//            if ($user->save()) {
//                return $user;
//            } else
//                return $user->getErrors();
//        }
//    }

    
    
}

   
         
  