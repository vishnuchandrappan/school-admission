<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use App\Models\UserType;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{

    public function index()
    {
        return $this->SuccessData(User::all());
    }

    public function show(User $user)
    {
        return $this->SuccessData($user);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->only([
            'name', 'email', 'password', 'phone'
        ]);

        $user = User::create($data);
        //$this->sendVerificationEmail($user);
        return $this->SuccessData($user, 'user created');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->SuccessResponse('user deleted');
    }

    public function verifyUser(Request $request)
    {
        try {
            $user = User::findOrFail($request->sub);
        } catch (Exception $e) {
            return $this->ErrorResponse('unauthorized', 401);
        }

        if (!Hash::check("$user->name $user->created_at", $request->hash)) {
            return $this->ErrorResponse('forbidden', 403);
        }

        $user->email_verified_at = Carbon::now();
        $user->save();
        return $this->SuccessResponse('user verified');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = auth()->user();

        $credentials = [
            'email' => $user->email,
            'password' => $request->current_password,
        ];

        if (!Auth::attempt($credentials)) {
            return $this->ErrorResponse('Your current password is wrong', 401);
        }

        $user->password = $request->password;
        $user->save();

        return $this->SuccessResponse('Password updated successfully', 201);
    }

    public function getStudents(Request $request)
    {
        $limit = 1;

        if ($request->limit) {
            $limit = $request->limit;
        }

        $students = UserType::where('name', 'student')->first()->users()->with('details.docType')->paginate($limit);
        return $this->SuccessData($students);
    }

    public function getStudent(User $user)
    {
        $student = User::where('id', $user->id)->with('details.docType')->first();
        return $this->SuccessData($student);
    }


    private function sendVerificationEmail(User $user)
    {
        Mail::to($user)->send(new VerificationMail($user));
    }
}
