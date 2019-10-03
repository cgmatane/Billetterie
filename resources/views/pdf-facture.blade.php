
<body>
<div id="content">
    <h2>Hello <b> <span style="color:red">{{ ucfirst($name) }}</span> </b></h2>
    <p>
        {{ $message }}
        email : {{$email}}
    </p>
    <div>Destination : {{$destination}}</div>
    <div>Départ le {{$date}} à {{$heure}}</div>
</div>
</body>
