@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>Add Contestants</h3>
                <!-- <a href="">All Contestants</a> -->
                <a href="{{route('index')}}"><i class="material-icons">home</i></a>
            </header>
            <div class="container">
               
                <div class="formBranch" id="formTable">
                    <form action={{ 'store'}} method="Post" enctype="multipart/form-data">
                        @csrf
                         <label for="brancName"> Name</label><br><br>
                         <input type="text" name="Name" placeholder="name of the Event" id="branchName"><br>
                         @error('Name')
                                <div class="error">{{$message}}</div>
                         @enderror
                         {{-- <label for="Dater">Number</label><br><br> --}}
                         {{-- <input type="number" name="VotingCode" placeholder="Contestant number" id="Dater"><br> --}}
                         <label for="contevent">Event</label><br><br>
                         <select id="contevent" name="event_id">
                            <option selected disabled>Event</option>
                             @foreach ($event as $item)
                                 <option value="{{$item->id}}">{{$item->Name}}</option>
                             @endforeach
                          </select><br><br>
                          @error('event_id')
                          <div class="error">{{$message}}</div>
                   @enderror
                         <label for="eventcat">Category</label><br><br>
                         <select id="eventcat" name="event_category_id">
                            {{-- <option selected disabled>Event category</option> --}}
                          </select><br><br>
                          @error('event_category_id')
                          <div class="error">{{$message}}</div>
                           @enderror
                          <label for="filer">Profile Photo</label><br><br>
                          <input type="file" id="filer" name="image" onchange="preview(event)">  
                          <div id="previewer"></div>  
                         <button type="submit">Save</button>
                    </form>
               </div></div>
        </section>
        @endsection

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" >
           $(document).ready(()=>{
            $('#contevent').on("change",()=>{
                let id= $("#contevent").val();
                console.log(id)
                $('#eventcat').empty();
                $("#eventcat").append(`<option value="0" disabled selected>Event category</option>`);
                $.ajax({
                    type: 'GET',
                    url: 'category/alljson/' + id,
                    success: function(res){
                        var res =JSON.parse(res);
                        $("#eventcat").empty();
                        $("#eventcat").append(`<option value="0" deisabled selected>Event category</option>`);
                        res.forEach(item =>{
                            $("#eventcat").append(`<option value="${item['id']}">${item['Name']}</option>`);
                        });
                    }
                });

            });
           });
        </script>
          <script>
          
            function preview(event){
              const image= URL.createObjectURL(event.target.files[0]);
              const imageDiv =document.getElementById('previewer');
              const newImg = document.createElement('img');
  
              imageDiv.innerHTML ='';
              newImg.src=image;
              newImg.width= "100",
              newImg.height="100",
             
              imageDiv.appendChild(newImg);
              
          }
          </script>

</html>