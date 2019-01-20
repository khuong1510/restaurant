@extends('admin.layout.master')

@section('title', 'Menu')
@section('title-detail', 'List Menus')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <form method="POST" id="rtr-filter-form" autocomplete="off">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ asset('/admin/menu') }}" id="rtr-filter-link" />
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <h4 class="caption-subject bold uppercase"><i class="icon-settings font-red-sunglo"></i> List Menus</h4>
                        </div>

                        <div class="text-right">
                            <button class="dt-button buttons-html5 btn" type="button" id="rtr-refresh-btn">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                            <button class="dt-button buttons-html5 btn" type="button" id="rtr-view-btn" data-toggle="modal"  data-target="#rtr-view-modal">
                                <i class="fa fa-search"></i> View
                            </button>
                            <a href="{{ asset('/admin/menu/add') }}"
                               class="dt-button buttons-html5 btn green">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="rtr-items-table">
                            <thead>
                                {!! Helper::showTableHeader($fields); !!}
                                {!! Helper::showFilterRow($fields); !!}
                            </thead>
                            <tbody id="rtr-items-content">
                                <?php
                                $number = ( $menus->currentPage() - 1) * $menus->perPage();
                                echo Helper::showItemsRow($menus, $fields, $number, 'menu');
                                ?>
                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="text-center">

                            <nav id="pagination">
                                <input type="hidden" name="current-page" id="rtr-current-page">
                                <ul class="pagination" id="rtr-paginator">
                                    @for($i = 1; $i <= $menus->lastPage(); $i++)
                                        <li class="page-item @if($i == 1) active @endif">
                                            <a class="page-link">{{ $i }}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </nav>

                        </div>
                        <!-- END PAGINATION -->

                    </div>
                </form>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="rtr-view-modal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ asset('/admin/menu/show-fields') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Show fields</h4>
                    </div>
                    <div class="modal-body" id="modal_status">
                        <div class="form-group">
                            <label>Select fields you want to show</label>
                            <div class="mt-checkbox-list">
                                @foreach($listFields as $field)
                                <label class="mt-checkbox text-capitalize"> {{ $field }}
                                    <input type="checkbox" value="1" name="{{ $field }}" @if(in_array($field, $fields)) checked @endif>
                                    <span></span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn green">Submit</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END MODAL -->
@endsection

@section('addition-script')
    <script src="{{ asset('helper/filter-list.js') }}" type="text/javascript"></script>
@endsection