@extends('admin.layout.master')

@section('title', ucwords($title))
@section('title-detail', $titleDetail)

@section('content')
    <?php $asset = asset('/admin/'.$title); ?>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light">
                <input type="hidden" value="{{ $asset }}" id="rtr-filter-link" />
                <input type="hidden" value="{{ $hasRemoveBtn ? true : false }}" id="rtr-has-remove-btn" />
                <input type="hidden" value="{{ !empty($removeMsg) ? $removeMsg : "Are your sure to delete this item?" }}" id="rtr-remove-message" />
                <div class="portlet-title">
                    <div class="font-red-sunglo">
                        <h4 class="caption-subject bold uppercase"><i class="icon-settings font-red-sunglo"></i> {{ $titleDetail }}</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-1 text-right">
                            <form method="GET" action="{{ $asset.'/change-size-page' }}" id="rtr-page-size-form">
                                <select class="form-control" name="page-size" id="rtr-page-size">
                                    <?php $rate = 5 ?>
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i * $rate }}" @if($currentPageSize == ($i * $rate)) selected @endif>{{ $i * $rate }}</option>
                                    @endfor
                                </select>
                            </form>
                        </div>
                        <div class="col-md-11 text-right">
                            <button class="dt-button buttons-html5 btn" type="button" id="rtr-refresh-btn">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                            <button class="dt-button buttons-html5 btn" type="button" id="rtr-view-btn" data-toggle="modal"  data-target="#rtr-view-modal">
                                <i class="fa fa-search"></i> View
                            </button>
                            <a href="{{ $asset.'/add' }}"
                               class="dt-button buttons-html5 btn green">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
                <form method="POST" id="rtr-filter-form" autocomplete="off">
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="rtr-items-table">
                            <thead>

                                {{ csrf_field() }}
                                {!! Helper::showTableHeader($showFields); !!}
                                {!! Helper::showFilterRow($showFields); !!}
                                <input type="hidden" name="current-page" id="rtr-current-page">

                            </thead>
                            <tbody id="rtr-items-content">
                            <?php
                            $number = ( $items->currentPage() - 1) * $items->perPage();
                            $totalColumn = count($showFields) + 2;
                            ?>
                            {!! Helper::showItemsRow($items, $showFields, $number, $title, $hasRemoveBtn ? true : false, $totalColumn); !!}
                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="text-center">
                            <nav id="pagination">
                                <ul class="pagination" id="rtr-paginator">
                                    @for($i = 1; $i <= $items->lastPage(); $i++)
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
            <form action="{{ $asset.'/show-fields' }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Show fields</h4>
                    </div>
                    <div class="modal-body" id="modal_status">
                        <div class="form-group">
                            <label>Select fields you want to show</label>
                            <div class="mt-checkbox-list row">
                                {!! Helper::showListFieldSelect($listFields, $showFields) !!}

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