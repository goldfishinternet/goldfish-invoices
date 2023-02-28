<?php

namespace App\Http\Livewire\FaqCategory;

use App\Models\FaqCategory;
use Livewire\Component;

class Create extends Component
{
    public FaqCategory $faqCategory;

    public function mount(FaqCategory $faqCategory)
    {
        $this->faqCategory = $faqCategory;
    }

    public function render()
    {
        return view('livewire.faq-category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->faqCategory->save();

        return redirect()->route('admin.faq-categories.index');
    }

    protected function rules(): array
    {
        return [
            'faqCategory.category' => [
                'string',
                'required',
            ],
        ];
    }
}
