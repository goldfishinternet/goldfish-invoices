<?php

namespace App\Http\Livewire\FaqQuestion;

use App\Models\FaqCategory;
use App\Models\FaqQuestion;
use Livewire\Component;

class Edit extends Component
{
    public FaqQuestion $faqQuestion;

    public array $listsForFields = [];

    public function mount(FaqQuestion $faqQuestion)
    {
        $this->faqQuestion = $faqQuestion;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.faq-question.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->faqQuestion->save();

        return redirect()->route('admin.faq-questions.index');
    }

    protected function rules(): array
    {
        return [
            'faqQuestion.category_id' => [
                'integer',
                'exists:faq_categories,id',
                'required',
            ],
            'faqQuestion.question' => [
                'string',
                'required',
            ],
            'faqQuestion.answer' => [
                'string',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = FaqCategory::pluck('category', 'id')->toArray();
    }
}
