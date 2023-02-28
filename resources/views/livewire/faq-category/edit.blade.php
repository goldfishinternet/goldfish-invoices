<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('faqCategory.category') ? 'invalid' : '' }}">
        <label class="form-label required" for="category">{{ trans('cruds.faqCategory.fields.category') }}</label>
        <input class="form-control" type="text" name="category" id="category" required wire:model.defer="faqCategory.category">
        <div class="validation-message">
            {{ $errors->first('faqCategory.category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.faqCategory.fields.category_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>