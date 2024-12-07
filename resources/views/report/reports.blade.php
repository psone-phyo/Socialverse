@extends('layouts.app', ['page' => __('Reports')])

@section('content')
    <div class="card-body col-span-2">
        <div class="table-full-width table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-secondary">
                    <tr>
                        <th>
                            Report ID
                        </th>
                        <th>
                            Reporter Name
                        </th>
                        <th>
                            Reported Post
                        </th>
                    </tr>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            {{$item->report_id}}
                        </td>
                        <td>
                            <a href="{{route('userlist.detail', $item->user_id)}}" class="hover:text-purple-300 hover:border-b-2 hover:border-purple-300">
                                {{ $item->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('viewpost', $item->report_id)}}" class="hover:text-purple-300 hover:border-b-2 hover:border-purple-300">
                                view post
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
