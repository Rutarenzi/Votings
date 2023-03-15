<!Doctype html>
<html lang="en-Us">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Rutagarama Axcel">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style3.css')}}">
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
                Please Approve The transaction on your phone.
                if no prompt,Dial MTN *182*7*1# & AIRTEL *182*5*8#
            </p>
            <div class="closeBtn" id="closeBtnP"><span>X</span></div>
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
                <a href="Index.html" class="frontLogo"><span class="frontLogo2">UpArt</span></a>
                 <a href="#" id="menu"><img src="{{ asset('img/menu.png')}}"></a>
                <ul id="list" class="hide">
                    <li><a class="navA" href="#">EVENTS</a></li>
                    <li><a class="navA" href="#">DISCOVER</a></li>
                    <li><a class="navA" href="#">CONTACT-US</a></li>
                    <li class="login1"><a href="#">Login</a></li>
                </ul>
                @if(auth()->check())
                <a href="{{route('AllEvent')}}" class="login">Dashboard</a>
                @else 
                <a href="#" class="login">Create Event</a>
                @endif
            </div>
           </nav>
           <div class="homeDesc">
            <h3>{{$event->Name}}</h3>
            <p class="para">{{$event->EventDate}}</p>
            <p class="para">find somethi</p>
         </div>
        </section>
        <div class="thumbnail">
            <img src="{{ asset('storage/Images/'.$event->Image)}}" >
           </div>
        <section class="playeContainer">
               <div class="subContainer">
                
                 <h3 >CONTESTANTS<br><br><br>
                    
                  <hr>
                </h3>
                 <div class="playerCollection">
                    @foreach($event->eventCategory as $category)
                    <h4>{{$category->Name}}</h4>
                   
                     <div class="playerContainer" >
                       
                        @foreach($category->contestants as $item)
                            <div class="gridPlayer">
                                <div class="middleGrid">
                               <a href="{{ route('singleCont',['id'=>$item->id])}}"> <img src="{{ asset('storage/contImages/'.$item->image)}}" alt="Event photo"></a>
                                <div class="PlayerDesc">    
                                        <h5>{{$item->Name}}</h5>
                                        <div>
                                            <p>{{$item->votes->sum('Votes')}} Votes</p>
                                            {{-- <p>{{$item->id}}</p> --}}
                                        </div>
                                         
                                </div>
                            </div>
                                <div class="playerBtn">
                                <button class="voteButton" onclick="clicker({{$item->id}},'{{$item->Name}}')">Vote</button>
                             </div>
                           </div>
                           @endforeach
         </div>
         @endforeach

       </div>
    </div>
</div>
</div>
              
        </section>
         
    </body>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</html>