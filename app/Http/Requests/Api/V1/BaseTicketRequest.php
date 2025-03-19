<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BaseTicketRequest extends FormRequest
{
    /**
     * @param array $otherAttributes
     * @return array
     */
    public function mappedAttributes(array $otherAttributes = []): array
    {
        $attributesMap = array_merge([
            'data.attributes.title' => 'title',
            'data.attributes.description' => 'description',
            'data.attributes.status' => 'status',
            'data.attributes.createdAt' => 'created_at',
            'data.attributes.updatedAt' => 'updated_at',
            'data.relationships.author.data.id' => 'user_id',
        ], $otherAttributes);

        $attributesToUpdate = [];

        foreach ($attributesMap as $key => $attribute) {
            if ($this->has($key)) {
                $attributesToUpdate[$attribute] = $this->input($key);
            }
        }

        return $attributesToUpdate;
    }

    public function messages(): array
    {
        return [
            'data.attributes.status' => 'The status value is invalid. Please use A,C,H, or X.',
        ];
    }
}
