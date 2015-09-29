<?php 
use Illuminate\Database\Eloquent\Model;

class User extends Model {

    protected $table = 'user';

    public function setUser ($userName, $password, $createdAt, $updatedAt, $userTypeId, $userStatus = 1) {
        $user = new User();

        return $user;
    }
    public function getUser ($userId) {}

    public function setUserPassword ($password) {
        $newPassword = Hash::make($password);

        return $newPassword;
    }
    public function getUserPassword ($userId) {
        return "";
    }

    public function updateUser (userId, $parameters) {}
    
    public function setUserType () {
        return true;
    }
    
    public function getUserByPassword ($username, $password) {
        static::where('user', '=', $username)
                ->where('password', '=', $password)
                ->first()
                ->get();

    }
    public function getUserType () {
        return 1;
    }
}
