@extends('layouts.user')
@section('content')
    <h2 class="title-bar">
        {{!empty($recovery) ?__('Recovery Spaces') : __("Manage Hoardings")}}
        @if(Auth::user()->hasPermission('space_create')&& empty($recovery))
            <a href="{{ route("space.vendor.create") }}" class="btn-change-password">{{__("Add Hoarding")}}</a>
        @endif
    </h2>
    @include('admin.message')
    @if($rows->total() > 0)
        <div class="bravo-list-item">
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
            <div class="list-item">
                <div class="row">
                    @foreach($rows as $row)
                        <div class="col-md-12">
                            @include('Space::frontend.manageSpace.loop-list')
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="bravo-pagination">
                <span class="count-string">{{ __("Showing :from - :to of :total Spaces",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                {{$rows->appends(request()->query())->links()}}
            </div>
        </div>
    @else
   <b>You haven't added any hoardings yet!</b>
    <p>Start showcasing your advertising spaces to potential customers by adding your first hoarding.</p>
    <p>Click the <strong>'Add Hoarding'</strong> button above to get started and list your hoarding details.</p>
    @endif
@endsection
