<footer>
  <h2>Это просто футер</h2>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
function heightChange(){
   var heigthAllElements = $("#container")[0].clientHeight + $('header')[0].clientHeight + $('footer')[0].clientHeight,
    heigthDocument = document.documentElement.clientHeight;
   if(heigthAllElements < heigthDocument){
       var marginTopFooter = heigthDocument - heigthAllElements;
       $('footer')[0].style = "margin-top: " + marginTopFooter + "px;";
   }
}

window.onresize = function(){
  heightChange();
};


heightChange();
</script>
<script src="/js/main.js" type="text/javascript"></script>
</body>
</html>
