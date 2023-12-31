namespace App\Http\Controllers\Back\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
public function showRegistrationForm()
{
return view('auth.register');
}

public function register(Request $request)
{

$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:8|confirmed',
]);


$user = User::create([
'name' => $request->input('name'),
'email' => $request->input('email'),
'password' => Hash::make($request->input('password')),
]);


Auth::login($user);


}
}