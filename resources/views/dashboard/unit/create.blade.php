@extends('layouts.main')


@section('content')

<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">
            <h3 class="card-title">@lang('site.createunit')</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('unit.store') }}" method="post">
                {{ csrf_field() }}
                {{ method_field('post') }}
                @include('partials._errors')
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('site.unitname')</label>
                            <input type="text" name="unit_name" id="" class="form-control"
                                value="{{ old('unit_name') }}">
                        </div>
                        <div class="form-group">
                            <label>Details</label>
                            <input type="text" name="details" id="" class="form-control"
                                value="{{ old('details') }}">
                        </div>
                        <div class="form-group">
                            <label>Unit Pieces</label>
                            <input type="text" name="unit_piece" id="" class="form-control"
                                value="{{ old('unit_piece') }}">
                        </div>

                    </div>
                </div>
                <div class="modal-footer form-group">
                    <button type="submit" class="btn btn-success" href="{{ route('category.store') }}"><i
                            class="fas fa-user-plus"></i>
                        @lang('site.newunit')</button>
                </div>
            </form>

        </div>
        <!-- /.card-body -->

    </div>
</div>


@stop
