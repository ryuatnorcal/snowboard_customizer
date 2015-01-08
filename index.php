<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!--    <script src="jquery-1.9.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="jquery-ui.js"></script>-->

    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<!-- color picker plugin -->
    <script src="js/colpick.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/colpick.css" type="text/css"/>

    <style type='text/css'>
/*font-family: 'Alegreya Sans', sans-serif;*/
@import url(http://fonts.googleapis.com/css?family=Alegreya+Sans);
/*font-family: 'Exo 2', sans-serif;*/
@import url(http://fonts.googleapis.com/css?family=Exo+2);
/*font-family: 'The Girl Next Door', cursive;*/
@import url(http://fonts.googleapis.com/css?family=The+Girl+Next+Door);
/*font-family: 'Sigmar One', cursive;*/
@import url(http://fonts.googleapis.com/css?family=Sigmar+One);
/*font-family: 'Mr Bedfort', cursive;*/
@import url(http://fonts.googleapis.com/css?family=Mr+Bedfort);
/*font-family: 'Almendra Display', cursive;*/
@import url(http://fonts.googleapis.com/css?family=Almendra+Display);
	#wrapper{
		width: 750px;
		float:center;
		margin-left:auto;
		margin-right:auto;
	}
        .board{
                width: 500px;
                height: 100px;
              /*  border: solid 1px #000000; */
                background:#000000;
                float: center;
                margin-left:auto;
                margin-right:auto;
		
        }

.board:before{
   /* border-bottom:solid 1px #000000;*/
    background-color: white;
    border-bottom-left-radius: 33%;
    border-bottom-right-radius:33%;
    content: "";
    display: block;
    width: 410px;
    position: relative;
    top: -43px;
    left: 45px;
    height: 50px;
}
.board:after{
   /* border-top:solid 1px #000000;*/
    background-color: white;
    border-top-left-radius: 33%;
    border-top-right-radius:33%;
    content: "";
    display: block;
    width: 410px;
    position: relative;
    bottom: -43px;
    left: 45px;
    height: 50px;
    
}
        .rounded{
            border-radius:50px;
            /*border-top-right-radius: 25%;
            border-top-left-radius: 25%;
            border-bottom-right-radius: 25%;
            border-bottom-left-radius:25%;*/
            
        }
    .palet_wrapper{
        height:105px;
        float:left;
    }
	.palet{
		height: 105px;
        width:5px;
		float:left;
		margin-left:auto;
		margin-right:auto;
       /* margin-botto:10px;*/
	}
	.mini-cube{
		width:5px;
		height:5px;
		float:right;
		boarder: solid 1px #000000;
	}

        </style>
</head>
<body>
<div id='wrapper' class='ui-wedget-content'>
    <h1>Snowboarding Customizer </h1>
    <div id="graphic_wrapper">
	<h4>Front Side</h4>
        <div id='front' class="board rounded main color-box"></div>
       
    <h4>Back Side </h4>
        <div id='back' class="board rounded color-box"></div>

	
    </div><!-- end of graphic wrapper -->
    <div id="menu_wrapper">
        <div id="img_wrapper">
            <h4>Upload Photo</h4>
        </div>
        <div id="text_wrapper">
            <h4>Add Text</h4>
                <div class="addtext" id='front'>Add text to front</div>
                <div id="textbox_wrapper_front" class="front"></div>
                <div class="addtext" id='back'>Add text to back </div>
                <div id="textbox_wrapper_back" class="back"></div>
        </div>
    
    </div>
<script>
$(function(){
  $('.addtext').click(function(){
                      // find out the side you add the text to
                      var side = $(this).attr('id');
                      // find a id number here
                      var inputid = $('.textarea').last().attr('id');
                      var id;
                      if(!inputid){   id = 0;}
                      else{ id = parseInt(inputid,10) + 1;  }
                      var input_id ="input-"+id;
                      var text_id = "div#text-"+id;
                      var input ="<div id='"+ id +"' class='textarea'><input id='input-"+id+"' type='text_area' /><div id='text-"+id+"'></div></div>";
                      if(side == "front"){  $('div#textbox_wrapper_front').append( input ); }
                      else {                $('div#textbox_wrapper_back').append( input );  }
                      


                      /* [Fixme] need to identify multiple texts */
                      $( input ).keyup(function() {
                                         var value = $( this ).val();
                                         $( text_id ).text( value ).addClass("draggable resizable ui-wedget-content").draggable();
                                         }).keyup();
                      });
  $('div.front').click(function() {
                        var flont_color = '#' + $(this).attr('id');
                        $('div#front').css('background',flont_color);
                           });
  $('div.back').click(function(){
                      var back_color = '#' + $(this).attr('id');
                      $('div#back').css('background',back_color);
                      });
 
  $('div#picker').colpick({
                       flat:true,
                       layout:'hex',
                       submit:0
                       });
  
  $('div.color-box').colpick({
                          colorScheme:'dark',
                          layout:'rgbhex',
                          color:'ff8800',
                          onSubmit:function(hsb,hex,rgb,el) {
                          $(el).css('background-color', '#'+hex);
                          $(el).colpickHide();
                          }
                          })
  .css('background-color', '#000000');

  // $("div.draggable").draggable();
   $("div.resizable").resizable();
});
</script>
</div>
</body>
</html>

