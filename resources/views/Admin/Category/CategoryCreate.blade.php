@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>Branches</h3>
                <a href="{{route('index')}}"><i class="material-icons">home</i></a>
            </header>
               <div class="container">
                <div class="formBranch">
                     <form action="{{ route('StoreCategory')}}" method="Post">

                        @csrf
                          <label for="branchName"> Name</label><br><br>
                          @error('Name')
                          <div class="error">{{$message}}</div>
                      @enderror
                          <input type="text" placeholder="name of the branch" id="branchName" name="Name" value ={{ old('Name')}}><br>
                          {{-- <label for="description"> Description</label><br><br>
                          <input type="text"  id="description" placeholder="" value=""><br> --}}
                        
                          <label for="branchStatus">Event</label><br><br>
                          @error('event_id')
                          <div class="error">{{$message}}</div>
                      @enderror
                          <select id="branchStatus" name="event_id">
                            <option value="{{$event->id}}" selected>{{$event->Name}}</option>
                            
                          </select><br><br>


                          
                          <button>Save</button>
                     </form>
                </div>
                <div class="tableBranch">
                     <table>
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Event</th>
                                <th>Category</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                       <tbody>
                        @foreach($eventCategories as $category  )
                        <tr>
                          <td>{{$category->id}}</td>
                          <td>{{$category->eventer->Name}}</td>
                          <td>{{$category->Name}}</td>
                          <td style="display: flex; justify-content: center"><a href="{{ route('EditCategory',['id'=>$event->id, 'ider'=>$category->id])}}"><i class="material-icons" style="color: blue">edit_square</i></a><form method='post' action="{{route('DeleteCategory',$category->id)}}">
                            @method('DELETE')
                            @csrf
                            <button  style="background: white;border:none">
                            <i class="material-icons" style="color: red">delete</i>
                            </button>
                        </form></td>
                        </tr>
                        @endforeach
                
                       </tbody>

                     </table>
                     <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#">&raquo;</a>
                     </div>
                </div>
               </div>
        </section>
        
    @endsection

</html>



