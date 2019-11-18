<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\SettingOrderRepository;

class SettingOrderController extends Controller
{

    public function update(Request $request)
    {
        SettingOrderRepository::update($request->all());
        return back()->with('success', 'Configuração atualizada.');
    }

}
