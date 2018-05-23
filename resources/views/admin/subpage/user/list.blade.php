@extends('admin.layout.master')

@section('title', 'User')
@section('title-detail', 'List Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <form action="{{ asset('/admin/user') }}" method="POST" id="filterForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <h4 class="caption-subject bold uppercase"><i class="icon-settings font-red-sunglo"></i> List Users</h4>
                        </div>

                        <div class="text-right">
                            <button class="dt-button buttons-html5 btn" type="button" id="refreshBtn">
                                <i class="fa fa-refresh"></i> Refresh
                            </button>
                            <button class="dt-button buttons-html5 btn yellow-gold" type="submit">
                                <i class="fa fa-search"></i> Filter
                            </button>
                            <a href="{{ asset('/admin/user/add') }}"
                               class="dt-button buttons-html5 btn green">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr class="success">
                                    <th style="width: 5%" class="text-center"> No. </th>
                                    <th style="width: 26%" class="text-center"> Full Name </th>
                                    <th style="width: 16%" class="text-center"> Username </th>
                                    <th style="width: 20%" class="text-center"> Email </th>
                                    <th style="width: 12%" class="text-center"> Phone </th>
                                    <th style="width: 11%" class="text-center"> Status </th>
                                    <th style="width: 10%" class="text-center"> Action </th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>
                                        <input type="text" class="form-control" name="name" value="{{ isset($old['name']) ? $old['name'] : '' }}">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="username" value="{{ isset($old['username']) ? $old['username'] : '' }}">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="email" value="{{ isset($old['email']) ? $old['email'] : '' }}">
                                    </th>
                                    <th>
                                        <input type="text" class="form-control" name="phone" value="{{ isset($old['phone']) ? $old['phone'] : '' }}">
                                    </th>
                                    <th>
                                        <select name="active" id="" class="form-control">
                                            <option value="1" {{ (isset($old['active']) && $old['active'] == 1) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ (isset($old['active']) && $old['active'] == 0) ? 'selected' : '' }}>Disable</option>
                                        </select>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $number = ( $users->currentPage() - 1) * $users->perPage();
                                ?>
                                @for($i = 0; $i < count($users); $i++)
                                <tr>
                                    <td> {{ $number + $i + 1 }} </td>
                                    <td> {{ $users[$i]->name }} </td>
                                    <td> {{ $users[$i]->username }} </td>
                                    <td> {{ $users[$i]->email }} </td>
                                    <td> {{ $users[$i]->phone }} </td>
                                    <td>
                                        @if($users[$i]->active == 1)
                                            <span class="label label-success"> Active </span>
                                        @else
                                            <span class="label label-danger"> Disable </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>

                        <!-- PAGINATION -->
                        <div class="text-center">
                            {{ $users->links() }}
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
    <script>
        $(document).ready(function() {

            $('#refreshBtn').on('click', function() {
                $('#filterForm input').not('input[name="_token"]').val('');
            });

        });
    </script>
@endsection