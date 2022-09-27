function ido(element)
{
    let currentDate=new Date();
    let time = currentDate.getHours()+":"+currentDate.getMinutes()+":"+currentDate.getSeconds()+":"+currentDate.getMilliseconds();
    
    element.value = time;
    // if(document.getElementById("yes1").checked)
    // {
    //     document.getElementById("yes1").value=time;

    // }
    
    // if(document.getElementById("no1").checked)
    // {
    //    document.getElementById("no1").value=time;

    // }
    
    // if(document.getElementById("idk1").checked)
    // {
    //     document.getElementById("idk1").value=time;
    // }
    
   
    console.log(time)



}
