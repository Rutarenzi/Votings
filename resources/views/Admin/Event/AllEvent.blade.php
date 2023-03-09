@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>All Events</h3>
                <a href="{{route('createEvent')}}"> Add Event</a>
                <a href="{{route('index')}}"><i class="material-icons">home</i></a>
            </header>
            <div>
            <div class="filter">
                <form>
                    <select style="width: 25%"> 
                    <option>Category</option>
                    <option>Most voted</option>
                    <option>recently added</option>
                    </select>
                    <input type="text" class="search" placeholder="search...">
        
        </form></div>
            <div class="tableBranch" style="overflow-x:auto; ">
                <table>
                   <thead>
                       <tr>
                           <th>No:</th>
                           <th>Picture</th>
                           <th>Name</th>
                           <th>Branch Name</th>
                           <th>Event Date</th>
                           <th>Venue</th>
                           <th>Category</th>
                           <th>Status</th>
                           <th>CreatedAt</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                  <tbody>
                @foreach ($events as $item)
                <tr>
                    <td>{{$item->id}}</td>
                     <td><img src="{{ asset('storage/Images/'.$item->Image)}}" alt="Event photo"
                        style="width:60px;height:60px; border-radius:10%"> 
                    </td>
                    <td><a href="{{route('ListCont',['id'=>$item->id])}}">{{$item->Name}}</a></td>
                    <td>{{$item->branch->Name}}</td>
                    <td>{{$item->EventDate}}</td>
                    <td>{{$item->Venue}}</td>
                    <td><ul>
                            @foreach($item->eventCategory as $category)
                                <span class="lister">{{$category->Name}}</span><br><br>
                            @endforeach 
                    </ul>
                    </td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->created_at}} </td>
                    <td><a href="{{url('category/create/'.$item->id)}}"><i class="material-icons" style="color: blue" style="cursor:pointer">add</i></a>
                        <a href="{{ route('eventedit',['id'=>$item->id]) }}"><i class="material-icons" style="color: blue">edit_square</i></a>
                        {{-- <a href="{{ route('deleteEvent',['id'=>$item->id])}}"><i class="material-icons" style="color: red">delete</i></a></td> --}}
                       {{-- <span id="deletepop"> <form method='post'  action="{{route('deleteEvent',$item->id)}}">
                            @method('DELETE')
                            @csrf
                            <button   style="background: white;border:none">
                                <i class="material-icons" style="color: red" >delete</i>
                            </button>
                        </form></span> --}}
                        <button   style="background: white;border:none" id="deletepop" value="{{$item->id}}">
                            <i class="material-icons" style="color: red" >delete</i>
                        </button>
                    </td>
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
   <script
   src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="{{asset('js/scriptpop.js')}}"></script>
</html>