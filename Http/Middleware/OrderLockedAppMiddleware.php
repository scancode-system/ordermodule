<?php

namespace Modules\Order\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use \Exception;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\Item;
use Modules\Order\Entities\Status;


class OrderLockedAppMiddleware
{
    /**
     * The gate instance.
     *
     * @var \Illuminate\Contracts\Auth\Access\Gate
     */
    protected $gate;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function __construct(Gate $gate)
    {
        $this->gate = $gate;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $ability
     * @param  array|null  ...$models
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function handle($request, Closure $next)
    {
        $order = request()->route('order');
        $item =  request()->route('item');
        if($this->orderLockedGate($order, $item)){
            return $next($request);
        } else {
            return response()->json('Pedido não pode ser alterado, pois não está aberto.', 403);
        }
       
    }


    public function orderLockedGate(Order $order = null, Item $item = null) {
        if($item instanceof Item){
            $order = $item->order;
        }
        if($order instanceof Order){
            return ($order->status_id == Status::OPEN);
        } else {
            return false;
        }
    }

}
