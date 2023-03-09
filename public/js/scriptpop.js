$(()=>{
  $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
    $('#deletepop').on('click',(e)=>{
         e.preventDefault();
         const id = $('#deletepop').val();
         console.log('fuck');
         swal({
            title: "Are you sure?",
            text: "Once event is deleted , you will loss all its contestants "+id,
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                const data ={
                  '_token': $('input[name=_token').val(),
                  'id': id
                }
              $.ajax({
                type: 'DELETE',
                url: 'event/delete/'+id,
                data: data,
                success: function(response){
                  swal(response.status, {
                    icon: "success"
                  }).then((result)=>{
                    location.reload();
                  }
                  );
                }
              });
             
            } else {
              // swal("Your imaginary Event is safe!");
            }
          });
    });


    $('#deleteCont').on('click',(e)=>{
      e.preventDefault();
      const id = $('#deleteCont').val();
      console.log(id);
      swal({
         title: "Are you sure?",
         text: "Once Contestant is deleted ,all votes and payment associated with he/she will be deleted "+id,
         icon: "warning",
         buttons: true,
         dangerMode: true,
       })
       .then((willDelete) => {
         if (willDelete) {
             const data ={
               '_token': $('input[name=_token').val(),
               'id': id
             }
           $.ajax({
             type: 'DELETE',
             url: 'contestant/delete/'+id,
             data: data,
             success: function(response){
               swal(response.status, {
                 icon: "success"
               }).then((result)=>{
                 location.reload();
               }
               );
             }
           });
          
         } else {
           // swal("Your imaginary Event is safe!");
         }
       });
 });
}
);