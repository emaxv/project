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
    var helpmembermas=[];
    var gr = document.getElementsByName('member[]');
    for (var i=0;i<gr.length;i++){
        if (gr[i].checked){
            helpmembermas.push(gr[i].value);
            
        }
    }
    var membermas = [];
    for(var h=0;h<helpmembermas.length;h++){
        if(h!=helpmembermas.length-1){
            membermas.push(helpmembermas[h]+','+'\t');
        }
        else{
            membermas.push(helpmembermas[h]);
        }
    }
    var povestkamas = [];
    var gr1 = document.getElementsByName('aims[]');
    for(var j=0;j<gr1.length;j++){
        povestkamas.push(j+1+'.'+gr1[j].value+'\n');
    }
    var speechmas = [];
    var gr2 = document.getElementsByName('speach[]');
    for(var k=0;k<gr2.length;k++){
        speechmas.push('Вопрос №');
        speechmas.push(k+1+'.'+'\n'+gr2[k].value+'\n'+'\n');
    }
    var solutionsmas = [];
    var gr3 = document.getElementsByName('solutions[]');
    for(var l=0;l<gr3.length;l++){
        solutionsmas.push(l+1+'.'+gr3[l].value+'\n');
    }
id = document.forms["reg"].elements["id"].value;
    var docDefinition = { content: [
        {text: 'Протокол №'+id, style: 'mid'},
        {text: today,style:'mid' },
        {text: '\n', style:'a14'},
        {text: 'Присутствовали: ', style: 'b18'},
        {text: membermas, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Повестка дня: ', style: 'b18'},
        {text: povestkamas, style:'a14'},
        {text: '\n', style:'a14'},
        {text: 'Выступили: \n\n', style: 'b18'},
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
pdfMake.createPdf(docDefinition).open();//download(''+today+'.pdf');
}
/*
Добавление информации о повестке дня
*/
function add(){
    $("#aim").append("<textarea cols='60' rows='3' type='text' name='aims[]'>"+"</textarea>"+"<br>");
}
function addspeech() {
    $("#speech").append("<textarea cols='60' rows='5' type='text' name='speach[]'>"+"</textarea>"+"<br>");
}
/*
Добавление информации о решениях кафедры
*/
function soladd() {
    $("#sol").append("<textarea cols='60' rows='3' type='text' name='solutions[]'>"+"</textarea>"+"<br>");
}
/*
Вывод информации о присутствующих
*/
members=['зав. каф. Власова Е.З.', 'проф. Абрамян Г.В.', 'доц. Гончарова С.В.', 'доц. Государев И.Б.', 'проф. Готская И.Б.', 'доц. Карпова Н.А.', 'доц.  Авксентьева Е.Ю.', 'доц. Полякова Н.А.', 'доц. Ханин Д.С.', 'доц. Кужельная О.В.', 'ст. преп. Ильина Т.С.', 'асс. Аксютин П.А.', 'асс. Жуков Н.Н.'];
$(function(){
    for(var l=0;l<members.length;l++){
    $("#mem").append("<input type='checkbox' checked name='member[]' value='"+members[l]+"' />"+members[l]+""+"<br>");
    }
});
</script>
  <style>
   .brd {
    border: 4px double black; /* Параметры границы */
    background: #fc3; /* Цвет фона */
    padding: 10px; /* Поля вокруг текста */
   }
  </style>
</head>
<body>
    <form class="brd" id="reg" name="reg" action="dataBase.php" method="post">
        Введите номер протокола <input text="text" id="id" name="id" />
        <br>Список присутствующих:<br>
        <div id="mem"></div>
        <br>Повестка дня:<br>
        <button type="button" onClick="add()" >Добавить</button>
        <div id="aim"></div>
        <br>Выступили:<br>
        <button type="button" onClick="addspeech()" >Добавить</button>
        <div id="speech"></div>
        <br>Решения кафедры<br>
        <button type="button" onClick="soladd()" >Добавить</button>
        <div id="sol"></div>
        <br><input type="submit" value="Отправить" onClick="getName()" />
    </form>
</body>
</html>