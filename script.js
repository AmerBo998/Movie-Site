



$(document).ready(function(e){

            $("#search_box").keyup(function(){

                 
  
                    $("#here").show();
                    var x=$(this).val();
                    $.ajax({

                        type:'POST',
                        url:'searchq.php',
                        data: 'q='+x,
                        success:function(data){

                            $("#here").html(data);
                            
                        },
                    });
            });
});



$(document).ready(function(e){

    $("#search_btn").mouseenter(function(){

            $("#search").show();
           
            
    });
});






$(document).ready(function(e){

    $("#menu_btn").click(function(){

           $("#nav_bar").slideToggle().css("display", "block");
           document.getElementById("search_ul").style.display="none";

          


    });
});



$(document).ready(function(e){

    $("#search_small").click(function(){

      


           $("#search_ul").slideToggle();
           document.getElementById('nav_bar').style.display="none";
          
            

           $("#here").hide();
    });
});




        
           
           
    







function pop_display_right(object){

    var picture=object.id;
    var n=parseInt(picture)+1;

        if(n>5){
            n=1;
        }

        if(n<1){
            n=5;
        }

    
    var na=n.toString();
    
    $("#"+na).css("display","inline-block");
    $("#"+picture).css("display","none");
    

}


function pop_display_left(object){

var picture=object.id;
var n=parseInt(picture)-1;

    if(n>5){
        n=1;
    }

    if(n<1){
        n=5;
    }


var na=n.toString();
$("#"+na).css("display","inline-block");
    $("#"+picture).css("display","none");

}



function views(object){
    
    var movie=object.id;

    $.ajax({
    type: "POST",
    url: 'views.php',
    data: {moviename: movie},
    success: function(e){
        var path=document.getElementById(movie).getAttribute("href");
        header("Location:"+path);
        exit();
        
    }
    
    
})};


function list(object){
    
    var season=object.id;
    
    var li=season.charAt(season.length-1);
   
    var li_h=li-1;
                
              
                $("#"+li).slideToggle(1);
                $("#"+li_h).slideUp(1);
                
      
      
             
  
   
  }



  function player_set(object){
  
    
    var ep_name=object.id;
  
          var p=document.getElementById('ep_player');
          p.style.display='block';
          p.src=ep_name;
          p.play();
          p.focus();
  
  
  }

  function episodes(){

    var x = document.getElementById("episode_num").value;
    var no=parseInt(x);
    document.getElementById('columns').innerHTML = "";

   for(i=1;i<=x;i++){


    document.getElementById('columns').innerHTML +="<input type='text' id='ep_n' value='"+i+"'><input class='eps' type='text' id='"+i+"' ><br>";
   }
    
}



function set_wall(){

    var wall=document.getElementById("show_background").value;
    wall=wall.replace("C:\\fakepath\\","");
    alert(wall);
    $("#background").val("../show_wall/"+wall);
                
    
    }
    
    function set_p(){
    
    var p=document.getElementById("show_poster").value;
    p=p.replace("C:\\fakepath\\","");
    alert(p);
    $("#poster").val("../show_poster/"+p);
                
    
    }
    
    function wl_add(object){

        var nm=object.id;
        var name=nm.slice(0,-2);
        var usr=document.getElementById('user').value;
       
    $.ajax({
        type: "POST",
        url: 'watchlist_add.php',
        data: {user: usr, moviename: name},
        success: function(data){
           
            document.getElementById(nm).style.display = "none";
        }
        
    });};



    $(document).ready(function(e){

        $("#filter").keyup(function(){
        
                
                var x=$(this).val();
                $.ajax({
        
                    type:'POST',
                    url:'find_data.php',
                    data: 'q='+x,
                    success:function(data){
                        $("#data").html("");
                        $("#data").html(data);
        
                    },
                });
        });
        });