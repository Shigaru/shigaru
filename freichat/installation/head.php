<html>
    <head>
        <title>FreiChatX</title>
        <link rel="stylesheet" href="style.css" />
        <script>var X_load_jn = "i am defined";</script>
        <script src="../client/jquery/js/jquery.1.6.js"></script>
        <script src="../client/jquery/js/jquery-ui.js"></script>



        <style type="text/css">

            /*Make sure your page contains a valid doctype at the top*/
            #simplegallery1{ //CSS for Simple Gallery Example 1
                             position: relative; /*keep this intact*/
                             visibility: hidden; /*keep this intact*/
                             border: 5px solid black;
            }

            #simplegallery1 .gallerydesctext{ //CSS for description DIV of Example 1 (if defined)
                                              text-align: left;
                                              padding: 2px 5px;
            }

        </style>

        <script type="text/javascript" src="simplegallery.js">

            /***********************************************
             * Simple Controls Gallery- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
             * This notice MUST stay intact for legal use
             * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
             ***********************************************/

        </script>

        <script type="text/javascript">

            var mygallery=new simpleGallery({
                wrapperid: "simplegallery1", //ID of main gallery container,
                dimensions: [700,150], //width/height of gallery in pixels. Should reflect dimensions of the images exactly
                imagearray: [
                    ["images/b1.png", "http://evnix.com", "_new", "Customize to your heart's content"],
                    ["images/b2.png", "http://evnix.com", "_new", "Feel the power of X"],
                    ["images/b3.png", "http://evnix.com", "_new", "Make it work in your environment!"],
                    ["images/b4.png", "", "", ""]
                ],
                autoplay: [true, 2500, 2000], //[auto_play_boolean, delay_btw_slide_millisec, cycles_before_stopping_int]
                persist: false, //remember last viewed slide and recall within same session?
                fadeduration: 500, //transition duration (milliseconds)
                oninit:function(){ //event that fires when gallery has initialized/ ready to run
                    //Keyword "this": references current gallery instance (ie: try this.navigate("play/pause"))
                },
                onslide:function(curslide, i){ //event that fires after each slide is shown
                    //Keyword "this": references current gallery instance
                    //curslide: returns DOM reference to current slide's DIV (ie: try alert(curslide.innerHTML)
                    //i: integer reflecting current image within collection being shown (0=1st image, 1=2nd etc)
                }
            })

        </script>
    </head>
    <body>
        <div class="content">
            <table width="100%" height="100%">




                <tr>
                    <td valign=top class="menux" width="20%">
                        <img src="images/logoj.png" height=100 width=100/>
                        <p>
                        <ol>
