@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>All Contestants</h3>
                <a href="{{route('createPeople')}}"> Add Contestant</a>
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
                           <th>Profile</th>
                           <th>Name</th>
                           <th>VotingCode</th>
                           <th>Event</th>
                           <th>Category</th>
                           <th>Votes</th>
                           <th>Amount/frw</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                  <tbody>
                    @foreach($contestants as $item)
                   <tr>
                       <td>{{$item->id}}</td>
                       <td><img src="{{ asset('storage/contImages/'.$item->image)}}" alt="Event photo"
                       style="width:60px;height:60px; border-radius:10%"></td> 
                       <td>{{$item->Name}}</td>
                       <td>{{$item->VotingCode}}</td>
                       <td>{{$item->event->Name}}</td>
                       <td>{{$item->event_category_id}}</td>
                       <td>{{$item->votes->sum('Votes')}}</td>
                       <td>{{$item->Votes->sum('Votes')*100}} </td>
                       <td>
                       <a href="{{ route('editCont',['id'=>$item->id])}}"><i class="material-icons" style="color: blue">edit_square</i></a>
                       <button style="background: white;border:none" value="{{$item->id}}" id="deleteCont"><i class="material-icons" style="color: red">delete</i><button>
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