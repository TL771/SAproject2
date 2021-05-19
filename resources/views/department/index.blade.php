<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome {{Auth::user()->name}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class = "row">
                <div class= "col-md-8">
                    @if (session("success"))
                        <div class="alert alert-success">{{session("success")}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                                ข้อมูลแผนก
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">userID</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">วันลง</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department as $obj)
                                    <tr>
                                    <th scope="row">{{$obj->userID}}</th>
                                    <td>{{$obj->name}}</td>
                                    <td>{{$obj->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$department->links()}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">แบบฟอร์ม</div>
                        <div class="card-body">
                            <form action="{{route('department_add')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">ชื่อตำแหน่งงาน</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                @error('name')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                                <br>
                                <input type="submit" value="บันทึก" class = "btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>