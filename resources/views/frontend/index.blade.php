<!Doctype html>
<html lang="en-Us">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Rutagarama Axcel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage-UpArt</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/glider.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style3.css')}}">
<body>
    <section class="landpage">
        <nav class="frontBar">
            <div class="frontContainer">
            <a href="Index.html" class="frontLogo"><span class="frontLogo2">UpArt</span></a>
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
        <div class="homeSearch">
            <form>
                <input type="text" placeholder="search Event">
                <!-- <img src="../img/search.png"  class="searcher"> -->
            </form>
        </div>
    </section>
   
    <section class="frontBranch">
          <div class="cardContainer">
              @foreach($branches as $item)
              <div class="cardCollection">
                  <h3>{{$item->Name}}</h3>
                  @foreach($item->events as $event)
                  <div class="gridContainer">
                     <div class="gridCard">
                       
                        <div class="cardDescription">
                            <img src="{{ asset('storage/Images/'.$event->Image)}}" alt="Event photo">
                            <div class="photoText">
                                <h4>{{$event->Name}}</h4>
                                 <p>{{$event->EventDate}}</p>
                            </div>
                        </div>
                        <div class="cardExplore">
                            <a href="{{ route('content',['id'=>$event->id])}}"><span>Explore more</span> </a><i class="material-icons" >arrow_forward</i>
                                
                            
                        </div>
                     </div>
                  </div>
                  @endforeach
              </div>
              @endforeach

           
             
          </div>
    </section>
    <section class="frontMain">
        <div class="glider-contain">
            <div class="glider">
              <div class="frontTag"><a href="index.html" id="active" class="atag">All events</a></div>  
              <div class="frontTag"><a href="#" class="atag">Voting</a></div>
              <div class="frontTag"><a href="#" class="atag">Concert</a></div>
              <div class="frontTag"><a href="#" class="atag">Sport</a></div>
              <div class="frontTag"><a href="#" class="atag">Meetings</a></div>
              <div class="frontTag"><a href="#" class="atag">Exhibition</a></div>
              
            </div>
          
            <!-- <button aria-label="Previous" class="glider-prev">«</button>
            <button aria-label="Next" class="glider-next">»</button>
            <div role="tablist" class="dots"></div> -->
          </div>
    </section>
    <script
  src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="{{ asset('/js/script.js')}}"></script>
    <script src="{{ asset('js/glider.min.js')}}"></script>
    <script>
   new Glider(document.querySelector('.glider'), {
  slidesToScroll: 1,
  slidesToShow:7,
  draggable: true,
//   dots: '.dots',
//   arrows: {
//     prev: '.glider-prev',
//     next: '.glider-next'
//   }
});
    </script>
</body>
  </head>
</html>