x<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    private $_id;
    public function authenticate() {
        //   $username=$_POST['username'];
        $user = User::model()->findByAttributes(array('usercode' => $this->username));
        print_r($user);
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->password !== $this->password) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {

            $this->_id = $user->id;
            $this->setState('lastLoginTime', $user->lastLoginTime);
            $this->errorCode = self::ERROR_NONE;
            $this->_id = $user->usercode;
        }
        return !$this->errorCode;
    }
    public function getId() {
        return $this->_id;
    }
    public function getName()
    {
         echo $this->_id;
          $user = User::model()->findByAttributes(array('usercode' =>$this->_id));
          return "ชื่อ-นามสกุล $user->firstname_th  $user->lastname_th ";
    }
    public function getPosition()
    {
       
          $user = User::model()->findByAttributes(array('usercode' =>$this->_id));
          return " ตำแหน่ง : $user->position_name ";
    }

}