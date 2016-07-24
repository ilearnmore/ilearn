@extends('admin.layouts.admin')

@section('pluginStyles')

@endsection

@section('inlineStyles')
@endsection

@section('pageHeader')
    <div class="page-header">
        <h1>
            jqGrid
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Dynamic tables and grids using jqGrid plugin
            </small>
        </h1>
    </div><!-- /.page-header -->
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="table-header">
                文章管理
            </div>
            <div class="dataTables_wrapper form-inline no-footer">

                    <table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th class="center">
                                <label class="position-relative">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>Domain</th>
                            <th>Price</th>
                            <th class="hidden-480">Clicks</th>

                            <th>
                                <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                                Update
                            </th>
                            <th class="hidden-480">Status</th>

                            <th></th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach ($articles as $article)
                        <tr>
                            <td class="center">
                                <label class="position-relative">
                                    <input type="checkbox" class="ace" />
                                    <span class="lbl"></span>
                                </label>
                            </td>

                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->user_id }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->updated_at }}</td>



                            <td>
                                <div class="hidden-sm hidden-xs action-buttons">
                                    <a class="blue" href="#">
                                        <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                    </a>

                                    <a class="green" href="#">
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </a>

                                    <a class="red" href="#">
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </a>
                                </div>

                                <div class="hidden-md hidden-lg">
                                    <div class="inline position-relative">
                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                        </button>

                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                            <li>
                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_info" id="sample-table-2_info" role="status" aria-live="polite">
                                Showing {!! $articles->currentPage() !!} to {!! $articles->lastPage() !!} of {!! $articles->total() !!} entries
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_simple_numbers" id="sample-table-2_paginate">
                                {!! $articles->render() !!}
                                {{--<ul class="pagination"><li class="paginate_button previous disabled" aria-controls="sample-table-2" tabindex="0" id="sample-table-2_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="sample-table-2" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="sample-table-2" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="sample-table-2" tabindex="0"><a href="#">3</a></li><li class="paginate_button next" aria-controls="sample-table-2" tabindex="0" id="sample-table-2_next"><a href="#">Next</a></li></ul>--}}
                            </div>
                        </div>
                    </div>

            </div>

        </div>
    </div>
@endsection

@section('basicScripts')
@endsection

@section('pluginScripts')

@endsection

@section('inlineScripts')

@endsection



