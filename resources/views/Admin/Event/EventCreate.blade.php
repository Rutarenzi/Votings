@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>Add Event</h3>
                <a href="{{route('AllEvent')}}">All Events</a>
                <a href="{{route('index')}}"><i class="material-icons">home</i></a>
            </header>
            <div class="container">
               
                <div class="formBranch" id="formTable">
                    <form action="{{ 'store'}}" method="Post" enctype="multipart/form-data">
                        @csrf
                         <label for="branchName"> Name</label><br><br>
                         <input type="text" placeholder="name of the Event" id="branchName" value="" name="Name"><br>

                                   @error('Name')
                                        <div class="error">{{$message}}</div>
                                    @enderror

                         <label for="Dater">Date</label><br><br>
                         <input type="date" placeholder="Date of the event" id="Dater" value="" name="EventDate"><br>
                                     @error('EventDate')
                                         <div class="error">{{$message}}</div>
                                     @enderror    
                         <label for="branchStatus">Branch</label><br><br>
                         <select id="branchStatus" name="Branch_id">
                            <option >Select Event</option>
                            @foreach ($branches as $item)
                            <option value="{{$item->id}}">{{$item->Name}}</option>
                            @endforeach
                          
                          </select><br><br>
                          @error('EventDate')
                          <div class="error">{{$message}}</div>
                      @enderror 
                         <label for="branchName">Venue</label><br><br>
                         <input type="address" placeholder="name of the Event" id="branchName" name="Venue"><br>
                         {{-- <label for="category">Category</label> <br><br>
                         <textarea for="category" name="">Hello</textarea> <br>  --}}
                         <label for="branchStatus">Status</label><br><br>
                          <select id="branchStatus" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select><br><br>
                         <label for="filer">Event Banner</label><br><br>
                          <input type="file" id="filer" name="Image"  onchange="preview(event)"> 
                                         @error('Image')
                          <div class="error">{{$message}}</div>
                      @enderror  
                         <div id="previewer"></div>                    
                         <button type="submit">Save</button>
                    </form>
               </div></div>
        </section>
    @endsection  
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