<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/pdfmake.min.js"></script>
    <script src="js/vfs_fonts.js"></script>
    
<script type="text/javascript">
function getName(){
    var today = new Date().toLocaleDateString();
    var mas = ['зав. каф. Власова Е.З.', 'проф. Фокин Р.Р.',  'проф. Абрамян Г.В.', 'доц. Гончарова С.В.', 'доц. Государев И.Б.', 'доц. Карпова Н.А.', 'доц.  Авксентьева Е.Ю.', 'доц. Авксентьев С.Ю.', 'доц. Полякова Н.А.', 'доц. Ханин Д.С.', 'доц. Тарасова Т.Е.', 'ст. преп. Ильина Т.С.', 'асс. Золотов Д.В.', 'асс. Аксютин П.А.', 'асс. Жуков Н.Н.'];
    var mas2 = [];
    var gr = document.getElementsByName('member');
    for (var i=0;i<gr.length;i++){
        if (gr[i].checked){mas2.push(gr[i].value+','+'\t')}
    }
    
    console.log(mas2);
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
        console.log(povestkamas);
    console.log(solutionsmas);
pdfMake.createPdf(docDefinition).open();
};
        var j=1;
        var povestkamas = [];
function add() {
    $("#aim").append("<input type='text' id='n"+j+"' value="+document.reg.step.value+">");
    povestkamas.push(j+'.'+document.reg.step.value+'\n');
 j++
};
    var k=1;
        var solutionsmas = [];
function soladd() {
    $("#sol").append("<input type='text' id='m"+k+"' value="+document.reg.step2.value+">");
    solutionsmas.push(k+'.'+document.reg.step2.value+'\n');
 k++
};
    var speechmas =[];
    var z=1;
function addspeech() {
    $("#speech").append("<input type='text' id='z"+z+"' value="+ document.reg.ste1.value+"."+document.reg.ste2.value +">");
    speechmas.push('Вопрос №'+z+'\n'+document.reg.ste1.value+"."+document.reg.ste2.value+'\n\n');
 z++;
}
</script>
</head>
<body>
<form id="reg" name="reg" >
Введите номер протокола <input text="text" id="id" name="id" />
 <br>Список присутствующих:<br>    
 <input type="checkbox" checked name="member" value="зав. каф. Власова Е.З." />зав. каф. Власова Е.З.
 <input type="checkbox" checked name="member" value="проф. Фокин Р.Р." />проф. Фокин Р.Р.
 <input type="checkbox" checked name="member" value="проф. Абрамян Г.В." />проф. Абрамян Г.В.
 <input type="checkbox" checked name="member" value="доц. Гончарова С.В." />доц. Гончарова С.В.
 <input type="checkbox" checked name="member" value="доц. Государев И.Б." />доц. Государев И.Б.
 <input type="checkbox" checked name="member" value="доц. Карпова Н.А" />доц. Карпова Н.А.
 <input type="checkbox" checked name="member" value="доц.  Авксентьева Е.Ю." />доц.  Авксентьева Е.Ю.
 <input type="checkbox" checked name="member" value="доц. Авксентьев С.Ю." />доц. Авксентьев С.Ю.
 <input type="checkbox" checked name="member" value="доц. Полякова Н.А." />доц. Полякова Н.А.
 <input type="checkbox" checked name="member" value="доц. Ханин Д.С." />доц. Ханин Д.С.
 <input type="checkbox" checked name="member" value="доц. Тарасова Т.Е." />доц. Тарасова Т.Е.
 <input type="checkbox" checked name="member" value="ст. преп. Ильина Т.С." />ст. преп. Ильина Т.С.
 <input type="checkbox" checked name="member" value="асс. Золотов Д.В." />асс. Золотов Д.В.
 <input type="checkbox" checked name="member" value="асс. Аксютин П.А." />асс. Аксютин П.А.
 <input type="checkbox" checked name="member" value="асс. Жуков Н.Н." />асс. Жуков Н.Н.
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

<br><input type="button" value="Отправить" onClick="getName();" />
</form>
</body>
</html>