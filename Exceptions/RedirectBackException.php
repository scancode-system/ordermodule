<?php

namespace Modules\Order\Exceptions;

use Exception;

class RedirectBackException extends Exception
{
    
	public function render($request)
    {
    	return back()->withErrors([$this->getMessage()]);
    }

}
