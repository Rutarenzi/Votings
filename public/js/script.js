$(()=>{ 
$(window).scroll(()=>{
    if($(window).scrollTop()){
        $(".frontBar").addClass("whiter");
        $(".frontContainer").addClass("pad");
        $(".navA").addClass("a");


    } else{
        $(".frontBar").removeClass("whiter");
        $(".frontContainer").removeClass("pad");
        $(".navA").removeClass("a");
    }
});
 $('#payNumber').on("keyup",(e)=>{
      const payNum = $('#payNumber').val();
      const v = [2,3,8,9];
      const arrayPay =Array.from(String(payNum),Number);
      if(arrayPay[0] !== 7){
        e.preventDefault();
        $('#numError').text("Start with 7");
      } else if(arrayPay[0] === 7){
        e.preventDefault();
        $('#numError').text(" ");
      if(arrayPay.length >= 2){
      if(!v.includes(arrayPay[1])){
        e.preventDefault();
        $('#numError').text("please enter Rwanda number");
      }else{
        $('#numError').text(" ");
      }}
       if( arrayPay.length == 9  && arrayPay[0] == 7 && v.includes(arrayPay[1])){
        $('#Paybtn').removeClass('enable');
        
       } else if(arrayPay.length <9 && arrayPay[0] == 7 && v.includes(arrayPay[1])){
        e.preventDefault();
        $('#Paybtn').addClass('enable');
       }

      }
   
      
   });
      
   $('#Paybtn').on("click",(e)=>{
    const vote = $('#voter').val();
    const num =$('#payNumber').val();
    const v = [2,3,8,9];
    const arrayPay =Array.from(String(num),Number);
    const payNum = $('#payNumber').val();
    if( vote == 0 || num < 9 || arrayPay[0] !== 7 || !v.includes(arrayPay[1])){
      $("#numError").text("please provide you number and votes");
      e.preventDefault();
    }
});
 
   $("#form-data").on("submit", (e)=>{
    $('.paymentForm').hide();
    $("#loaderL").show()
    const route = $("#form-data").data('route');
    const  valuer = $("#form-data");
    const po = $("#loaderX");
    const error = $(".error2");
    const loder = $("#loaderL");
    const loaderS = $("#loader200");
  //   $.ajaxSetup({
  //     headers:{
  //         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
  //     }
  // });
   
    $.ajax({
      type:'POST',
      url: route,
      data: valuer.serialize(),
      success: function(Response){
        console.log(Response);
        if(Response.code == 401){
          loder.hide();
          error.text(Response.description);
          po.show();
          console.log(Response.description);
        }else if(Response.code == 200){
          loder.hide();
          loaderS.show();
        };

      },
      // callback: function(res){
      //   $.ajax({
      //     type: 'POST',
      //     url: 'payments/callback',
      //     success: function(res){
      //       console.log(res);
      //       loaderS.hide();
      //     }
      //  });
      // },
    });
    e.preventDefault();
  });
  $(".voteButton").click(()=>{
    console.log('hell1');
    $(".paymentAgent").css("display","block"); 
  });
  $(".momo").click(()=>{
    $(".paymentAgent").css("display","none"); 
    $('#Paybtn').addClass('enable');
    $(".paymentForm").css("display","block")
  })
  $(".closeBtn").click(()=>{
    $(".paymentAgent").css("display","none");
    $(".paymentForm").css("display","none")
  })

});
const clicker=(id,name)=>{
     document.getElementById('ider').value= id;
     document.getElementById('namer').innerText=name;
  };

const menu = document.getElementById('menu');
const  list = document.getElementById("list");

menu.addEventListener('click',()=>{
    list.classList.toggle('hide');
})
function onlyNumber(evt) {
              
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
  
body.addEventListener('onscroll',()=>{
    list.classList('.hide');
})
