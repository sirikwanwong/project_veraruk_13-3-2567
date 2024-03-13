function generatekey(){
    console.log(
        Math.floor(Math.random()*10)+" "+
        Math.floor(Math.random()*10)+" "+
        Math.floor(Math.random()*10)+" "+
        Math.floor(Math.random()*10)
    );
    const expireInterval = detInterval(function(){},1000);
}
generatekey();