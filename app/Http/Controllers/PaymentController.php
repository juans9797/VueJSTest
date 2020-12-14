<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function createUser()
    {
        $user = new User();
        $user->name = 'Juan';
        $user->email = 'juan@gmail.com';
        $user->password = '1234';
        $user->save();

    }


    public function getSetUpIntent()
    {
        $user = new User();
        return response($user->createSetupIntent(),Response::HTTP_OK);
    }

    public function postPayment(Request $request)
    {
        $user = User::where('email','juan@gmail.com')->firstOrFail();
        $paymentMethodID = $request->get('payment_method');

        if( $user->stripe_id == null ){
            $user->createAsStripeCustomer();
        }

        $user->addPaymentMethod( $paymentMethodID );
        $user->updateDefaultPaymentMethod( $paymentMethodID );

        return response()->json( null, 204 );
    }

    public function getPaymentMethods()
    {
        $user = User::where('email','juan@gmail.com')->firstOrFail();
        $paymentMethods = $user->paymentMethods();
        dd($paymentMethods);
        return response(json_encode($paymentMethods),Response::HTTP_OK);
    }

    public function singlePayment(Request $request)
    {
        $user = User::where('email','juan@gmail.com')->firstOrFail();
        $user->charge(800, 'pm_1Hy9CXGDeLuTbz9VLrcv1Qnw');
        return response()->json( null, 204 );
    }
}
