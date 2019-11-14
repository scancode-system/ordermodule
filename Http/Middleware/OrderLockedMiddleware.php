<?php

namespace Modules\Order\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use \Exception;

class OrderLockedMiddleware
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
        try {
            $order = request()->route('order');
            $item =  request()->route('item');
            $this->gate->authorize('order-locked-gate', [$order, $item]);
            return $next($request);
        } catch (Exception $e) {
            return back()->withErrors('Pedido não pode ser alterado, é necessário reabrir.');
        }
    }

}
