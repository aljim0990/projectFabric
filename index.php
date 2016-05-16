<html xmlns="http://www.w3.org/1999/xhtml">
        <head>

            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
<style >
   
    canvas {
        border: 1px solid #ccc;
      
    }
    .container{

        max-width:1300px;
    }
    table {
  table-layout: fixed;
}

table tr td input {
    width: 100%;
}
</style>
<style id="fonts">

</style>


        </head>

        <body>
        <div class="container">
                <div class="col-md-5">

                  <div class="canvasContainer">
                      <canvas id="canvas" width="400" height="400" style="border:1px solid red"/>

                      </canvas>
                  </div>
                    
                </div>
                <div class="col-md-7">
                    <div class="tableCont">
                        <form>
                          <fieldset class="form-group">
                            <label for="formGroupExampleInput">Font : </label>
                            <select class="selectFont">
                            </select>
                          </fieldset>
                          <fieldset class="form-group">
                            <label for="formGroupExampleInput">Name : </label>
                             <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                          </fieldset>
                          <fieldset class="form-group">
                            <label for="formGroupExampleInput">Code : </label>
                             <input type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                          </fieldset>


                          <table class="layoutTable table table-bordered">
                            <th>Name</th><th>Color</th><th>Layer</th><th>Z - Index</th><th>x</th><th>y</th><th>Stroke</th>
                            <tr>
                                <td>Base Color</td>
                                <td>
                                    <select class="selectColor" data-name_color="base">
                                            <option value="black">black</option>
                                           <option value="green">green</option>
                                           <option value="red">red</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" value="1">
                                </td>
                                <td>
                                    <input type="number">
                                </td>
                                <td>
                                    <input type="text">
                                </td>
                                <td>
                                   <input type="text">
                                </td>
                                 <td>
                                   <input type="text" disabled="diabled">
                                </td>
                            </tr>
                            <tr>
                                <td>Mask</td>
                                <td>
                                    <select class="selectColor" data-name_color="mask">
                                            <option value="black">black</option>
                                           <option value="green">green</option>
                                           <option value="red">red</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" value="1">
                                </td>
                                <td>
                                    <input type="number">
                                </td>
                                <td>
                                    <input type="text">
                                </td>
                                <td>
                                   <input type="text">
                                </td>
                                 <td>
                                   <input type="text" disabled="diabled">
                                </td>

                          </table>

                        </form>
                        <button class="addShadow">Add Shadow</button><button  class="addOutline">Add Outline</button>
                        <button  class="JS">Console Js</button>
                    </div>            
                </div>

            </div>
        </body>

</html> 
 <script type="text/javascript" src="fabric.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.js"></script>

<script type="text/javascript">
$( document ).ready(function() {

    var numLayer=1;
    var shadow="";
    var objectX;
    var objectY;
    var shadowNum="";
    var outlineNum="";
    var canvas = new fabric.Canvas('canvas');                
    var num = new fabric.Text("O",{
        name : "Base Color",
        left:120,
        top: 110,
        fontSize: 200,
        fill : "black",  
        id : "Layer1",
    });

   
    canvas.add(num);
    num.set('selectable', false); 
    function setColor(t,num){

        if($(t).data("name_color")=="base"){
            num.fill=$(t).val();    
        }else if($(t).data("name_color")=="mask"){
          console.log($(t).val());
        }else if($(t).data("name_color")=="shadow"){
            canvas.forEachObject(function(key,obj){      
            //console.log(key.id);
                if($(t).data("layer-number") == canvas.item(obj).id){
                    canvas.item(obj).fill= $(t).val();
                    // canvas.item(obj).stroke= $(t).val();
                    // console.log(canvas.item(obj).id);
                    // console.log(canvas.item(obj).color+"eto");
                }
            // key.color = $(".selectColor").val();
          
            });
        }else if($(t).data("name_color")=="outline"){
            canvas.forEachObject(function(key,obj){      
            //console.log(key.id);
                if($(t).data("layer-number") == canvas.item(obj).id){
                  
                    canvas.item(obj).fill= $(t).val();
                    canvas.item(obj).stroke= $(t).val();
                    // console.log(canvas.item(obj).id);
                    // console.log(canvas.item(obj).color+"eto");
                }
            // key.color = $(".selectColor").val();
          
            });


        }


    }

     function setStroke(t,num){
            canvas.forEachObject(function(key,obj){      
            //console.log(key.id);
                if($(t).data("layer-number") == canvas.item(obj).id){
                    canvas.item(obj).strokeWidth = $(t).val();
                    canvas.item(obj).stroke =$("."+canvas.item(obj).id+" td:nth-child(2) ").find("select").val();
                    // console.log(canvas.item(obj).id);
                    // console.log(canvas.item(obj).color+"eto");
                }
            // key.color = $(".selectColor").val();
          
            });
    }
    recountZindex();

    function recountZindex(){

        ctr = 0-$(".layoutTable tbody tr").length+1;
        $(".layoutTable tbody tr").not(':first-child').each(function(){
             
            $(this).children('td:nth-child(4)').find("input").val(ctr);
            // console.log( $(this).children('td:nth-child(4) ').html());

           ctr++; 
        });

        $(".layoutTable tbody tr td:nth-child(3) input").attr("disabled","disabled");
        $(".layoutTable tbody tr td:nth-child(4) input").attr("disabled","disabled");

       

    }
    function setXandY(){

        canvas.forEachObject(function(key,obj){    
        objectX = (canvas.item(obj).left - num.left)/canvas.item(obj).width;
    
        objectY = (canvas.item(obj).top - num.top)/canvas.item(obj).top;  
            console.log(canvas.item(obj).id);
        $("."+canvas.item(obj).id+" td:nth-child(5)").find("input").val(objectX);
        $("."+canvas.item(obj).id+" td:nth-child(6)").find("input").val(objectY);
        console.log($("."+canvas.item(obj).id+" td:nth-child(5)").find("input").val());
                

        });
    };
    $(document).on('change', '.selectColor', function(){
    // $(".selectColor").change(function(){ 
        setColor(this,num);
     
        

    });
    $(document).on('change', '.strokeNumber', function(){
    // $(".selectColor").change(function(){ 
        setStroke(this,num);
    

        

    });
    $(document).on('mouseup', '.canvasContainer', function(){
    // $(".selectColor").change(function(){ 
        setXandY();

        

    });
    $(document).on('click', '.JS', function(){
        var layers;
        var totalLayers=[];
    // $(".selectColor").change(function(){ 
      console.log("js");
      ctr = 0-$(".layoutTable tbody tr").length+1;
        canvas.forEachObject(function(key,obj){    
                console.log(canvas.item(obj).name);
                    
                    
                layers = {
                        "name" :  canvas.item(obj).name,
                        "dafault_color ": canvas.item(obj).fill,
                        "layer_no" : canvas.item(obj).id,
                        "increment_x" : canvas.item(obj).left,
                        "increment_y" : canvas.item(obj).top,
                        "outline ": canvas.item(obj).strokeWidth,
                        "zIndex" : ctr,


                        },
                        totalLayers.push(layers);

                
                 
                  //   layers = layers + "{ name : "+canvas.item(obj).name+","+
                  // "dafault_color : "+canvas.item(obj).fill+","+
                  // "layer_no : "+canvas.item(obj).id+"","+
                  // "increment_x : "+canvas.item(obj).left+","+
                  // "increment_y : "+canvas.item(obj).top+","+
                  // "outline : "+canvas.item(obj).strokeWidth+","+
                  // "zIndex : "+ctr+","+
                  // "},"




            // console.log(canvas.item(obj).name);
            // console.log(canvas.item(obj).fill);
            // console.log(canvas.item(obj).id);
            // console.log(canvas.item(obj).left);
            // console.log(canvas.item(obj).top);
            // console.log(canvas.item(obj).strokeWidth);
            // console.log(ctr);
            ctr++;
        });
        layers = [layers];
           accent = {items: [
                        {   // Default
                            id: 0,
                            name: 'Default',
                            code: 'default',
                            thumbnail: 'no-accent.png',
                            layers: totalLayers, 
                    }]};
                     console.log(JSON.stringify(accent));
        

    });
    

    $(".addShadow").click(function(){
        numLayer++;
        shadow = new fabric.Text("O",{
                name : "Shadow " + shadowNum,
                color: 'rgba(0,0,0,0.6)',
                left : 30,
                top : 30,                                  
                fontSize: 200,
                // strokeWidth : 12,
                // stroke :'black',
                id : "layer"+numLayer,
                
            });
        shadowNum++;


        canvas.add(shadow);
        canvas.sendToBack(shadow);

        setXandY();

        $(".layoutTable tbody tr:last ").before(""+
                                "<tr class='layer"+ numLayer +"'>"+
                                "<td>Shadow</td>"+
                                "<td>"+
                                    "<select class='selectColor' data-name_color='shadow' data-layer-number='layer"+ numLayer +"'>"+
                                            "<option value='black'>black</option>"+
                                           "<option value='green'>green</option>"+
                                           "<option value='red'>red</option>"+
                                    "</select>"+
                                "</td>"+
                                "<td>"+
                                    "<input type='number' value='"+ numLayer +"'>"+
                                "</td>"+
                                "<td>"+
                                    "<input type='number'>"+
                                "</td>"+
                                "<td>"+
                                    "<input type='text' value='"+objectY+"'>"+
                                "</td>"+
                                "<td>"+
                                   "<input type='text' value='"+objectX +"'>"+
                                "</td>"+
                                 "<td>"+
                                   "<input type='text' disabled='diabled'>"+
                                "</td>"+
                                "");

        recountZindex();
         
//             canvas.forEachObject(function(key,obj){

// });


    });

 
     $(".addOutline").click(function(){
         setXandY();
         numLayer++;
        $(".layoutTable tbody tr:last ").before(""+
                                "<tr  class='layer"+ numLayer +"'>"+
                                "<td>Outline</td>"+
                                "<td>"+
                                    "<select class='selectColor' data-name_color='outline' data-layer-number='layer"+ numLayer +"'>"+
                                            "<option value='black'>black</option>"+
                                           "<option value='green'>green</option>"+
                                           "<option value='red'>red</option>"+
                                    "</select>"+
                                "</td>"+
                                "<td>"+
                                    "<input type='number' value='"+ numLayer +"'>"+
                                "</td>"+
                                "<td>"+
                                    "<input type='number'>"+
                                "</td>"+
                                "<td>"+
                                        "<input type='text' value='"+objectY+"'>"+
                                "</td>"+
                                "<td>"+
                                   "<input type='text' value='"+objectX +"'>"+
                                "</td>"+
                                 "<td>"+
                                   "<input type='number' class='strokeNumber' value='0' data-layer-number='layer"+ numLayer +"'>"+
                                "</td>"+
                                "");

        recountZindex();  
           shadow = new fabric.Text("O",{
                    name: "Outline " + outlineNum,
                    color: 'rgba(0,0,0,0.6)',
                    left : 30,
                    top : 30,                                  
                    fontSize: 200,
                    // strokeWidth : 12,
                    // stroke :'black',
                    id : "layer"+numLayer,
                    
                });
        outlineNum++;

        canvas.add(shadow);
        canvas.sendToBack(shadow);
           });



    //put fonts
    $.getJSON("http://api-dev.qstrike.com/api/fonts", function(result){
        var data = {
          fonts: result.fonts
          , index: function() {
              return ++window['INDEX']||(window['INDEX']=0);
          }
        }
        tableTemplate = "{{#fonts}}<option value='{{name}}'>{{name}}</option>{{/fonts}}";
        var html = Mustache.to_html(tableTemplate, data);
        $(".selectFont").append(html);
         $.each(data.fonts, function(i, item) {
           
        $("#fonts").append("@font-face {"+
            "font-family : '"+ item.name +"';"+
            "src : url("+ item.font_path +");"+
            "}");

        })

       


    });



// $("#fonts").text("label {"+
//     "color: red;"+
//     "}");


setInterval(function () {
            num.fontFamily=$(".selectFont").val();    
            shadow.fontFamily=$(".selectFont").val();    
             canvas.renderAll();
            console.log("render");
         }, 1);
    
   
});

            
  </script>
