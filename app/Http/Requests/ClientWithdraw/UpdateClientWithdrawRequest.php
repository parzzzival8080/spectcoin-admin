<?php

namespace App\Http\Requests\ClientWithdraw;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientWithdrawRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth = Auth::user();
        if($auth->role == 'ADMINISTRATOR' || $auth->role == 'CLIENT')
        {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'bchain_name' => 'string',
            'withdraw_address' => 'string',
            'withdraw_amount' => 'string',
            'miner_fee' => 'required',
            'state' => 'string'
        ];
    }
}
