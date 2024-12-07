@extends('layouts.app',['page' => __('Violence Rules')])

@section('content')
<div class="lg:grid lg:grid-cols-3">
    <div class="col-span-1 mx-auto">
        <form class="w-full" action="{{ route('violence.store')}}">
            <label for="violence" class="font-bold text-md">Create Violence Rules</label>
            <input type="text" id="violence" class="block text-lg p-1 rounded-md border border-purple-300 focus:ring-2 focus:ring-purple-300 focus:border-purple-300 w-full" name="violence">
            @error('violence')
            <small class="text-red-500 my-1">{{ $message }}</small>
            @enderror
            <div class="flex my-2 justify-end items-center">
                <button type="submit" class=" bg-purple-300 rounded-md p-1 w-1/2 hover:bg-purple-400 focus:outline-none active:bg-purple-200">Create</button>
            </div>
        </form>
    </div>
    <div class="card-body col-span-2">
        <div class="table-full-width table-responsive">
            <table class="table tablesorter" id="">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Violence Category
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                          {{$item->id}}
                        </td>
                        <td>
                          {{$item->violence}}
                        </td>
                        <td>
                            <div class="flex justify-center items-center">
                                <div class="flex justify-center items-center">
                                    <a class="bg-sky-500 p-2 rounded-md mx-1 cursor-pointer hover:text-sky-300" href="{{route('violence.editForm', $item->id)}}">
                                        <i class="fa-regular fa-pen-to-square text-xl "></i>
                                    </a>
                                </div>
                                <div class="flex justify-center items-center">
                                    <a class="bg-red-500 p-2 rounded-md mx-1 cursor-pointer hover:text-red-300"  href="{{route('violence.delete', $item->id)}}">
                                        <i class="fa-regular fa-trash-can text-xl "></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

