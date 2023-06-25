<?php

namespace App\Http\Requests;

use App\Models\Link;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $link = Link::find($this->route('link'))->first();
        
        return auth()->user()->id == $link->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'color' => ['required'],
            'link'  => ['required'],
            'image' => ['image','mimes:jpeg,png,jpg', 'max:2048']
        ];
    }
}
