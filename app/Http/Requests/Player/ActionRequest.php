<?php

namespace App\Http\Requests\Player;

use Illuminate\Foundation\Http\FormRequest;

class ActionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules() {
        return [
            'action' => ['required']
        ];
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->input('action');
    }

}
