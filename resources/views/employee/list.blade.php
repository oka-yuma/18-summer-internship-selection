@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    {!! Form::open(['class' =>'form-horizontal' , 'method' => 'GET', 'url' => route('employee.list') ]) !!}
                    <div class="input-list">
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">姓</label>
                            <div class="col-md-6">
                                {!! Form::text('family_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">名</label>
                            <div class="col-md-6">
                                {!! Form::text('given_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">せい</label>
                            <div class="col-md-6">
                                {!! Form::text('family_name_kana', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">めい</label>
                            <div class="col-md-6">
                                {!! Form::text('given_name_kana', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">部</label>
                            <div class="col-md-6">
                                {!! Form::select('department_id', $allDepartments, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-1 control-label">課</label>
                            <div class="col-md-6">
                                {!! Form::select('division_id', $allDivisions, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::hidden('sort_key', 'id') !!}
                            {!! Form::hidden('sort_order', 'asc') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1 col-md-offset-1">
                            <button type="submit" class="btn btn-primary">
                                検索
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <table class="table">
                        <thead>
                        <tr>
                            <?php
                            $sort_key = isset($_GET['sort_key']) ? $_GET['sort_key'] : 'id';
                            $sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'asc';
                            ?>
                            <th class="sorting" data-sort-key="id"
                                data-sort-order="{{$sort_key !== 'id'?'both':$sort_order}}" scope="col">#
                            </th>
                            <th scope="col">姓</th>
                            <th scope="col">名</th>
                            <th class="sorting" data-sort-key="family_name_kana"
                                data-sort-order="{{$sort_key !== 'family_name_kana'?'both':$sort_order}}" scope="col">せい
                            </th>
                            <th class="sorting" data-sort-key="given_name_kana"
                                data-sort-order="{{$sort_key !== 'given_name_kana'?'both':$sort_order}}" scope="col">めい
                            </th>
                            <th scope="col">部</th>
                            <th class="sorting" data-sort-key="division_id"
                                data-sort-order="{{$sort_key !== 'division_id'?'both':$sort_order}}" scope="col">課
                            </th>
                            <th class="sorting" data-sort-key="position_id"
                                data-sort-order="{{$sort_key !== 'position_id'?'both':$sort_order}}" scope="col">役職
                            </th>
                            <th class="sorting" data-sort-key="birthday"
                                data-sort-order="{{$sort_key !== 'birthday'?'both':$sort_order}}" scope="col">誕生日
                            </th>
                            <th scope="col">年齢</th>
                            <th scope="col">入社日</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{$employee->id}}</th>
                                <td>{{$employee->family_name}}</td>
                                <td>{{$employee->given_name}}</td>
                                <td>{{$employee->family_name_kana}}</td>
                                <td>{{$employee->given_name_kana}}</td>
                                <td>{{$employee->division->department->name}}</td>
                                <td>{{$employee->division->name}}</td>
                                <td>{{$employee->position->name}}</td>
                                <td>{{$employee->birthday_jp}}</td>
                                <td>{{$employee->age}}歳</td>
                                <td>{{$employee->hire_date_jp}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("body").on("click", "th.sorting", function () {
            let swith_dic = {"both": "asc", "asc": "desc", "desc": "asc"};
            document.location = document.location.pathname
                + "?" + document.location.search.replace("?", "").replace(/&sort_key.*/g, "")
                + "&sort_key=" + $(this).data("sort-key")
                + "&sort_order=" + swith_dic[$(this).data("sort-order")];
        });
    </script>
@endsection
