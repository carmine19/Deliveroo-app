<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function nonce(Request $request){

      $gateway = new \Braintree\Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'sqz9bg7z2tr87qrf',
        'publicKey' => 'k64srjftdsf5tfvk',
        'privateKey' => 'faae27a418fb7c080532714d78d7cdf1'
      ]);

      $nonceFromTheClient = $request->nonce;
      $total_price = $request->totalprice;
      $guest_firstName = $request->firstName;
      $guest_lastName = $request->lastName;
      $guest_phone = $request->phone;
      $guest_email = $request->email;
      $guest_address = $request->streetAddress;
      $guest_postalCode = $request->postalCode;


      $result = $gateway->transaction()->sale([
        'amount' => $total_price,
        'paymentMethodNonce' => $nonceFromTheClient,
        'customer' => [
            'firstName' => $guest_firstName,
            'lastName' => $guest_lastName,
            'phone' => $guest_phone,
            'email' => $guest_email
          ],
          'billing' => [
            'firstName' => $guest_firstName,
            'lastName' => $guest_lastName,
            'streetAddress' => $guest_address,
            'postalCode' => $guest_postalCode,
            'locality' => 'BoolNation'
          ],
          'shipping' => [
            'firstName' => $guest_firstName,
            'lastName' => $guest_lastName,
            'streetAddress' => $guest_address,
            'postalCode' => $guest_postalCode,
            'locality' => 'BoolNation'
          ],
        'options' => [
          'submitForSettlement' => True
        ]
      ]);

      return response()->json([$request->all()]);
    }
}
