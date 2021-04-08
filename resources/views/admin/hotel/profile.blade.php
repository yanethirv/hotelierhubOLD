<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hotel Profile</title>
    
    <style>
/* =============================================================
   GENERAL STYLES
 ============================================================ */
 body {
    font-family: 'Open Sans', sans-serif;
    font-size:22px;
    line-height:30px;
}
.pad-top-botm {
    padding-bottom:10px;
    padding-top:10px;
}
h4 {
    text-transform:uppercase;
    color: #7367f0;
}
/* =============================================================
   PAGE STYLES
 ============================================================ */

.contact-info span {
    font-size:14px;
    padding:0px 50px 0px 50px;
}

.contact-info hr {
    margin-top: 0px;
    margin-bottom: 0px;
}

.client-info {
    font-size:18px;
}

.ttl-amts {
    text-align:right;
    padding-right:50px;
}

b {
    color: #3a3939
}

h2 {
    color: #3a3939
}

.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)}

.w3-container,.w3-panel{padding:0.01em 16px}.w3-panel{margin-top:8px;margin-bottom:8px}

.w3-light-grey,.w3-hover-light-grey:hover,.w3-light-gray,.w3-hover-light-gray:hover{color:#000!important;background-color:#f1f1f1!important}

.w3-left{float:left!important}.w3-right{float:right!important}

.w3-margin-left{margin-left:16px!important}.w3-margin-right{margin-right:16px!important}


</style>
</head>

<body>
    <div class="container">
        <div class="row pad-top-botm ">
           <div class="col-lg-6 col-md-6 col-sm-6 ">
              <!--<img src="assets/img/logo.jpg" style="padding-bottom:20px;"> -->
              <h1 style="color: #7367f0">HOTELIER HUB</h1>
           </div>
        </div>

        <div class="row pad-top-botm client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2>HOTEL PROFILE</h2>
                <h4><strong>General</strong></h4>
                <b>Name: </b>{{ $hotel->name }}
                <br>
                <b>Description: </b>{{ $hotel->description }}</p>
                <br>
                <b>Stars: </b> {{ $hotel->stars }}
                <br>
                <b>Range of Rooms: </b> {{ $hotel->range_rooms }}
                <br>
                <b>Opening Date :</b> {{ $hotel->opening_date }}
                <br>
                <b>Floor Number :</b> {{ $hotel->floor_number }}
                <br>
                <b>Property Type :</b> {{ $hotel->property_type }}
                <br>
                <b>Experiences :</b>    @foreach($hotel->experience as $value)
                                            {{$value}}, 
                                        @endforeach
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Social</strong></h4>
                <b>Instagram: </b>{{ $hotel->instagram }}
                <br>
                <b>Facebook: </b>{{ $hotel->facebook }}</p>
                <br>
                <b>LinkedIn: </b> {{ $hotel->linkedin }}
                <br>
                <b>Youtube: </b> {{ $hotel->youtube }}
                <br>
                <b>Twitter :</b> {{ $hotel->twitter }}
            </div>
        </div>

        <div class="row client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Contact</strong></h4>
                <b>Front Desk Phone: </b>{{ $hotel->frontdesk_phone }}
                <br>
                <b>Reservation Phone: </b>{{ $hotel->reservation_phone }}</p>
                <br>
                <b>Front Desk Email: </b> {{ $hotel->frontdesk_email }}
                <br>
                <b>Reservation Email: </b> {{ $hotel->reservation_email }}
                <br>
                <b>Billing Contact Email :</b> {{ $hotel->billingcontact_email }}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Location</strong></h4>
                <b>Country: </b>{{ $hotel->country }}
                <br>
                <b>State: </b>{{ $hotel->state }}</p>
                <br>
                <b>City: </b> {{ $hotel->city }}
                <br>
                <b>Address: </b> {{ $hotel->address }}
            </div>
        </div>

        <div class="row client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Rooms</strong></h4>
                <div class="w3-container">
                    @foreach ($rooms as $room)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Room Code: </b>{{ $room->code }}
                        </header>
                        <div class="w3-container">
                            <b>Type : </b>{{ $room->typeroom->name }}
                            <br>
                            <b>Number of rooms : </b> {{ $room->number_rooms }}
                            <br>
                            <b>Occupancy per room : </b> {{ $room->occupancy->name }}
                            <br>
                            <b>Description : </b> {{ $room->description }}
                            <br>
                            <b>Extra person : </b> {{ $room->extra_person }}
                            <br>
                            <b>Late check out : </b> {{ $room->late_check_out }}
                            <br>
                            <b>Early check in : </b> {{ $room->early_check_in }}
                            <br>
                            <b>Roll away bed : </b> {{ $room->roll_away_bed }}
                            <br>
                            <b>Pet fee : </b> {{ $room->pet_fee }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Food & Beverage</strong></h4>
                <div class="w3-container">
                    @foreach ($restaurants as $restaurant)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Restaurant Name: </b> {{ $restaurant->name }}
                        </header>
                        <div class="w3-container">
                            <b>How many Pax : </b> {{ $restaurant->pax }}
                            <br>
                            <b>Open Time : </b> {{ $restaurant->open_time }}
                            <br>
                            <b>Closing Time : </b> {{ $restaurant->closing_time }}
                            <br>
                            <b>Theme : </b> {{ $restaurant->theme->name }}
                            <br>
                            <b>Type : </b> {{ $restaurant->typerestaurant->name }}
                            <br>
                            <b>Included : </b> {{ $restaurant->included }}
                            <br>
                            <b>Location : </b> {{ $restaurant->locationrestaurant->name }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Meal Plans</strong></h4>
                <div class="w3-container">
                    @foreach ($mealplans as $mealplan)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Name: </b>{{ $mealplan->name  }}
                        </header>
                        <div class="w3-container">
                            <b>Rate : </b>{{ $mealplan->rate  }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Policies</strong></h4>
                <div class="w3-container">
                    @foreach ($policies as $policy)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Type : </b> {{ $policy->type }}
                        </header>
                        <div class="w3-container">
                            <b>Policy : </b> {{ $policy->description }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Rate Plans</strong></h4>
                <div class="w3-container">
                    @foreach ($rateplans as $rateplan)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Name: </b>{{ $rateplan->name  }}
                        </header>
                        <div class="w3-container">
                            <b>Suggestion : </b>{{ $rateplan->suggestion  }}
                            <br>
                            <b>Description : </b>{{ $rateplan->description  }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Rates</strong></h4>
                <div class="w3-container">
                    @foreach ($rateplansrooms as $rateplanroom)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Rate Plan : </b> {{ $rateplanroom->rateplan }}
                        </header>
                        <div class="w3-container">
                            <b>Room : </b> {{ $rateplanroom->room }}
                            <br>
                            <b>Rate : </b> {{ $rateplanroom->rate }}
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row client-info">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Rate Plans</strong></h4>
                <div class="w3-container">
                    @foreach ($photos as $photo)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Name : </b>{{ $photo->name }}
                        </header>
                        <div class="w3-container">
                            <b>Location : </b> {{ $photo->location->name }}
                            <br>
                            <img class="card-img-top" style="height: 400px; width: 100%; display: block;" src="{{ public_path($photo->photo) }}">
                            <br>
                        </div>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h4><strong>Documents</strong></h4>
                <div class="w3-container">
                    @foreach ($documents as $document)
                    <div class="w3-card-4" style="width:100%">
                        <header class="w3-container w3-light-grey">
                            <b>Name : </b> {{ $document->name }}
                        </header>
                    </div>
                    <br>                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>