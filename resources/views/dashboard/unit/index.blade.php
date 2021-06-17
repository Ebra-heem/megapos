@extends('layouts.main')

@section('content')
@include('sweet::alert')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header with-border">

            <form action="{{ route('unit.index') }}" method="get">

                <div class="row no-gutters">
                    <div class="col-12 col-sm-6 col-md-8">
                        <h3 class="card-title">@lang('site.allunit')</h3>
                    </div>
                    <div class="col-6 col-md-4">
                        @if (auth()->user()->hasPermission('create_categories'))
                        <a type="" class="btn btn-success btn float-right" style=""
                            href="{{ route('unit.create') }}"><i class="fas fa-user-plus"></i>
                            @lang('site.createunit')</a>
                        @else
                        <a type="" class="btn btn-success disabled btn float-right" href="#"><i
                                class="fas fa-user-plus"></i>@lang('site.createunit')</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="category_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="category_table" class="table table-bordered table-striped table-hover  dataTable"
                            role="grid" aria-describedby="category_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 283px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">@lang('site.unitname')</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Browser: activate to sort column ascending"
                                        style="width: 359px;">Details</th>

                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Pices</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 320px;">Conversion</th>
                                    <th class="sorting" tabindex="0" aria-controls="category_table" rowspan="1"
                                        colspan="1" aria-label="Engine version: activate to sort column ascending"
                                        style="width: 243px;">@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($units as $index => $unit)

                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->details }}</td>
                                    <td>{{ $unit->unit_piece }}</td>
                                    <td>{{ $unit->unit_conversion }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_categories'))
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('category.edit', $unit->id) }}"><i
                                                class="fas fa-edit"></i> @lang('site.edit')</a>
                                        @else
                                        <a class="btn btn-warning btn-sm disabled"
                                            href="{{ route('category.edit', $unit->id) }}"><i
                                                class="fas fa-edit"></i> @lang('site.edit')</a>
                                        @endif
                                        @if (auth()->user()->hasPermission('delete_categories'))
                                        <button id="delete" onclick="deletemoderator({{ $unit->id }})"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                            @lang('site.delete')</button>
                                        <form id="form-delete-{{ $unit->id }}"
                                            action="{{ route('category.destroy', $unit->id) }}" method="post"
                                            style="display:inline-block;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                        </form>
                                        @else
                                        <button type="submit" class="btn btn-danger btn-sm disabled"><i
                                                class="fas fa-trash"></i> @lang('site.delete')</button>
                                        @endif

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">@lang('site.unitname')</th>
                                    <th rowspan="1" colspan="1">Details</th>
                                    <th rowspan="1" colspan="1">Pices</th>
                                    <th rowspan="1" colspan="1">Conversion</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->


    </div>
</div>


@stop
