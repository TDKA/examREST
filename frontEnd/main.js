const restaurants = document.querySelector('.restaurants');
const allPlats = document.querySelector('.plats');
const divCreatePlat = document.querySelector('.formCreate');


/**
 * 
 * Show all restaurants
 * 
 */
function showAll() {
    
    const xhr = new XMLHttpRequest();
  
    xhr.open('GET', `http://localhost/frameworkObject/index.php?controller=restaurant&task=indexApi`, true);


    xhr.onload = function() {
  
        if(this.status === 200) {

            console.log(this.status);

            const data = JSON.parse(this.responseText);
            
         
            cardsResto(data);

        }
    }

    xhr.send();

}


/**
 * 
 * Cards for restaurants
 * 
 */
function cardsResto(arrayResto) {

    let cardsResto = '';

    arrayResto.forEach(resto => {
        card = `<div class="col-md-4 p-3">
                    <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Restaurant: ${resto.name} </h5>
                                <p class="card-text">Addresse:${resto.addresse} </p>
                                
                                <button value="${resto.id}" class="showResto btn  btn-success">Voir la carte</button>

                            </div>
                    </div>
                </div> `

                //

            cardsResto += card;
            restaurants.innerHTML = cardsResto;

             allPlats.innerHTML = "";

        
    });

    //Show one resto with all the plate for it 
     document.querySelectorAll('.showResto').forEach(btn => {

        btn.addEventListener('click', event => {

            showOneResto(btn.value);

        });

    })

}


//Call function showAll() (RESTAURANTS)
showAll();


/**
 * 
 * SHOW ONE resto with all plats "
 */
function showOneResto(restoId) {
     const xhr = new XMLHttpRequest();
  
    xhr.open('GET', `http://localhost/frameworkObject/index.php?controller=restaurant&task=showApi&id=${restoId}`, true);
 
    xhr.onload = function() {
  
        if(this.status === 200) {

            console.log(this.status);

            const data = JSON.parse(this.responseText);
            console.log(data);
         
            let restaurant = data.restaurant; 
            let plats = data.plats;


            console.log(plats)


             cardRestoOrPlat(restaurant, plats);
        }
    }

    xhr.send();
}


/**
 * 
 * card for ONE restaurant & for all plats in THIS restaurant
 * 
 */
function cardRestoOrPlat(restaurant, plats) {

    /// Restaurant CARD
    cardResto = `<div class="col-md-4 p-3 mx-auto" data-resto="${restaurant.id}">
                    <div class="card " style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Name: ${restaurant.name} </h5>
                                <p class="card-text">Addresse: ${restaurant.addresse} </p>                            
                                <button id="btnReturn" class="btn btn-primary">Retour aux restaurants</button>

                                <button id="createPlat" class="btn btn-success">Ajouter un plat</button>
                            </div>
                    </div>
                </div> `;


    restaurants.innerHTML = cardResto;

     /////// Plats CARD
    cardsPlats = " ";
    plats.forEach(plat => {

    // console.log(plat);
    cardPlat = `<div class="col-md-4 p-3" data-plat="${plat.id}">
                  

                        <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Plat: ${plat.name} </h5>
                                    <p class="card-text">Price: ${plat.price} €</p>
                                    <p class="card-text">Description:${plat.description} </p>

                                    <button  value="${plat.id}" class="deletePlat btn btn-danger">Delete plat</button>
                                   
                                </div>
                        </div>
                    </div>`
                
                    cardsPlats += cardPlat;

                });
                
    
    allPlats.innerHTML += cardsPlats;

    //Return to all the RESTOS
    document.getElementById('btnReturn').addEventListener('click', event => {
        showAll();

    });
 
    /// DELETE PLAT Btn
    document.querySelectorAll('.deletePlat').forEach(btn => {

        btn.addEventListener('click', event => {

            deletePlat(btn.value)
        });
    });

    //Create new PLAT
    document.getElementById('createPlat').addEventListener('click', event => {
        formCreatePlat()
    })

}



/**
 * DELETE PLAT
 * 
 */
function deletePlat(platId) {

    let xhr = new XMLHttpRequest();
  
    xhr.open('POST', `http://localhost/frameworkObject/index.php?controller=plat&task=supprApi`);


    xhr.onload = function() {
  
        if(this.status === 200) {

            console.log(this.status);

            const data = JSON.parse(this.responseText);

            platDiv = document.querySelector(`div[data-plat="${platId}"]`);

            platDiv.remove();

            // console.log(data);

        }
    }

   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    params = "id="+ platId;
    xhr.send(params);
}

/**
 * 
 * Form creation new plat
 * 
 */
function formCreatePlat() {
    
    formCreate = `<form  method="POST" class="row col-md-6 mx-auto">
                    
                        <h3 class = "text-center">Ajouter un plat</h3>

                        <input type="hidden" name="restoId" value="">

                        <div class="form-group">
                            <input type="text"  class="form-control" name="name" id="" cols="30" rows="2" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="number"  class="form-control" name="price" id="" placeholder="Price">
                        </div>
                        
                        <div class="form-group mt-3">
                            <textarea  class="form-control" name="description" id="" cols="30" rows="2" placeholder="Description"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-2">Ajouter </button>
                        </div>  
                    
                </form> `

                //

           
            divCreatePlat.innerHTML = formCreate;

}

/**
 * 
 * Create new plat
 * 
 */
function insertPlat(restoID) {

    let xhr = new XMLHttpRequest();
  
    xhr.open('POST', `http://localhost/frameworkObject/index.php?controller=plat&task=createApi`);


    xhr.onload = function() {
  
        if(this.status === 200) {

            console.log(this.status);

            const data = JSON.parse(this.responseText);

                // restoDiv = document.querySelector(`div[data-resto="${restoID}"]`);
                //  restoDiv.add();

           

            // console.log(data);

        }
    }

   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   
   params = "id="+ restoID;
    xhr.send(params);
}

