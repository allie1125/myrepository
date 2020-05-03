
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <style>
        /* Set height of body and the document to 100% to enable "full page tabs" */
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#아시아 {background-color: red;}
#유럽 {background-color: green;}
#북미 {background-color: blue;}
#기타 {background-color: orange;}
    </style>
        <body>    
            <script language="javascript">
                function openPage(pageName, elmnt, color) {
                // Hide all elements with class="tabcontent" by default */
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Remove the background color of all tablinks/buttons
                tablinks = document.getElementsByClassName("tablink");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].style.backgroundColor = "";
                }

                // Show the specific tab content
                document.getElementById(pageName).style.display = "block";

                // Add the specific color to the button used to open the tab content
                elmnt.style.backgroundColor = color;
                }

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();                 

            </script>     
            <button class="tablink" onclick="openPage('Home', this, 'red')">Home</button>
            <button class="tablink" onclick="openPage('News', this, 'green')" id="defaultOpen">News</button>
            <button class="tablink" onclick="openPage('Contact', this, 'blue')">Contact</button>
            <button class="tablink" onclick="openPage('About', this, 'orange')">About</button>

            <div id="아시아" class="tabcontent">
            <h3>Home</h3>
            <p>Home is where the heart is..</p>
            </div>

            <div id="유럽" class="tabcontent">
            <h3>News</h3>
            <p>Some news this fine day!</p>
            </div>

            <div id="북미" class="tabcontent">
            <h3>Contact</h3>
            <p>Get in touch, or swing by for a cup of coffee.</p>
            </div>

            <div id="기타" class="tabcontent">
            <h3>About</h3>
            <p>Who we are and what we do.</p>
            </div> 
    </body>
</html>



