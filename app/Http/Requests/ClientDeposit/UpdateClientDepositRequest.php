<?php

namespace App\Http\Requests\ClientDeposit;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientDepositRequest extends FormRequest
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
        else {
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
            'client_id' => 'required',
            'client_wallet_id' => 'required',
            'top_up_account' => 'required',
            'recharge_amount' => 'required',
            'included_in_performance' => 'required',
            'account_type' => 'required'
        ];
    }
}
