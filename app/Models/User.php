<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model {

    protected $table = 'user';

    public static function loginNormal ($email, $password) {
        if (User::countUsersWEmail($email) > 0) {
            $user = User::where('email', '=', $email)->get()->first();
            if (Hash::check($password, $user->password)) {
                $_SESSION['agh-user'] = $user;
                return 1;
            } else {
                return 2;
            }
        } else {
            return 4;
        }
    }

    public static function countUsersWEmail ($email) {
        return User::where('email', '=', $email)->get()->count();
    }
}
