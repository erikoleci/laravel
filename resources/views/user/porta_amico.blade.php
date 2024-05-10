@extends('layouts.dashboard')
@section('style')
<style>




.refer-input {
  position: absolute;
  opacity: 0;
  z-index: -1;
}

.refer-row {
  display: flex;
}
.refer-row .refer-col {
  flex: 1;
}
.refer-row .refer-col:last-child {
  margin-left: 1em;
}

/* Accordion styles */
.refer-tabs {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
}

.refer-tab {
  width: 100%;
  color: white;
  overflow: hidden;
}
.refer-tab-label {
  display: flex;
  justify-content: space-between;
  padding: 1em;
  background: #2c3e50;
  font-weight: bold;
  cursor: pointer;
  /* Icon */
}
.refer-tab-label:hover {
  background: #1a252f;
}
.refer-tab-label::after {
  content: "❯";
  width: 1em;
  height: 1em;
  text-align: center;
  transition: all 0.35s;
}
.refer-tab-content {
  max-height: 0;
  padding: 0 1em;
  color: #2c3e50;
  background: white;
  transition: all 0.35s;
}
.refer-tab-close {
  display: flex;
  justify-content: flex-end;
  padding: 1em;
  font-size: 0.75em;
  background: #2c3e50;
  cursor: pointer;
}
.refer-tab-close:hover {
  background: #1a252f;
}

.refer-input:checked + .refer-tab-label {
  background: #1a252f;
}
.refer-input:checked + .refer-tab-label::after {
  transform: rotate(90deg);
}
.refer-input:checked ~ .refer-tab-content {
  max-height: 100vh;
  padding: 1em;
}




.send-button {
  font-size: 19px;
  font-family: 'Pacifico';
  overflow: visible;
  border-radius: 3px;
  position: relative;
  padding-right: 30px;
  background-color: #cbac76;
  border: 2px solid #f1f7f9;
  color: #fff;
  display: block;
  height: 50px;
  width: 135px;
  cursor: pointer;
}
.send-button:hover {
  background-color: #9d8457;
}
.send-button:hover svg {
  -webkit-transform: rotate(10deg);
  -moz-transform: rotate(10deg);
  -o-transform: rotate(10deg);
  -ms-transform: rotate(10deg);
  transform: rotate(10deg);
  -webkit-transition: -webkit-transform 0.15s;
  -moz-transition: -moz-transform 0.15s;
  -o-transition: -o-transform 0.15s;
  -ms-transition: -ms-transform 0.15s;
  transition: transform 0.15s;
}
.send-button svg {
  position: absolute;
  top: 6px;
  right: 20px;
  height: 30px;
  width: auto;
  -webkit-transition: -webkit-transform 0.15s;
  -moz-transition: -moz-transform 0.15s;
  -o-transition: -o-transform 0.15s;
  -ms-transition: -ms-transform 0.15s;
  transition: transform 0.15s;
}
.send-button svg path {
  fill: #fff;
}
.send-button.clicked {
  background-color: #cff5b3;
  border: 2px solid #cff5b3;
  color: #6aaa3b;
  padding-right: 6px;
  -webkit-animation: bounce-in 0.3s;
  -moz-animation: bounce-in 0.3s;
  -o-animation: bounce-in 0.3s;
  -ms-animation: bounce-in 0.3s;
  animation: bounce-in 0.3s;
  cursor: default;
}
.send-button.clicked svg {
  -webkit-animation: flyaway 1.3s linear;
  -moz-animation: flyaway 1.3s linear;
  -o-animation: flyaway 1.3s linear;
  -ms-animation: flyaway 1.3s linear;
  animation: flyaway 1.3s linear;
  top: -80px;
  right: -1000px;
}
.send-button.clicked svg path {
  fill: #6aaa3b;
}
@-moz-keyframes flyaway {
  0% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 25px;
    height: 30px;
  }
  5% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 0px;
    height: 30px;
  }
  20% {
    -webkit-transform: rotate(-20deg);
    -moz-transform: rotate(-20deg);
    -o-transform: rotate(-20deg);
    -ms-transform: rotate(-20deg);
    transform: rotate(-20deg);
    top: 13px;
    right: -130px;
    height: 45px;
  }
  40% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: -40px;
    right: -280px;
    opacity: 1;
    -ms-filter: none;
    filter: none;
  }
  100% {
    -webkit-transform: rotate(60deg);
    -moz-transform: rotate(60deg);
    -o-transform: rotate(60deg);
    -ms-transform: rotate(60deg);
    transform: rotate(60deg);
    top: -200px;
    right: -1000px;
    height: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
  }
}
@-webkit-keyframes flyaway {
  0% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 25px;
    height: 30px;
  }
  5% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 0px;
    height: 30px;
  }
  20% {
    -webkit-transform: rotate(-20deg);
    -moz-transform: rotate(-20deg);
    -o-transform: rotate(-20deg);
    -ms-transform: rotate(-20deg);
    transform: rotate(-20deg);
    top: 13px;
    right: -130px;
    height: 45px;
  }
  40% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: -40px;
    right: -280px;
    opacity: 1;
    -ms-filter: none;
    filter: none;
  }
  100% {
    -webkit-transform: rotate(60deg);
    -moz-transform: rotate(60deg);
    -o-transform: rotate(60deg);
    -ms-transform: rotate(60deg);
    transform: rotate(60deg);
    top: -200px;
    right: -1000px;
    height: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
  }
}
@-o-keyframes flyaway {
  0% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 25px;
    height: 30px;
  }
  5% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 0px;
    height: 30px;
  }
  20% {
    -webkit-transform: rotate(-20deg);
    -moz-transform: rotate(-20deg);
    -o-transform: rotate(-20deg);
    -ms-transform: rotate(-20deg);
    transform: rotate(-20deg);
    top: 13px;
    right: -130px;
    height: 45px;
  }
  40% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: -40px;
    right: -280px;
    opacity: 1;
    -ms-filter: none;
    filter: none;
  }
  100% {
    -webkit-transform: rotate(60deg);
    -moz-transform: rotate(60deg);
    -o-transform: rotate(60deg);
    -ms-transform: rotate(60deg);
    transform: rotate(60deg);
    top: -200px;
    right: -1000px;
    height: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
  }
}
@keyframes flyaway {
  0% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 25px;
    height: 30px;
  }
  5% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: 13px;
    right: 0px;
    height: 30px;
  }
  20% {
    -webkit-transform: rotate(-20deg);
    -moz-transform: rotate(-20deg);
    -o-transform: rotate(-20deg);
    -ms-transform: rotate(-20deg);
    transform: rotate(-20deg);
    top: 13px;
    right: -130px;
    height: 45px;
  }
  40% {
    -webkit-transform: rotate(10deg);
    -moz-transform: rotate(10deg);
    -o-transform: rotate(10deg);
    -ms-transform: rotate(10deg);
    transform: rotate(10deg);
    top: -40px;
    right: -280px;
    opacity: 1;
    -ms-filter: none;
    filter: none;
  }
  100% {
    -webkit-transform: rotate(60deg);
    -moz-transform: rotate(60deg);
    -o-transform: rotate(60deg);
    -ms-transform: rotate(60deg);
    transform: rotate(60deg);
    top: -200px;
    right: -1000px;
    height: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
  }
}
@-moz-keyframes bounce-in {
  0% {
    padding-right: 30px;
  }
  40% {
    padding-right: 6px;
  }
  50% {
    padding-left: 30px;
  }
  100% {
    padding-left: 6px;
  }
}
@-webkit-keyframes bounce-in {
  0% {
    padding-right: 30px;
  }
  40% {
    padding-right: 6px;
  }
  50% {
    padding-left: 30px;
  }
  100% {
    padding-left: 6px;
  }
}
@-o-keyframes bounce-in {
  0% {
    padding-right: 30px;
  }
  40% {
    padding-right: 6px;
  }
  50% {
    padding-left: 30px;
  }
  100% {
    padding-left: 6px;
  }
}
@keyframes bounce-in {
  0% {
    padding-right: 30px;
  }
  40% {
    padding-right: 6px;
  }
  50% {
    padding-left: 30px;
  }
  100% {
    padding-left: 6px;
  }
}


.rwd-table {
  width: 100%;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}


.rwd-table {
  background: #34495E;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #cbac76;
}


</style>
@endsection
@section('content')

    <div class="page-content-wrapper ">

        <div class="container-fluid">

          <div class="row" style="margin: 80px 0; padding:10px 20px; justify-content: center" >
        
            <div class="col-md-6 mb-2">

            <h2>Refer a friend to earn a bonus for you and your friend.</h2>
            <br>

     

            <p style="font-weight: 200">
                Are you having a great time trading with BITFEX LIMITED  Then why not refer your friends and earn a bonus for you and for your friend 
                when your referrals open an account, fund it with a minimum 250€, and start trading live with us. 
                The entire process is easy and straightforward. Just share the link through Facebook, Twitter, 
                email or even in a blog, and when your friend funds their account and starts trading, you will 
                receive your cash bonus. It’s transparent and simple, 
                so start earning your cash bonus today.
            </p>
            
            <br>

            <p style="font-size: 200">
                Invite your friends to experience BITFEX LIMITED. You enjoy being part of a vibrant,
                collaborative community of traders — so don’t just keep it to yourself.
                 Share your passion for investing by bringing friends to trade along with you. 
                 They’ll thank you for it!
           </p>    

           <br>
                <div class="clear">
                    <button class="send-button">
                        <p style="margin-bottom: 0">Send</p>
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                          <path id="paper-plane-icon" d="M462,54.955L355.371,437.187l-135.92-128.842L353.388,167l-179.53,124.074L50,260.973L462,54.955z
                      M202.992,332.528v124.517l58.738-67.927L202.992,332.528z"></path> 
                        </svg>
                      </button>
                </div>

            </div>

            <br>

            <div class="col-md-4">

                <img src="{{asset('/images/referfriend.jpg')}}"  alt="">

            </div>
        </div>  


        <div class="row" style="">
            <div class="col-md-6 " style="margin: 0 auto; border:1px solid white; padding: 38px 15px; border-radius: 11px;">
            <div class="row d-flex align-items-center" style="margin-bottom:20px">
            <div class="col-md-1"><img src="{{asset('/images/refer-1.png')}}" width="35px;" class="lazyloaded" data-ll-status="loaded"><noscript><img src="//gomarketscom-zu9wrxdiii.stackpathdns.com/wp-content/uploads/2019/11/1.png" width="35px;" /></noscript></div>
            <div class="col-md-11">
            <p style="font-size: 13pt;margin-bottom: 0;">Invite your friends to open a live trading account with us.</p>
            </div>
            </div>
            <div class="row d-flex align-items-center" style="margin-bottom:20px">
            <div class="col-md-1"><img src="{{asset('/images/refer-2.png')}}" width="35px;" class="lazyloaded" data-ll-status="loaded"><noscript><img src="//gomarketscom-zu9wrxdiii.stackpathdns.com/wp-content/uploads/2019/11/2.png" width="35px;" /></noscript></div>
            <div class="col-md-11">
            <p style="font-size: 13pt;margin-bottom: 0;">Advise friends to input your code given by your Manager as Promo Code.</p>
            </div>
            </div>
            <div class="row d-flex align-items-center" style="margin-bottom:20px">
            <div class="col-md-1"><img src="{{asset('/images/refer-3.png')}}" width="35px;" class="lazyloaded" data-ll-status="loaded"><noscript><img src="//gomarketscom-zu9wrxdiii.stackpathdns.com/wp-content/uploads/2019/11/3.png" width="35px;" /></noscript></div>
            <div class="col-md-11">
            <p style="font-size: 13pt;margin-bottom: 0;">Your friends deposit min 250€ and trade five eligible trades.</p>
            </div>
            </div>
            <div class="row d-flex align-items-center" style="margin-bottom:20px">
            <div class="col-md-1"><img src="{{asset('/images/refer-4.png')}}" width="35px;" class="lazyloaded" data-ll-status="loaded"><noscript><img src="//gomarketscom-zu9wrxdiii.stackpathdns.com/wp-content/uploads/2019/11/4.png" width="35px;" /></noscript></div>
            <div class="col-md-11">
            <p style="font-size: 13pt;margin-bottom: 0;">Once your friend funds and trades with us, we’ll reward you both with the cash deposits.</p>
            </div>
            </div>
           </div>
            <p><!-- ######################################################################################################################################################################## --></p>
            {{-- <div class="col-md-4" style="border-radius: 16px; background: #f2f2f2; padding: 20px 30px 10px 30px;">
            <h3 style="font-size: 22pt; font-weight: bold;">Invite your friends</h3>
            <p style="font-size: 13pt;">If you would like to invite your friends to join GO Markets, please read through the <a style="color: #0882bf;" href="https://gomarketscom-zu9wrxdiii.stackpathdns.com/au/wp-content/uploads/2019/11/Terms-and-Conditions_Refer-a-friend-promo.pdf" target="_blank" rel="noopener noreferrer">Terms &amp; Conditions</a>.</p>
            <p style="font-size: 13pt;">Questions? Get in touch with our team at <a style="color: #0882bf;" href="mailto:support@gomarkets.com">support@gomarkets.com</a>, or phone direct on <a href="tel:61385667680"><b>+61 3 8566 7680</b></a> or <a href="tel:1800885571"><b>1800 88 55 71</b></a></p>
            </div> --}}
            </div>

            <div class="row mt-5" style="padding:10px 20px; justify-content: center">
                
          <div class="col-md-6">
                
            <div class="refer-row">
                <div class="refer-col">
                  <h2>Refer a Friend <b>FAQ</b></h2>
                  <div class="refer-tabs">
                    <div class="refer-tab">
                        <input type="checkbox" class="refer-input" id="chck7">
                        <label class="refer-tab-label"  for="chck7">How it works?
                        </label>
                        <div class="refer-tab-content">
                            In order to receive a referral bonus, your friend must register and fund a trading account with us.
                            The friend will be qualified as an active client only after we receive all the required documents for opening a trading account.
                        </div>
                    </div>
                    <div class="refer-tab">
                      <input type="checkbox" class="refer-input" id="chck1">
                      <label class="refer-tab-label" for="chck1">
                        Who can refer a friend? </label>
                      <div class="refer-tab-content">
                        You can refer a friend if you are an CompanyName live account holder.
                      </div>
                    </div>
                    <div class="refer-tab">
                      <input type="checkbox" class="refer-input" id="chck2">
                      <label class="refer-tab-label"  for="chck2">Who will receive the reward? </label>
                      <div class="refer-tab-content">
                        Both you and your friend will receive the reward.
                      </div>
                    </div>
                    <div class="refer-tab">
                        <input type="checkbox" class="refer-input" id="chck3">
                        <label class="refer-tab-label"  for="chck3">
                            How do I claim my reward? </label>
                        <div class="refer-tab-content">
                            You reward will be automatically credited to your CompanyName live trading account.
                        </div>
                    </div>
                    <div class="refer-tab">
                        <input type="checkbox" class="refer-input" id="chck5">
                        <label class="refer-tab-label"  for="chck5">I have just been referred, can I refer another friend? </label>
                        <div class="refer-tab-content">
                            Of course, you can! 
                            <br>
                            Referred clients benefit from the 20% cashback from the moment they qualify and can introduce other friends right away.
                            The reward is not cumulative and will be received stacked in the following 3 month periods.
                        </div>
                    </div>
                    <div class="refer-tab">
                        <input type="checkbox" class="refer-input" id="chck6">
                        <label class="refer-tab-label"  for="chck6">
                            How long will it take for my reward to be applied? </label>
                        <div class="refer-tab-content">
                            The reward is applied once the introduced client has deposited min 250€ and completed 5 round trades.
                        </div>
                    </div>
                   
                  </div>
                </div>
              </div>
          </div>

            <div class="col-md-6">
                <h2>Top Referrers</h2>
                <table class="rwd-table">
                    <tr>
                      <th>Rank</th>
                      <th>Referral ID</th>
                      <th>Total referrals</th>
                      <th>EUR earnings</th>
                    </tr>
                    <tr>
                      <td data-th="Movie Title">1</td>
                      <td data-th="Genre">**930</td>
                      <td data-th="Year">178</td>
                      <td data-th="Gross">31.253 EUR</td>
                    </tr>
                    <tr>
                      <td data-th="Movie Title">2</td>
                      <td data-th="Genre">**157</td>
                      <td data-th="Year">95</td>
                      <td data-th="Gross">26.751 EUR</td>
                    </tr>
                    <tr>
                      <td data-th="Movie Title">3</td>
                      <td data-th="Genre">**925</td>
                      <td data-th="Year">78</td>
                      <td data-th="Gross">18.367 EUR</td>
                    </tr>
                    <tr>
                        <td data-th="Movie Title">4</td>
                        <td data-th="Genre">**968</td>
                        <td data-th="Year">57</td>
                        <td data-th="Gross">15.247 EUR</td>
                      </tr>
                      <tr>
                        <td data-th="Movie Title">5</td>
                        <td data-th="Genre">**120</td>
                        <td data-th="Year">43</td>
                        <td data-th="Gross">10.657 EUR</td>
                      </tr>
                      <tr>
                        <td data-th="Movie Title">6</td>
                        <td data-th="Genre">**751</td>
                        <td data-th="Year">34</td>
                        <td data-th="Gross">8.127 EUR</td>
                      </tr>
                      
                  </table>
            </div>


            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        }
    </script>
@endsection
