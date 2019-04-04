<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


$this->get('/', 'Site\SiteController@index');

Auth::routes();

Route::get('/checkout/success', function (){
  return 'Pagamento efetuado com Sucesso';
});

Route::get('/checkout/{id}', function ($id){
    $data = [];
    $data['email'] = 'email_sandbox_pagseguro';
    $data['token'] = 'token_pagseguro';
    $response = (new \App\PagSeguro\PagSeguro())->request(\App\PagSeguro\PagSeguro::SESSION_SANDBOX, $data);
    $session =new \SimpleXMLElement($response->getContents());
    $session = $session->id;
    $amount = number_format(521.50,2, '.', '');

   return view('store.checkout', compact('id', 'session', 'amount'));
});

// dados do pagseguro - pode ser preenchido pelo banco, sessao, api ..
Route::post('/checkout/{id}', function ($id){
    $data = request()->all();
    unset($data['_token']);
    $data['email'] = 'email_sandbox_pagseguro';
    $data['token'] = 'token_pagseguro';
    $data['paymentMode'] = 'default';
    $data['paymentMethod'] = 'creditCard';
    $data['receiverEmail'] = 'alessandra.mena@universidadebrasil.edu.br';
    $data['currency'] = 'BRL';


    $data['senderAreaCode'] = substr($data['senderPhone'], 0,2);
    $data['senderPhone'] = substr($data['senderPhone'], 2,strlen($data['senderPhone']));

    $data['creditCardHolderAreaCode'] = substr($data['creditCardHolderPhone'], 0,2);
    $data['creditCardHolderPhone'] = substr($data['creditCardHolderPhone'], 2,strlen($data['creditCardHolderPhone']));

    $data['installmentValue'] = number_format($data['installmentValue'], 2, '.', '');
    $data['shippingAddressCountry'] = 'BR';
    $data['billingAddressCountry'] = 'BR';

//  dados endereço setados na mão.
//    $data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
//    $data['shippingAddressNumber'] = '1384';
//    $data['shippingAddressComplement'] = '5o andar';
//    $data['shippingAddressDistrict'] = 'Jardim Paulistano';
//    $data['shippingAddressPostalCode'] = '01452002';
//    $data['shippingAddressCity'] = 'Sao Paulo';
//    $data['shippingAddressState'] = 'SP' ;



//    REMOVER try quando EM PRODUÇÃO
    try{
        $response = (new \App\PagSeguro\PagSeguro)->request(\App\PagSeguro\PagSeguro::CHECKOUT_SANDBOX, $data);
    }catch(\Exception $e){
        dd($e->getMessage());
    }

//// --------
    return ['status' => 'success'];
});
