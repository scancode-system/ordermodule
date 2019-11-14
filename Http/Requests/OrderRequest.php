<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch (request()->method) {
            case 'POST':
            return $this->store();
            break;
            case 'PUT':
            return $this->update();
            break;
        }
    }


    private function store(){
        return [
            'client_id' => 'required|integer|min:1',
            'saller_id' => 'required|integer|min:1',
        ];
    }


    private function update(){
        return [
            'status_id' => 'sometimes|integer|min:1',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
