<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('faqQuestion.category_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="category">{{ trans('cruds.faqQuestion.fields.category') }}</label>
        <x-select-list class="form-control" required id="category" name="category" :options="$this->listsForFields['category']" wire:model="faqQuestion.category_id" />
        <div class="validation-message">
            {{ $errors->first('faqQuestion.category_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faqQuestion.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('faqQuestion.question') ? 'invalid' : '' }}">
        <label class="form-label required" for="question">{{ trans('cruds.faqQuestion.fields.question') }}</label>
        <textarea class="form-control" name="question" id="question" required wire:model.defer="faqQuestion.question" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('faqQuestion.question') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faqQuestion.fields.question_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('faqQuestion.answer') ? 'invalid' : '' }}">
        <label class="form-label required" for="answer">{{ trans('cruds.faqQuestion.fields.answer') }}</label>
        <textarea class="form-control" name="answer" id="answer" required wire:model.defer="faqQuestion.answer" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('faqQuestion.answer') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faqQuestion.fields.answer_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.faq-questions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>