<?php

namespace App\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function getSetUpIntent()
    {
        $user = new User();
        return response($user->createSetupIntent(),Response::HTTP_OK);
    }
}
