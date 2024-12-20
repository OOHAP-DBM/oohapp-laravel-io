@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{__("Announcement Management")}}</h1>
            <div class="title-actions">
                @if(empty($recovery))
                    <a href="{{ route("announcement.admin.create") }}" class="btn btn-primary">{{__("Add new Announcement")}}</a>
                @endif
            </div>
        </div>

        @include('admin.message')
        <div class="row">
            <div class="col-md-12">
                <div class="filter-div d-flex justify-content-between ">
                    <div class="col-left">
                        @if(!empty($rows))
                            <form method="post" action="{{route('announcement.admin.bulkEdit')}}" class="filter-form filter-form-left d-flex justify-content-start">
                                {{csrf_field()}}
                                <select name="action" class="form-control">
                                    <option value="">{{__(" Bulk Actions ")}}</option>
                                    <!-- <option value="publish">{{__(" Publish ")}}</option> -->
                                    <!-- <option value="draft">{{__(" Move to Draft ")}}</option> -->
                                    <option value="delete">{{__(" Delete ")}}</option>
                                </select>
                                <button data-confirm="{{__("Do you want to delete?")}}" class="btn-info btn btn-icon dungdt-apply-form-btn" type="button">{{__('Apply')}}</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-right">
                        <form method="get" action="" class="filter-form filter-form-left d-flex justify-content-start">
                           
                        </form>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-body">
                        <form action="" class="bravo-form-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th width="45px"><input type="checkbox" class="check-all"></th>
                                        <th> {{ __('Title')}}</th>
                                        <th> {{ __('Content')}}</th>
                                        <th width="100px"> {{ __('Via')}}</th>
                                        <th width="130px"> {{ __('Date')}}</th>
                                        <!-- <th width="100px"> {{ __('Status')}}</th> -->
                                        <th width="100px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($rows->total() > 0)
                                        @foreach($rows as $row)
                                            <tr class="{{$row->status}}">
                                                <td><input type="checkbox" name="ids[]" class="check-item" value="{{$row->id}}">
                                                </td>
                                                <td class="title">
                                                    <strong>{{$row->title}}</strong>
                                                </td>
                                                <td>{{strip_tags($row->content)}}</td>
                                                <td>{{ ucfirst($row->via) }}</td>
                                                <td> {{ display_date($row->updated_at)}}</td>
                                                <!-- <td><span class="badge badge-{{ $row->status }}">{{ $row->status }}</span></td> -->
                                                <td>
                                                    <a href="{{route('announcement.admin.edit',['id'=>$row->id])}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> {{__('Edit')}}
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">{{__("No announcement found")}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between">
                            {{$rows->appends(request()->query())->links()}}
                            <p><i>{{__('Found :total items',['total'=>$rows->total()])}}</i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
