<!DOCTYPE html>
<html lang="en-us">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Rutagarama Axcel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style3.css')}}">
    <title>Single- Product</title>
</head>

<body>
    <div class="paymentAgent">
        <div class="closeBtn"><span>X</span></div>
         <div> <h3>Payment Method</h3></div>
         <div class="Agent">
        
        <span class="momo"><img src="{{ asset('img/mtnairtel.jpeg')}}" width="150" height="75" ></span>
        <span ><img src="{{ asset('img/visa.png')}}" width="150" height="75"></span> 
                 
    </div> 
    </div> 
    <div class="paymentForm">
        <div class="closeBtn"><span>X</span></div>
        <h3>Support <span id="namer"></span></h3>
        <form method="POST" action="" id="form-data" data-route="{{route('payment')}}" >
            @csrf
            <a id="numError" style="color: red;font-weight: bold;float: left; margin: 5px;" ></a>
            <input type="hidden" id="ider" name="id">
             
            <div class="inputPhone">
                
               <span>+250</span><input type="tel" value="" name="phone" onkeypress="return onlyNumber(event)" id="payNumber" placeholder="Enter Phone number" maxlength="9">

            </div>
            
            <div class="inputAmount">
                <select id="voter" name="vote">
                    <option selected value="0"><span>Vote</span>--<span>Amount</span></option>
                         <option value="100"><span>1votes</span>--<span>100frw</span></option>
                        <option value="500"><span>5votes</span>--<span>500 frw</span></option>
                        <option value="1000"><span>10votes</span>--<span>1000frw</span></option>
                        <option value="2000"><span>20votes</span>--<span>2000frw</span></option>
                        <option value="5000"><span>50votes</span>--<span>5000frw</span></option>
                </select>
                
            </div>
            <button type="sumbit" id="Paybtn">Pay</button>
        </form>
    </div>
    <div class="paymentLoad" id="loader200">
        <p> 
            Please Approve The transaction on your phone
            Please Approve The transaction on your phone
        </p>
        <div class="closeBtn"><span>X</span></div>
         <div>
         <div class="loader">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
            <div class="bar7"></div>
            <div class="bar8"></div>
            <div class="bar9"></div>
            <div class="bar10"></div>
            <div class="bar11"></div>
            <div class="bar12"></div>
        </div>
     
        </div>
     
    </div> 

    <div class="paymentLoad" id="loaderL">
        <h3 style="margin-bottom: 15px;">Please wait!!</h3>
        <div class="closeBtn"><span>X</span></div>
        
         <div>
         <div class="loader">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
            <div class="bar4"></div>
            <div class="bar5"></div>
            <div class="bar6"></div>
            <div class="bar7"></div>
            <div class="bar8"></div>
            <div class="bar9"></div>
            <div class="bar10"></div>
            <div class="bar11"></div>
            <div class="bar12"></div>
        </div>
     
        </div>

     
    </div> 

    <div class="paymentLoad" id="loader">
        <div class="closeBtn"><span>X</span></div>
         <div class="circheck">
            <i class="material-icons loaderI">checked</i>
        </div>
    </div> 
    <div class="paymentLoad" id="loaderX">
        <div class="closeBtn"><span>X</span></div>
        <p class="error2"></p>
         <div class="circheckx">
            <i class="material-icons loaderI2">closed</i>
        </div>
    </div> 
    <section class="landpage">
        <nav class="frontBar">
            <div class="frontContainer">
            <a href="{{ route('index')}}" class="frontLogo"><span class="frontLogo2">UpArt</span></a>
             <a href="#" id="menu"><img src="../img/menu.png"></a>
            <ul id="list" class="hide">
                <li><a class="navA" href="#">Events</a></li>
                <li><a class="navA" href="#">Discover</a></li>
                <li><a class="navA" href="#">Contact-Us</a></li>
                <li class="login1"><a href="#">Login</a></li>
            </ul>
            @if(auth()->check())
            <a href="{{route('AllEvent')}}" class="login">Dashboard</a>
            @else 
            <a href="#" class="login">Create Event</a>
            @endif
        </div>
       </nav>
    </section>

        <div class="singleCard">
             <div class="imgSingle">
                <img src="{{ asset('storage/contImages/'.$contestant->image)}}" alt="Event photo">
             </div>
             <div class="singleDisc">
                <div><h2>{{$contestant->Name}}</h2></div><br><br><br>
                  <div><span class="singlesVotes">{{$contestant->votes->sum('Votes')}} Votes</span> <i></i></div>
                  <div class="disc">
                    <h3>{{$contestant->id}}</h3>
                    <img src="{{ asset('img/qr.png')}}"><br>
                    <button class="voteButton" onclick="clicker({{$contestant->id}},'{{$contestant->Name}}')"> Voting</button>
                 </div>
             </div>
            
        </div>
        <script
        src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>