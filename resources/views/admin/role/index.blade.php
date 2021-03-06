@extends('layouts.admin')
@section('content')
    <style>
        .table-striped > tbody > tr:nth-child(even) {
            background-color: rgba(42, 53, 66, 0.11);
        }

        .btn-xs {
            font-size: 15px
        }

        @media screen and (max-width: 400px) {
            #vbn {
                width: 100% !important;
            }

            #search {
                width: 100% !important;
            }
        }

        @media screen and (max-width: 768px) {
            #add, #vbn {
                margin-bottom: 8px;
            }

            #title {
                margin-right: 20px !important;
                margin-bottom: 15px !important;
            }

            #search {
                float: right !important;
            }

            #search > button {
                vertical-align: baseline;
            }
        }

        @media screen and (min-width: 1200px) {
            #zxc {
                margin-right: -120px !important;
            }
        }

        @media screen and (max-width: 768px) {
            #search > button {
                vertical-align: top;
                padding: 6px 6px!important;
            }
        }
    </style>
    <header class="header" style="width: 100px">
        <div class="sidebar-toggle-box">
            <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"
                 style="color: #cfd4da"></div>
        </div>
    </header>


    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xs-12 col-sm-3">
                <h3 id="title" style="margin: 0 0"><i class="icon-lock"></i>
                    لیست سطوح دسترسی
                </h3>
            </div>

            <div class="col-md-2 col-xs-12 col-sm-2" id="add">
                <a class="btn btn-success" href="{{route('role.create')}}" id="zxc"
                   style="font-size: 15px;padding:2px 12px;margin-top: 3px">
                    <i class="icon-plus" style="vertical-align: middle"></i>  &nbsp;افزودن سطح دسترسی جدید

                </a>
            </div>

            <div class="col-md-6 col-xs-12 col-sm-7">
                <form style="float: left" id="search">

                    <input class="form-control" style="width:204px;display: unset" type="text" name="title" id="vbn"
                           placeholder="جستجو بر اساس عنوان سطح دسترسی">


                    <button class="btn btn-success" type="submit" style="padding:5px 6px">
                        <i class="icon-search" style="font-size: 18px;vertical-align: middle;"></i>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <br>    <br>









    <table class="table table-striped">
        <thead>
        <tr>
            <th><i class="icon-tag"></i> نام سطح دسترسی</th>
            <th><i class="icon-bookmark"></i> عنوان سطح دسترسی</th>

        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->title}}</td>
                <td>
                    <a class="btn btn-success btn-xs" href="{{ route('role.edit',['id'=>$role->id]) }}">ویرایش</a>
                </td>
                <td>
                    <form action="{{ route('role.destroy',['id'=>$role->id])}}" method="post">
                        {{ method_field('delete') }}
                        {{csrf_field()}}
                        <button class="btn btn-danger btn-xs" type="submit">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if($x == 0)
        <div class="alert alert-danger" style="margin-top: 10px;">
            موردی یافت نشد.
        </div>
    @endif


    <div class="text-center">
        {{$roles->links()}}
    </div>
    <script>
        $(document).ready(function () {
            $(".sidebar-menu>li:nth-child(6)").addClass("active");
            $(".sidebar-menu>li:nth-child(6) li:nth-child(2)").addClass("active");
        });
    </script>
@endsection