/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

window.onload = () => {
      // Gestion des boutons "Supprimer"
      let links = document.querySelectorAll("[data-delete]")
      
      // On boucle sur links
      for(link of links){
          // On écoute le clic
          link.addEventListener("click", function(e){
              // On empêche la navigation
              e.preventDefault()
  
              // On demande confirmation
              if(confirm("Voulez-vous supprimer cette image ?")){
                  // On envoie une requête Ajax vers le href du lien avec la méthode DELETE
                  fetch(this.getAttribute("href"), {
                      method: "DELETE",
                      headers: {
                          "X-Requested-With": "XMLHttpRequest",
                          "Content-Type": "application/json"
                      },
                      body: JSON.stringify({"_token": this.dataset.token})
                  }).then(
                      // On récupère la réponse en JSON
                      response => response.json()
                  ).then(data => {
                      if(data.success)
                          this.parentElement.remove()
                      else
                          alert(data.error)
                  }).catch(e => alert(e))
              }
          })
      }
  }
