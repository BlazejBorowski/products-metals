<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

use App\Enums\Metal;
use Illuminate\Validation\Rule;

trait ProductFormRulesTrait
{
    public function saveRules(): array
    {
        $rules = $this->calculateRules();
        $rules['name'] = 'required|string|max:255';
        return $rules;
    }

    public function calculateRules(): array
    {
        return [
            'metal' => ['required', Rule::enum(Metal::class)],
            'weight' => 'required|numeric|min:0.1|max:100000',
            'change_percent' => 'numeric|min:0|max:100',
        ];
    }
}
