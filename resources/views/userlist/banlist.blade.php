@extends('layouts.app',['page' => __('Ban List')])

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
                                <span class="text-red-500">
                                    {{ $item->status }}
                                </span>

                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a class="bg-green-400 p-2 rounded-md mx-1 cursor-pointer text-green-700 hover:text-green-100 hover:bg-green-700 active:bg-green-400"
                                        href="{{ route('banlist.unban', $item->id) }}">
                                        <i class="fa-regular fa-handshake"></i> Unban
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
