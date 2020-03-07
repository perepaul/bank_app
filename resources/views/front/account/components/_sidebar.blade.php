<div class="col-md-4">
    <div class="item-team">
        <img src="{{asset('assets/front/img/team/2.jpg')}}" alt="">
        <h4>{{auth()->user()->last_name." ".auth()->user()->first_name}}</h4>
        <span class="country"><img src="{{asset('assets/front/img/country/us.png')}}" alt=""> {{auth()->user()->state}}</span>
        <ul class="list-styles">
            <li><p>Balance: {{"Banlance here!"}}</p></li>
        </ul>
    </div>

    <div class="panel panel-default">
      <!-- List group -->
      <ul class="list-group">
      <li class="list-group-item"><a href="{{route('edit-account')}}">Update Info</a></li>
        <li class="list-group-item"><a href="#">Transfers</a></li>
        <li class="list-group-item"><a href="#">Statements</a></li>
        <li class="list-group-item"><a href="#">Payments</a></li>
      </ul>
    </div>
</div>
