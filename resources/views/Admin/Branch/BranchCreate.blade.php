@extends('Admin.master')
@section('content')
        <section class="main">
            <header>
                <h3>Branches</h3>
                <a href="{{route('createBracnh')}}" id="NewBranch">New Branch</a>
                <a href="{{route('index')}}"><i class="material-icons">home</i></a>
            </header>
               <div class="container">
                <div class="formBranch">
                     <form id="branchForm">
                        @csrf
                          <label for="branchName"> Name</label><br><br>
                          <input type="hidden" name="Branch_id" id="Branch_id">
                          <input type="text" placeholder="name of the branch" name="Name" id="branchName"><br>
                          <label for="description"> Description</label><br><br>
                          <input type="text" placeholder="name of the branch" name="Description" id="description"><br>
                          <label for="branchStatus">Status</label><br><br>
                          <select id="branchStatus" name="Status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select><br><br>


                          
                          <button type="submit" id="saveBtn">Save</button>
                     </form>
                </div>
                <div class="tableBranch">
                     <table class="dataTable">
                        <thead>
                            <tr>
                                <th>No:</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       {{-- <tbody> --}}
                        {{-- <tr>
                            <td>1</td>
                            <td>Voting</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Concert</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sport</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Press conference</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Exhibition</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Meets</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>House party</td>
                            <td>This the voting branch</td>
                            <td><span class="badge">Active</span></td>
                            <td><i class="fa fa-edit">E </i><i>D</i></td>
                        </tr>
                 --}}
                       {{-- </tbody> --}}

                     </table>
                     {{-- <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#">&raquo;</a>
                     </div> --}}
                </div>
               </div>
        </section>
        @endsection

       
       
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        
        
        <script type='text/javascript'>
         
          $(document).ready( function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            const table= $('.dataTable').DataTable({
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                processing: true,
                serverSide: true,
                ajax: "{{ route('createBracnh')}}",
                     columns: [
                        {data: 'DT_RowIndex', name: 'DT_RowInde'},
                        {data:'id',name:'id'},
                        {data: 'Name', name: 'Name'},
                        {data: 'Description', name: 'Description'},
                        {data: 'Status', name: 'Status'},
                        {data: 'action', name:'action'},
                     ]
            });
             $('#saveBtn').click(function(e){
                e.preventDefault();
                $(this).html('Save');
                $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
         
             $.ajax({
                
                data:$('#branchForm').serialize(),
                url:"{{route('storeBranch')}}",
                type: "POST",
                dataType: 'json',
                success:function(data){
                    $("#branchForm").trigger("reset");
                    table.draw();
                },
                error:function(data){
                    console.log('Error:', data);
                    $('#savebtn').html('Save');
                }
             });      
            });
            
            $('body').on('click', '.deleter', function(){
                var Branch_id = $(this).data('id');
                // const Branch_id = 1;
                confirm('Are you sure wnt to delete!!!');
                $.ajax({
                    type:"DELETE",
                    url:'branch/'+Branch_id,
                    success:function(data){
                        table.draw();
                    },
                    error:function(data){
                    console.log('Error:', data);
                    
                }
                });
            });
            $('body').on('click', '.editer', function(){
                const Branch_id =$(this).data('id');
               
                $.get('branch/'+Branch_id+'/edit', function(data){
                    console.log( Branch_id)
                      $('#Branch_id').val(data.id); 
                      $('#branchName').val(data.Name);
                      $('#description').val(data.Description);
                      $('#branchStatus').val(data.Status); 
                });
            })
          });

              
          
          
        </script>

</html>