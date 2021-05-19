<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome {{Auth::user()->name}}

            <b class="float-end">จำนวนผู้ใช้ {{count($user)}}คน</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
            <div class="row">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อ</th>
                <th scope="col">อีเมล</th>
                <th scope="col">วันสมัคร</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $obj)
                    <tr>
                    <th scope="row">{{$obj->id}}</th>
                    <td>{{$obj->name}}</td>
                    <td>{{$obj->email}}</td>
                    <td>{{$obj->created_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
</x-app-layout>
