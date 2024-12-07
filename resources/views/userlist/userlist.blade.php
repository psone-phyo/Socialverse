@extends('layouts.app',['page' => __('User List')])

@section('content')
    <div class="card-body col-span-2">
        <div class="table-full-width table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Data of Birth
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                <a href="{{route('userlist.detail', $item->id)}}" class="">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>
                                {{ $item->email }}
                            </td>
                            <td>
                                {{ $item->gender }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->dob }}
                            </td>
                            <td>
                                <span
                                    class="@if ($item->status == 'online') text-green-300
                                    @elseif($item->status == 'banned') text-red-500
                                    @endif">
                                    {{ $item->status }}
                                </span>

                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a class="bg-red-600 p-2 rounded-md mx-1 cursor-pointer text-red-300 hover:text-red-100 hover:bg-red-700 active:bg-red-400"
                                        href="{{ route('userlist.ban', $item->id) }}">
                                        <i class="fa-solid fa-ban"></i> Ban
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
