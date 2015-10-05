<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model {

    protected $table = 'user';

    public static function loginNormal ($user, $password) {
        if (User::countUsers($user) <= 0) {
            return 4;
        }

        $u = User::where('user_name', '=', $user)->get()->first();
        if (\Hash::check($password, $u->password)) {
            $_SESSION['agh-user'] = $u;
            return 1;
        } 

        return 2;
    }

    public static function logOut () {
        if (!isset($_SESSION['agh-user'])) {
            $result = ['Result'     => 'OK', 
                        'Message'   => 'No hay sesión iniciada'];
            return $result;
        }

        unset($_SESSION['agh-user']);
        $result = ['Result'     => 'OK', 
                    'Message'   => 'Sesión cerrada con éxito'];
        return $result;
    }

    public static function countUsersWEmail ($email) {
        return User::where('email', '=', $email)->get()->count();
    }

    public static function countUsers ($username) {
        return User::where('user_name', '=', $username)->get()->count();
    }

    public static function isLogged () {
        return (isset($_SESSION['agh-user'])) ? true: false;
    }

    public static function getUser ($userId = null) {
        $uId = $userId;
        if (is_null($userId) || !isset($userId)) {
            $uId = (User::isLogged()) ? $_SESSION['agh-user']['id'] : 0;
        }

        return User::find($uId);
    }
}
