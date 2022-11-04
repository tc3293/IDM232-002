<script src= "/public_html/final-old/dist/script/main.js"></script>


<!----------------Below here is FOOTER AND SCRIPT BUTTON FOR MOBILE -------------------->
<footer class="foot">
    <p>@2022 by Jun Chen</p>
</footer>


<!----------------------------------------------------->









    <!--MOBILE MENU CLICKING BUTTON-->
    <script>
    var sidemenu = document.getElementById("sidemenu");
    
    function openmenu(){
        sidemenu.style.right = "0";
    }
    function closemenu(){
        sidemenu.style.right = "-200px";
    }
    </script>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbzQO-4A2gQ4hSLZE_7LBmmXXEdmX0muqojwirEhf_fKPXZrliPojR05uKOVrSzAgjpYPg/exec'
        const form = document.forms['submit-to-google-sheet']
        const msg = document.getElementById("msg")
      
        form.addEventListener('submit', e => {
          e.preventDefault()
          fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {
                msg.innerHTML = "Your message has been delivered!"
                setTimeout(function(){
                    msg.innerHTML = ""
                }, 5000)
                form.reset()
            })
            .catch(error => console.error('Error!', error.message))
        })
      </script>
    <br>
    </body>
    </html>