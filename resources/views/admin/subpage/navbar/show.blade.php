@extends('admin.layout.master')

@section('title', 'Navbar')
@section('title-detail', 'List Navbar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <form method="POST" id="filterForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <h4 class="caption-subject bold uppercase"><i class="icon-settings font-red-sunglo"></i> List Navbar</h4>
                        </div>

                        <div class="text-right">
                            <button class="dt-button buttons-html5 btn" type="button" id="refreshBtn">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                            <a href="{{ asset('/admin/user/add') }}"
                               class="dt-button buttons-html5 btn green">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="user-table">
                            <thead>
                                <tr class="success">
                                    <th style="width: 5%" class="text-center"> No. </th>
                                    <th style="width: 26%" class="text-center"> Name
                                        <i class="glyphicon glyphicon-sort-by-attributes eav-sort" id="name-sort">
                                            <input type="hidden" name="name-sort" value="asc">
                                        </i>
                                    </th>
                                    <th style="width: 16%" class="text-center"> Link
                                        <i class="glyphicon glyphicon-sort-by-attributes eav-sort" id="username-sort">
                                            <input type="hidden" name="username-sort" value="asc">
                                        </i>
                                    </th>
                                    <th style="width: 25%" class="text-center"> Icon
                                        <i class="glyphicon glyphicon-sort-by-attributes eav-sort" id="email-sort">
                                            <input type="hidden" name="email-sort" value="asc">
                                        </i>
                                    </th>
                                    <th style="width: 12%" class="text-center"> Alias</th>
                                    <th style="width: 11%" class="text-center"> Page </th>
                                    <th style="width: 5%" class="text-center"> Parent_Id </th>
                                    <th> Action </th>
                                </tr>
                                <!-- <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="form-control" name="name" value="{{ isset($old['name']) ? $old['name'] : '' }}" id="nameInput">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="username" value="{{ isset($old['link']) ? $old['link'] : '' }}" id="usernameInput">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="email" value="{{ isset($old['email']) ? $old['email'] : '' }}" id="emailInput">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="phone" value="{{ isset($old['phone']) ? $old['phone'] : '' }}" id="phoneInput">
                                    </th>
                                    <th>
                                        <select name="active" id="statusInput" class="form-control">
                                            <option value="1" {{ (isset($old['active']) && $old['active'] == 1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ (isset($old['active']) && $old['active'] == 0) ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </th>
                                    <th></th>
                                </tr> -->
                            </thead>
                            <tbody id="users-content">
                                <?php 
                                  $number = 1;
                                ?>
                                @forEach($navBarList as $navBar)
                                <tr>
                                    <td> {{ $number++ }} </td>
                                    <td> {{ $navBar->name }} </td>
                                    <td> {{ $navBar->link }} </td>
                                    <td> {{ $navBar->icon }} </td>
                                    <td> {{ $navBar->alias }} </td>
                                    <td> {{ $navBar->page }} </td>
                                    <td> {{ $navBar->parent_id }} </td>
                                    <td class="text-center">
                                        <a href="{{ asset('/admin/navbar/edit/'.$navBar->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforEach
                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="text-center">

                        </div>
                        <!-- END PAGINATION -->

                    </div>
                </form>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

@endsection

@section('addition-script')
    <script src="{{ asset('js/user/filter.js') }}" type="text/javascript"></script>
@endsection