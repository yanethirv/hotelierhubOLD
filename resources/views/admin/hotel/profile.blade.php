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
    </div>
</body>
</html>