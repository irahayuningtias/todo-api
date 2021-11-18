<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Facade\FlareClient\Http\Response;

class TodoRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
        if ($this->method() == Request::METHOD_POST)
            return true;
        $todo = $this->route('todo');
        return auth()->user()->id = $todo->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'todo' => 'required|string|max:255',
            'label' => 'nullable|string',
            'done' => 'nullable|boolean',
        ];
    }
}
