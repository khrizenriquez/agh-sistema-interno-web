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
        return var_dump(\Hash::check($password, $u->password));
        if (\Hash::check($password, $u->password)) {
            $_SESSION['agh-user'] = $u;
            return 1;
        } 

        return 2;
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
}
