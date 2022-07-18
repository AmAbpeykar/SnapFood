<script>
    // Get element references
    var confirmBtn = document.getElementById('confirmPosition');
    var onClickPositionView = document.getElementById('onClickPositionView');
    var onIdlePositionView = document.getElementById('onIdlePositionView');

    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
        setCurrentPosition: true, // You can omit this, defaults to true
    }, {
        zoom: 15 // You can set any google map options here, zoom defaults to 15
    });

    // Listen to button onclick event
    confirmBtn.onclick = function () {
        // Get current location and show it in HTML
        var location = lp.getMarkerPosition();
        onClickPositionView.innerHTML = 'Lat:' + location.lat + ', Lng:' + location.lng;
    };

    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
        // Get current location and show it in HTML
        var location = lp.getMarkerPosition();
        onIdlePositionView.innerHTML = 'Lat:' + location.lat + ', Lng:' + location.lng;
    });
</script>
