@extends('partials.layout')

@section('body')
    <body>

    @include('partials.flasher')
    <table style="text-align: center">
        <tr><td><h2 style="text-align: center; font-family: 'Bookman Old Style'; font-size: xx-large; color: black">Welcome {{ $name }}</h2></td></tr>
        <tr><td><h1 style="color: #005cbf">Email : {{ Auth()->user()->email}}</h1></td></tr>
        <tr><td><a href="{{ URL::to('edituser',encrypt(Auth()->user()->id)) }}" class="a">EDIT</a></td></tr>
        <tr>
            <td><a  href="{{ URL::to('logout') }}" class="btn">LOGOUT</a></td>
        </tr>
    </table>
    <table  class="table table-white mt-5" border="1" id="logintable" style="alignment: right">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Email</th>
            <th scope="col">Recent Login Time</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user_logins as $user_login)
            <tr>
                <th scope="row">{{ $user_logins->firstItem() + $loop->index}}</th>
                <td>{{ $user_login->email }}</td>
                <td>{{ $user_login->created_at }}</td>
                <td>
                    <a href=" {{ URL::to('delete_userlogins',$user_login->login_id) }}" class="bt" onclick=" return confirm('Do You Want To Delete')">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div>
    {{ $user_logins->links() }}
</div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">


            $.ajax({
                url: '{{ route('web.login.attempts') }}',
                'method': "GET",
                dataType: 'json',
                'contentType': ''
            }).done( function(data) {
                $('#logintable').DataTable( {

                    "columns": [
                        { "data": "login_id" },
                        { "data": "email" },
                        { "data": "created_at" },
                        { "data": "updated_at" },
                    ]
                })
            })



                {{--$('logintable').DataTable({--}}
                {{--    processing: true,--}}
                {{--    serverSide: true,--}}
                {{--    order: [[ 1, "asc" ]],--}}
                {{--    dom: 'lBfrtip',--}}
                {{--    ajax: function (data, callback) {--}}

                {{--        const dtOrder = data.order[0];--}}
                {{--        const sortBy = dtOrder ? data.columns[dtOrder.column].data : null;--}}
                {{--        const sortOrder = dtOrder ? dtOrder.dir : null;--}}
                {{--        const search = data.search.value;--}}

                {{--        var queryData = {--}}
                {{--            limit: data.length,--}}
                {{--            page: (data.start / data.length) + 1,--}}
                {{--            search: search,--}}
                {{--            sort_by: sortBy,--}}
                {{--            sort_order: sortOrder,--}}
                {{--        }--}}

                {{--        $.ajax({--}}
                {{--            url: '{{ route('web.login.attempts') }}',--}}
                {{--            dataType: 'json',--}}
                {{--            data: queryData--}}
                {{--        }).done(function (response) {--}}

                {{--            const totalRecords = response.meta.pagination.total;--}}
                {{--            callback({--}}
                {{--                data: response.data,--}}
                {{--                recordsTotal: totalRecords,--}}
                {{--                recordsFiltered: totalRecords,--}}
                {{--            });--}}
                {{--            initDataTableActions();--}}

                {{--        });--}}
                {{--    },--}}
                {{--    columns: [--}}
                {{--        {--}}
                {{--            data: 'start_date',--}}
                {{--            className: 'text-center',--}}
                {{--            render: function (data, type, row) {--}}
                {{--                return format_date(data, 'd/m/Y');--}}
                {{--            },--}}
                {{--        },--}}
                {{--        {--}}
                {{--            data: 'match_count',--}}
                {{--            className: 'text-center',--}}
                {{--            render: function (data, type, row) {--}}
                {{--                return data;--}}
                {{--            },--}}
                {{--        },--}}
                {{--        {--}}
                {{--            data: 'status',--}}
                {{--            className: 'text-center',--}}

                {{--            render: function (data, type, row) {--}}
                {{--               // ddd("123");--}}
                {{--                var dateParts = row.start_date.split('-').reverse();--}}
                {{--                var detailPage = '{{ route('web.login.attempts'), ['day' => '__day__', 'month' => '__month__', 'year' => '__year__'] }}';--}}
                {{--                detailPage = detailPage.replace('__day__', dateParts[0]);--}}
                {{--                detailPage = detailPage.replace('__month__', dateParts[1]);--}}
                {{--                detailPage = detailPage.replace('__year__', dateParts[2]);--}}
                {{--                var actions =--}}
                {{--                    '<div class="btn-action-group">' +--}}
                {{--                    '<a class="btn-action" data-toggle="tooltip" title="Start/Update Selections" ' +--}}
                {{--                    'href="'+ detailPage +'" style="cursor: pointer;">' +--}}
                {{--                    '<span class="material-icons">play_circle</span>' +--}}
                {{--                    '</a>' +--}}
                {{--                    '</div>'--}}
                {{--                return actions;--}}
                {{--            },--}}
                {{--        },--}}
                {{--    ],--}}
                {{--    select: {--}}
                {{--        style:    'multi',--}}
                {{--        selector: 'td:first-child'--}}
                {{--    },--}}
                {{--    columnDefs: [--}}
                {{--        {--}}
                {{--            orderable: true,--}}
                {{--            targets: "data-sortable"--}}
                {{--        },--}}
                {{--        {--}}
                {{--            orderable: false,--}}
                {{--            targets: '_all'--}}
                {{--        }--}}
                {{--    ],--}}
                {{--    language: {--}}
                {{--        zeroRecords: 'No Matches found',--}}
                {{--        lengthMenu: 'Items per Page _MENU_',--}}
                {{--        info: 'Showing _START_ to _END_ of _TOTAL_ Matches',--}}
                {{--        search: '_INPUT_',--}}
                {{--        searchPlaceholder: 'Search Matches',--}}
                {{--    },--}}
                {{--});--}}






        </script>


    @endsection
    </body>
@endsection

@section('styles')
    <style>
        body{
            align-content: center;
        }
        .btn{
            background-color: darkred;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .a{
            background-color: blue;

            border-width: 7px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .b{
            background-color: green;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .bt{
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
@endsection

