@extends ('backend.layouts.app')

@section ('title', __('labels.backend.test1s.management') . ' | ' . __('labels.backend.test1s.edit'))

@section('breadcrumb-links')
@include('backend.test1s.includes.breadcrumb-links')
@endsection
@section('content')
    {{ html()->modelForm($test1, 'PATCH', route('admin.test1.update', $test1->id))->acceptsFiles()->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.test1s.management') }}
                        <small class="text-muted">{{ __('labels.backend.test1s.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            @include('backend.test1s.fields')

        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.test1.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
  {{ html()->closeModelForm() }}
@endsection