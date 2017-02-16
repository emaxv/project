<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    <meta charset="utf-8">
<script type="text/javascript">
/*
Основная функция для получения данных из формы и генерирования в pdf файл
*/
function getName(){    
    var today = new Date().toLocaleDateString();
    var mas2 = [];
    var gr = document.getElementsByName('member[]');
    for (var i=0;i<gr.length;i++){
        if (gr[i].checked){
            mas2.push(gr[i].value+','+'\t');
            
        }
    }
id = document.forms["reg"].elements["id"].value;
    var docDefinition = { content: [
        {text: 'Протокол №'+id, style: 'mid'},
        {text: today,style:'mid' },
        {text: '\n', style:'a14'},
        {text: 'Присутствовали: ', style: 'b18'},
        {text: mas2, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Повестка дня: ', style: 'b18'},
        {text: povestkamas, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Выступили: \n', style: 'b18'},
        {text: speechmas, style:'a14'},
        {text: 'Решения кафедры: ', style: 'b18'},
        {text: solutionsmas, style:'a14'},
        {text: '\n', style:'a14'},
        {columns: [
        {
        text:'Зав. Кафедрой\n\nСекретарь '
        },
        {
        text:'Е.З. Власова\n\nИ.Б. Государев', style:'righ'
        }
    ]}
        
    ],
       
         styles: {
             righ:{
                 alignment:'right'
             },
     mid: {
       fontSize: 18,
       bold: true,
         alignment:'center'
     },
    b18:{
        fontsize: 18,
        bold: true
    },
        a14:{
        fontsize: 14
    } }                
                        };
pdfMake.createPdf(docDefinition).download(''+today+'.pdf');
}
/*
Добавление информации о повестке дня
*/
        var j=1;
        var povestkamas = [];
function add() {
    $("#aim").append("<input type='text' name='aims[]' id='n"+j+"' value="+document.reg.step.value+">");
    povestkamas.push(j+'.'+document.reg.step.value+'\n');
    $("#step").val("");
 j++;
}
/*
Добавление информации о решениях кафедры
*/
    var k=1;
        var solutionsmas = [];
function soladd() {
    $("#sol").append("<input type='text' name='solutions[]' id='m"+k+"' value="+document.reg.step2.value+">");
    solutionsmas.push(k+'.'+document.reg.step2.value+'\n');
    $("#step2").val("");
 k++;
}
/*
Добавление информации о выступающих
*/
    var speechmas =[];
    var z=1;
function addspeech() {
    $("#speech").append("<input type='text' name='speach[]' id='z"+z+"' value="+ document.reg.ste1.value+"."+document.reg.ste2.value +">");
    speechmas.push('Вопрос №'+z+'\n'+document.reg.ste1.value+"."+document.reg.ste2.value+'\n\n');
    $("#ste1").val("");
    $("#ste2").val("");
 z++;
}
members=['зав. каф. Власова Е.З.', 'проф. Абрамян Г.В.', 'доц. Гончарова С.В.', 'доц. Государев И.Б.', 'проф. Готская И.Б.', 'доц. Карпова Н.А.', 'доц.  Авксентьева Е.Ю.', 'доц. Полякова Н.А.', 'доц. Ханин Д.С.', 'доц. Кужельная О.В.', 'ст. преп. Ильина Т.С.', 'асс. Аксютин П.А.', 'асс. Жуков Н.Н.']
$(function(){
    for(var l=0;l<members.length;l++){
    $("#mem").append("<input type='checkbox' checked name='member[]' value='"+members[l]+"' />"+members[l]+"")
    }
})
</script>
</head>
<body>
<form  id="reg" name="reg" action="dataBase.php" method="post">
Введите номер протокола <input text="text" id="id" name="id" />
 <br>Список присутствующих:<br>
 <div id="mem"></div>
    <br>Повестка дня:<br><div id="aim"></div>
            <input value="Добавить" type="button" size="200" href="#mini-modal-window1" data-toggle="modal">
  <div id="mini-modal-window1" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
 <div class="modal-body">
  <input type="text" id="step" placeholder="Введите тему обсуждения">
 </div>
 <div class="modal-footer">
   <button type="button" id="close" data-dismiss="modal" onClick="add()" >Добавить</button>
 </div>
    </div>
   </div>
</div>
    </br>Выступили:</br>
        <div id="speech"></div>
          <input value="Добавить выступающего" type="button" size="200" href="#mini-modal-window2" data-toggle="modal">
  <div id="mini-modal-window2" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
 <div class="modal-body">
    <input type="text" id="ste1" placeholder="Введите имя">
    <input type="text" id="ste2" placeholder="Введите предложение">
 </div>
 <div class="modal-footer">
   <button type="button" id="close" data-dismiss="modal" onClick="addspeech()" >Добавить</button>
 </div>
    </div>
   </div>
</div>
     <br>Решения кафедры<br><div id="sol"></div>
            <input value="Добавить решение" type="button" size="200" href="#mini-modal-window3" data-toggle="modal">
  <div id="mini-modal-window3" class="modal fade">
   <div class="modal-dialog">
    <div class="modal-content">
 <div class="modal-body">
  <input type="text" id="step2" placeholder="Введите решение">
 </div>
 <div class="modal-footer">
   <button type="button" id="close2" data-dismiss="modal" onClick="soladd()" >Добавить</button>
 </div>
    </div>
   </div>
</div>

<br><input type="submit" value="Отправить" onClick="getName();" />
</form>
</body>
</html>