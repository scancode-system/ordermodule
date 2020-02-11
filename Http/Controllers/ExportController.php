<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Order\Services\TxtClientService;

class ExportController extends Controller
{
   
    public function txtClients(Request $request)
    {
        $txt =  new TxtClientService();
        $txt->run();
        return $txt->download();
    }

}
