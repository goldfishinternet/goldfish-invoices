@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.faqQuestion.title_singular') }}:
                    {{ trans('cruds.faqQuestion.fields.id') }}
                    {{ $faqQuestion->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.faqQuestion.fields.id') }}
                            </th>
                            <td>
                                {{ $faqQuestion->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.faqQuestion.fields.category') }}
                            </th>
                            <td>
                                @if($faqQuestion->category)
                                    <span class="badge badge-relationship">{{ $faqQuestion->category->category ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.faqQuestion.fields.question') }}
                            </th>
                            <td>
                                {{ $faqQuestion->question }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.faqQuestion.fields.answer') }}
                            </th>
                            <td>
                                {{ $faqQuestion->answer }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('faq_question_edit')
                    <a href="{{ route('admin.faq-questions.edit', $faqQuestion) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.faq-questions.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection