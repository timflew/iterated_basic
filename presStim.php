<?php
// 3.7.2016-Created-Present text and then query

include('config.php');

// Get data
$_SESSION['article']=$news_data['article']; # actual text
$_SESSION['qs']=$qs; # things to insert into text

$article=sprintf($_SESSION['article'],$_SESSION['qs'][0],$_SESSION['qs'][1],$_SESSION['qs'][2]);

?>

<html>
    
    <link rel="stylesheet" type="text/css" href="ltmClus1.css" />
    
    <script src="js/jquery.js"></script>
    <script src="js/vismem2.js"></script>
    
    <div align="center">
        <canvas id="myCanvas"  width="<?php echo $canvasSize?>" height="<?php echo $canvasSize?>" style="cursor:default;border:solid;outline-width:2px;outline-color:#000000">
        </canvas>
        <p id="instr"></p>
    </div>
    <p id="debug"></p>
    <form id="record" action="pause.php" name="nextpage" method="post">
        <input type="hidden" id="targ" name="targ" value='0'>
        <input type="hidden" id="resp" name="resp" value='0'>
        <input type="hidden" id="targAng" name="targAng" value='<?php echo json_encode($currAng);?>'>
        <input type="hidden" id="respAng" name="respAng" value='0'>
        <input type="hidden" id="rt" name="rt" value='0'>
    </form>
    
    <script>
        
        // Settings
        var task='allTrain';
        var c1=document.getElementById("myCanvas");
        var ctx1=c1.getContext("2d");    
        var centerX=c1.width/2;
        var centerY=c1.height/2;   
        var width=c1.width;
        var height=c1.height;
        var objSize=<?php echo $objSize ?>;
        var objDist=<?php echo $objDist ?>; 
        var wheelRad=objSize+objDist+30;
        var nubX=null;
        var nubY=null;
        var numDots=<?php echo $numDots ?>;
        var colRot=<?php echo $currColRot ?>;
        var circRot=<?php echo $currCircRot ?>;
        var color=<?php echo json_encode($currColor) ?>;
        var order=<?php echo json_encode($order) ?>;
        var rt=[];
        var moveLast=0;
        
        var initTime=<?php echo $initTime ?>;
        var presTime=<?php echo $presTime ?>;
        var delayTime=<?php echo $delayTime ?>;
        
        var isTest=false;
        var currProbe=-1;
        
        // Object positions
        
        // Define positions before rotation
        xTemp=[];
        yTemp=[];
        
        for(i=0;i<numDots;i++){
            xTemp.push(objDist*Math.cos((2*Math.PI/numDots)*i));
            yTemp.push(objDist*Math.sin((2*Math.PI/numDots)*i))
        }
        
        // Rotate positions
        xPos=[];
        yPos=[];
        
        for(i=0;i<numDots;i++){
            xPos.push(centerX+(Math.cos(colRot)*xTemp[i])-(Math.sin(colRot)*yTemp[i]));
            yPos.push(centerY+(Math.sin(colRot)*xTemp[i])+(Math.cos(colRot)*yTemp[i]))
        }
        
        function makeCircles(currColor){
            // Draw circles
            for(i=0;i<numDots;i++){
                makeCircle('dot'+i,xPos[i],yPos[i],objSize+2,false,0,'#000000','#000000');
                makeCircle('dotIn'+i,xPos[i],yPos[i],objSize,false,0,currColor[i],currColor[i]);
            }
        }
        
        function makeCrosshair(){
            // Draw rectangles
            for(i=0;i<numDots;i++){
                makeRectangle('cross1',centerX,centerX,2,10,false,'#000000','#000000');
                makeRectangle('cross2',centerX,centerY,10,2,false,'#000000','#000000');
            }
        }
        
        function makeColorWheel(){
            // Draw color wheel
            if(centerX!=null){
                makeCircle('colorWheelOut',centerX,centerY,wheelRad+4,false,0,'#A8A8A8','#A8A8A8');
                makeCircle('colorWheelIn',centerX,centerY,wheelRad,false,0,'#FFFFFF','#FFFFFF');
            }
        }
        
        function makeColorNub(){
            // Draw nub on color wheel using 

            makeCircle('colorWheelNub',centerX+nubX,centerY+nubY,10,false,0,'#000000','#000000');
            
        }
        
        function makeCue(){
            makeTriangle('cue',-500,-500,20,20);
        }
        
        function moveCue(id){
            targObj='dotIn'+id;
            for(i=0;i<objects.length;i++){
                if(objects[i].id==targObj){
                    cueX=objects[i].x;
                    cueY=objects[i].y-(objSize+15);
                }
            }
            for(i=0;i<objects.length;i++){
                if(objects[i].id=='cue'){
                    objects[i].x=cueX;
                    objects[i].y=cueY;
                }
            }
        }
        
        var st=null;
        function startTime(){
            var d = new Date();
            st=d.getTime();
        }

        function endTime(){
            
            var d = new Date();
            timeDif=d.getTime()-st;
            return timeDif;
        }
        
        // Initial
        makeCrosshair();
        drawObjects(ctx1,objects);
        
        setTimeout(function(){
            // Draw stimuli
            erase(ctx1);
            clear();
            makeCrosshair();
            makeCircles(color);
            drawObjects(ctx1,objects);
        },initTime);
        
        
        // Remove stimuli
        setTimeout(function(){
            erase(ctx1);
            clear();
            makeCrosshair();
            drawObjects(ctx1,objects);
        },initTime+presTime);
        
        // Cue
        var selColor=['#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF','#FFFFFF'];
        var selAng=[null,null,null,null,null,null];
        setTimeout(function(){
            erase(ctx1);
            clear();
            
            currProbe=0;
            makeColorWheel();
            makeCrosshair();
            makeCircles(selColor);
            makeCue();
            moveCue(order[currProbe]);
            drawObjects(ctx1,objects);
            isTest=true;
            startTime();
            
        },initTime+presTime+delayTime);
        
    </script>
    
    
    
</html>
