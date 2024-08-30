@extends('layouts.app')

@section('css')

@endsection

@section('content')

<section class="flex p-2 max-w-full flex-col items-center gap-8">
    <div class="">
        <h1 class="text-2xl font-bold">I'm Student</h1>
    </div>

    <div class="">
        <table class=" text-center bg-white shadow-md rounded-lg ">
            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 ">Id</th>
                    <th class="py-3 px-6 ">Title</th>
                </tr>
            </thead>
            <tbody id="data" class="text-gray-600 text-sm font-light">
                
            </tbody>
        </table>
    </div>
</section>


@can('admin.index')
<h1>I'm Administrator</h1>
@endcan

@endsection

@section('js')
@vite(['resources/js/api.js'])
@endsection
