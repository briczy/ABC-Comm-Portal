<?php
namespace classes\data;

use classes\entity\User;
use classes\util\DBUtil;
/**
 * 
 * @author Joy
 *
 */
class UserManagerDB
{
    /**
     * 
     * @param unknown $row
     * @return \classes\entity\User
     */
    public static function fillUser($row){
        $user=new User();
        $user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
        $user->password=$row["password"];
        $user->is_admin=$row["is_admin"];
        $user->is_block=$row["is_block"];
        return $user;
    }
    /**
     * 
     * @param unknown $email
     * @param unknown $password
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
        $sql="select * from tb_user where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param unknown $email
     * @return NULL|\classes\entity\User
     */
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_user where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    /**
     * 
     * @param User $user
     */
    public static function saveUser(User $user){
        $conn=DBUtil::getConnection();
        $sql="call procSaveUser(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssii", $user->id,$user->firstName, $user->lastName, $user->email,$user->password, $user->is_admin, $user->is_block); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    /**
     * 
     * @return \classes\entity\User[]
     */
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
}

?>