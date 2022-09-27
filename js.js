function ido()
{
    let currentDate=new Date();
    let time = currentDate.getHours()+":"+currentDate.getMinutes()+":"+currentDate.getSeconds();
    
    if(document.getElementById("yes1").checked)
    {
        var yes = document.getElementById("yes1").value=time;

    }
    
    if(document.getElementById("no1").checked)
    {
        var no = document.getElementById("no1").value=time;

    }
    
    if(document.getElementById("idk1").checked)
    {
        var idk = document.getElementById("idk1").value=time;
    }
    
   
    



}
