<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('team.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.team.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="team.name">
        <div class="validation-message">
            {{ $errors->first('team.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.owner_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="owner">{{ trans('cruds.team.fields.owner') }}</label>
        <x-select-list class="form-control" required id="owner" name="owner" :options="$this->listsForFields['owner']" wire:model="team.owner_id" />
        <div class="validation-message">
            {{ $errors->first('team.owner_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.owner_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>