use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

// ...

protected function create(array $data)
{
    // Handle file upload if provided
    $profilePicturePath = null;
    if (request()->hasFile('profile_picture')) {
        $profilePicturePath = request()->file('profile_picture')->store('profile_pictures', 'public');
    }

    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'profile_picture' => $profilePicturePath,
    ]);
}
