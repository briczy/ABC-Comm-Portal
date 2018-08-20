<?php
namespace classes\business;
/**
 * uses
 */
use classes\entity\User;
use classes\data\UserManagerDB;
/**
 * 
 * @author Joy
 *
 */
class UserManager
{   
    /**
     * 
     * @return \classes\entity\User[]
     */
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    /**
     * 
     * @param unknown $email
     * @param unknown $password
     * @return NULL|\classes\entity\User
     */
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    /**
     * 
     * @param User $user
     */
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
    }
}

?>