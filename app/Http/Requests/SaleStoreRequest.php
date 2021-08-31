<?php

namespace App\Http\Requests;

use App\Rules\authorizeAge;
use App\Rules\PendingPaid;
use Illuminate\Foundation\Http\FormRequest;

class SaleStoreRequest extends FormRequest
{
    /**
     * @var int|mixed
     */
    public $discount_percent;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'product_name' => 'required|alpha',
            'unit_price' => 'required',
            'discount_percent' => 'required',
            'total_price' => 'required|numeric',
            'state' => 'in:paid,pending',
            'amount' => 'required',
            'client_id' => ['required', new authorizeAge, new PendingPaid],
        ];
    }
}
