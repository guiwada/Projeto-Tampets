<?php include_once('functions.php');?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

<?php
$read_api_key = 'TVKAXFQAP3LHM0TW';
$channel_id = '2156608';

$url = "https://api.thingspeak.com/channels/" . $channel_id . "/feeds/last.json?api_key=" . $read_api_key;
$response = file_get_contents($url);
$data = json_decode($response);

$peso = $data->field1; 
?>





<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap"
    />
  </head>
  <body>
    <div class="balana-de-tampinhas">
      <img class="vector-icon" alt="" src="./public/vector.svg" />

      <img class="logo2-2-icon" alt="" src="./public/logo2-2@2x.png" />

      <div class="undraw-investment-re-rpk5-1">
        <div class="undraw-investment-re-rpk5-1-child"></div>
        <img class="vector-icon1" alt="" src="./public/vector1.svg" />

        <img class="vector-icon2" alt="" src="./public/vector2.svg" />

        <img class="vector-icon3" alt="" src="./public/vector3.svg" />

        <img class="vector-icon4" alt="" src="./public/vector4.svg" />

        <img class="vector-icon5" alt="" src="./public/vector5.svg" />

        <img class="vector-icon6" alt="" src="./public/vector6.svg" />

        <img class="vector-icon7" alt="" src="./public/vector7.svg" />

        <img class="vector-icon8" alt="" src="./public/vector8.svg" />

        <img class="vector-icon9" alt="" src="./public/vector9.svg" />

        <img class="vector-icon10" alt="" src="./public/vector10.svg" />

        <img class="vector-icon11" alt="" src="./public/vector11.svg" />

        <img class="vector-icon12" alt="" src="./public/vector12.svg" />

        <img class="group-icon" alt="" src="./public/group.svg" />

        <img
          class="undraw-cat-epte-1-icon"
          alt=""
          src="./public/undraw-cat-epte-1.svg"
        />

        <div class="div">
        <?php echo $peso; ?>
        </div>
        <div class="undraw-investment-re-rpk5-1-item"></div>
        <div class="kg">KG</div>
      </div>
      <b class="tampinhas-arrecadadas">
        <p class="tampinhas">TAMPINHAS</p>
        <p class="arrecadadas">ARRECADADAS</p>
      </b>
      <b class="ponto-de-coleta">PONTO DE COLETA: FACENS</b>
      <div class="boto-voltar" id="botoVoltarContainer">
        <img class="arrowuupleft-icon" alt="" src="./public/arrowuupleft.svg" />

        <b class="voltar">Voltar</b>
      </div>
    </div>

    <script>
      var botoVoltarContainer = document.getElementById("botoVoltarContainer");
      if (botoVoltarContainer) {
        botoVoltarContainer.addEventListener("click", function (e) {
          window.location.href = "/../Upx/Tampets/index.php"
        });
      }
      </script>


<script type="text/javascript">
  setInterval(function(){
    call();
  },35000);

  function call(){
    get('peso');
    
    
  }
 

function get(action){
    var view = '<?php echo VIEW;?>';

    //Canal ID 
    var channel_id = '2156608';

    //API KEY
    var api_key = 'TVKAXFQAP3LHM0TW';

    $.ajax({
      url: "https://api.thingspeak.com/channels/" + channel_id + "/feeds.json?api_key=" + api_key,
      type: 'get',
      success: function(res){
        if (res && res.feeds && res.feeds.length > 0) {
          var lastFeed = res.feeds[res.feeds.length - 1];
          var peso = last.field1

}
  },
  error: function(err){
    console.log(err);
  }
});
</script>

  </body>
</html>
