<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Validation\ValidationException;

    class PostRequest extends FormRequest
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
         * Get the validation rules that apply to the request.
         *
         * @return array
         */
        public function rules(): array
        {
            return [
                'title'       => 'required',
                'description' => 'required',
                'body'        => 'required',
                'publish'     => 'sometimes',
            ];
        }

        /**
         * @return array
         * @throws ValidationException
         */
        public function validated(): array
        {
            $data = $this->validator->validated();

            if (isset($data['publish'])) {
                $data['published_at'] = now();
                unset($data['publish']);
            }

            return $data;
        }
    }
