@extends('layouts.app',['page' => __('Profile Details')])

@section('content')
<div class="mb-3">
    <a href="{{ url()->previous() }}" class="">
        <span class="hover:text-purple-100 p-1 rounded-md bg-purple-400 hover:bg-purple-500 text-md text-purple-100 w-auto font-bold">
            <i class="fa-solid fa-angles-left mr-1"></i>Back
        </span>
    </a>
</div>


    <div class="md:grid md:grid-cols-3 md:gap-5">
        <div class="md:col-span-1 md:flex justify-end items-start">
            <div>
                <img src="{{asset('img/anime6.png')}}" alt="" width="300px">
            </div>
        </div>
        <div class="md:col-span-2">
            <div class="md:grid md:grid-cols-3">
                <div class="md:col-span-1">
                    <div class="my-1">
                        <p class="text-md font-bold">ID</p>
                        <p class="text-purple-200">{{$data->id}}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Name</p>
                        <p class="text-purple-200">{{$data->name}}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Email</p>
                        <p class="text-purple-200">{{$data->email}}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Phone</p>
                        <p class="text-purple-200">{{$data->phone ?? '-'}}</p>
                    </div>

                </div>
                <div class="md:col-span-2">
                    <div class="my-1">
                        <p class="text-md font-bold">Date of Birth</p>
                        <p class="text-purple-200">{{$data->dob ?? '-'}}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Gender</p>
                        <p class="text-purple-200">{{$data->gender ?? '-' }}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Bio</p>
                        <p class="text-purple-200">{{$data->bio ?? '-'}}</p>
                    </div>
                    <div class="my-1">
                        <p class="text-md font-bold">Status</p>
                        <p class="text-purple-200">{{$data->status?? '-'}}</p>
                    </div>
                </div>
            </div>
            <div>
                @if($data->status == 'banned')
                <div class="flex justify-center items-center">
                    <a class="bg-green-400 p-2 rounded-md mx-1 cursor-pointer text-green-700 hover:text-green-100 hover:bg-green-700 active:bg-green-400"
                        href="{{ route('banlist.unban', $data->id) }}">
                        <i class="fa-regular fa-handshake"></i> Unban
                    </a>
                </div>
                @else
                <div class="flex justify-center items-center">
                    <a class="bg-red-600 p-2 rounded-md mx-1 cursor-pointer text-red-300 hover:text-red-100 hover:bg-red-700 active:bg-red-400"
                        href="{{route('userlist.ban',$data->id)}}">
                        <i class="fa-solid fa-ban"></i> Ban
                    </a>
                </div>
                @endif

            </div>

        </div>
    </div>
@endsection
