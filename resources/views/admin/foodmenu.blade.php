<x-app-layout> </x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.admincss')
  </head>
  <body>
  <div class="container-scroller">
    @include('admin.navbar')

    <div style="position: relative; top: 60px; right: -60px">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label >Title</label>
                <input style="color: blue" type="text" name="title" placeholder="Food Name" required>
            </div>
            <div>
                <label >Price</label>
                <input style="color: blue" type="number" name="price" placeholder="price" required>
            </div>
            <div>
                <label >Image</label>
                <input  type="file" name="image"  required>
            </div>
            <div>
                <label >Description</label>
                <input style="color: blue" type="text" name="description" placeholder="Enter description" required>
            </div>
            <div>
                <input style="color: black" type="Submit" value="Save" >
            </div>
            
        </form>

    </div>

        <div style=" position: relative; top: 300px; right: 0px">
            <table bgcolor="black">
                <tr>
                    <th style="padding: 30px">Food Name</th>
                    <th style="padding: 30px">Price</th>
                    <th style="padding: 30px">Description</th>
                    <th style="padding: 30px">Image</th>
                    <th style="padding: 30px">Action</th>
                    <th style="padding: 30px">Action2</th>
                    
                </tr>

                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td><img height="20" width="50" src="/foodimage/{{$data->image}}" alt=""></td>
                    <td><a href="{{url('/deletemenu',$data->id)}}">Delete</a></td>
                    <td><a href="{{url('/updatemenu',$data->id)}}">Update</a></td>
                </tr>
                @endforeach

            </table>
        </div>


</div>
    @include('admin.adminscript')
    
  </body>
</html>