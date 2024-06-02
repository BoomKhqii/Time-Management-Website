function monthNow() 
{
    var d = new Date();
    var year = d.getFullYear();
    var monthIndex = d.getMonth() + 1;
    var day = d.getDate();
         
    const monthArray = ["N/A","January", "Febuary", "March","April", "May", "June","July", "August", "September","October","November", "December"];
         
    var month = monthArray[monthIndex];
         
    document.getElementById("date").innerHTML = month + " " + day + ", " + year;
}

 window.onload = function() //Name
 {
    // Grabs the value from localStorage
    var value = localStorage.getItem('usernameInputted');
                 
    // Display by using id="**"
    var name = document.getElementById('name');
    name.innerText = value;

    monthNow();
};