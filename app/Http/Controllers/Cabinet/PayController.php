<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\Currency;
use App\Models\Order;
use App\Models\UserChat;
use App\Services\Obmenka;
use Illuminate\Http\Request;

class PayController extends Controller
{
    public function index($city)
    {

        $cityInfo = $this->cityRepository->getCity($city);
        $data = $this->dataRepository->getData($cityInfo['id']);

        $notReadMessage = UserChat::where('user_id', auth()->user()->id)->with('notRead')->first();

        $fastSum = [500, 700, 1000, 1300, 1500, 2000, 2500, 3000, 5000];

        $bonusSum = 1000;

        $currencies = Currency::get();

        return view(PATH . '.cabinet.pay.index',
            compact('data', 'fastSum', 'bonusSum', 'notReadMessage', 'currencies'));

    }

    public function processing($city, PayRequest $request, Obmenka $obmenka)
    {

        $data = $request->validated();

        $order = new Order();

        $order->user_id = auth()->id();
        $order->sum = $data['sum'];
        $order->status = Order::WAIT;

        if ($order->save()){

            if ($result = $obmenka->getPayUrl($order->id, $data['sum'], $city, $data['currency'])){

                return redirect($result->pay_link);

            }

            return back()->withErrors(['msg' => 'The Message']);

        }
    }

}
