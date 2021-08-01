<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
        $this->sendVerificationEmail($user);
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

    private function sendVerificationEmail(User $user)
    {
        Mail::to($user)->send(new VerificationMail($user));
    }
}
