

      var map;//dummy map not visible , only to use the api
      var latt;//get my latittude
      var long;//to get my longitude

      var ip,tp,pp;
      var GlobalCounter=0;

// function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
       
    } else { 
       console.log("Geolocation is not supported by this browser.");
    }
// }

function showPosition(position) {
    latt = position.coords.latitude ;
    long = position.coords.longitude;
    initMap(latt,long);
}

      function initMap(lat , lng) {
          
        // Create the map.
        var pyrmont = {lat: latt, lng: long};
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 17
        });
        var mrkr=new google.maps.Marker({
          position : pyrmont,
          map:map
        });

        // Create the places service.
        var service = new google.maps.places.PlacesService(map);
        //the map will be hidden

        // Perform a nearby search.
        service.nearbySearch(
            {location: pyrmont, radius: 2000, type: ['restaurant']},
            function(results, status, pagination) {
              if (status !== 'OK') return;

              createMarkers(results);
              moreButton.disabled = !pagination.hasNextPage;
              getNextPage = pagination.hasNextPage && function() {
                pagination.nextPage();
              };
            });
      }

      function createMarkers(places) {
        
       
        var TabList=document.getElementById('placess');

        for (var i = 0, place; place = places[i]; i++) {

          /**********Distance**********/
var rad = function(x) {
  return x * Math.PI / 180; 
}
 var Latittude=place.geometry.location.lat()-latt;
 var Longitude=place.geometry.location.lng()-long;
 var R = 6378137; // Earth’s radius in meter
 var dLat = rad(Latittude);
 var dLong = rad(Longitude);
 var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +Math.cos(rad(latt)) * Math.cos(rad(place.geometry.location.lat())) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
 var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
 var distance = R * c;
 console.log("the disstance is :"+distance);
/**********Get Distance***********/




          //making the TR
          var tr = document.createElement('tr');
            
            //input creation
          var td=document.createElement('td');
          td.className = "id_place";
          td.id = "id_place";
       

          var input=document.createElement('input');
          input.setAttribute('type',"text");
                        input.setAttribute('name',"id_place[]");
          input.setAttribute('value',place.place_id);
          td.appendChild(input);








          var td2=document.createElement('td');
          td2.className = "name_place";
          td2.id = "name_palce";
        
          var input2=document.createElement('input');
          input2.setAttribute('type',"text");
                        input2.setAttribute('name',"name_place[]");
          input2.setAttribute('value',place.name);
          td2.appendChild(input2);



          var td3=document.createElement('td');
          td3.className = "lt_place";
          td3.id = "lt_place";
         
          var input3=document.createElement('input');
          input3.setAttribute('type',"text");
          input3.setAttribute('name',"lt_place[]");
          input3.setAttribute('value',place.geometry.location.lat());
          td3.appendChild(input3);




          var td4=document.createElement('td');
          td4.className = "lg_place";
          td4.id = "lg_place";
         
          var input4=document.createElement('input');
          input4.setAttribute('type',"text");
          input4.setAttribute('name',"lg_place[]");
          input4.setAttribute('value',place.geometry.location.lng());
          td4.appendChild(input4);


          /********create's distance********/
          var td5=document.createElement('td');
          td5.className = "distance";
          td5.id = "distance";
          
          var input5=document.createElement('input');
          input5.setAttribute('type',"text");
          input5.setAttribute('name',"distance_place[]");
          input5.setAttribute('value',distance);
          td5.appendChild(input5);
          /********create's distance********/


          tr.appendChild(td);
          tr.appendChild(td2);
          tr.appendChild(td3);
          tr.appendChild(td4);
          tr.appendChild(td5);
          TabList.appendChild(tr);




          GlobalCounter++;
          }




       
        
        
      }

     

     