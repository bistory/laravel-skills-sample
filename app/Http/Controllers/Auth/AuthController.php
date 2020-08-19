<?php

namespace App\Http\Controllers\Auth;

use App\Classes\Actions\Auth\Login;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\User\User;
use App\Services\Email\EmailService;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function login(Request $request): array
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        return (new Login())->do();
    }
}
