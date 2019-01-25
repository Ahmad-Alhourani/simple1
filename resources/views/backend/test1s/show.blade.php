@extends ('backend.layouts.app')

@section ('title', __('labels.backend.test1s.management') . ' | ' . __('labels.backend.test1s.view'))

@section('breadcrumb-links')
@include('backend.test1s.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.test1s.management') }}
                        <small class="text-muted">{{ __('labels.backend.test1s.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.test1s.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.test1s.content.created_at') }}:</strong> {{ $test1->updated_at->timezone(get_user_timezone()) }} ({{ $test1->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.test1s.content.last_updated') }}:</strong> {{ $test1->created_at->timezone(get_user_timezone()) }} ({{$test1->updated_at->diffForHumans() }})--}}
                        @if ($test1->trashed())
                            <strong>{{ __('labels.backend.test1s.content.deleted_at') }}:</strong> $test1->deleted_at->timezone(get_user_timezone())  ($test1->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection