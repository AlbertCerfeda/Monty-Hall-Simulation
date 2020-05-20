<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monty Hall</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">

    <!--Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!--Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <button id="reset" type="button" class="btn btn-warning">RESET</button>


    <div id="doorContainer">
        <div id="leftDoor" class="door unlocked">
            <img src="./media/door/0.png" hidden>
        </div>

        <div id="centralDoor" class="door unlocked">
            <img src="./media/door/0.png" hidden>
        </div>

        <div id="rightDoor" class="door unlocked">
            <img src="./media/door/0.png" hidden>
        </div>

        <div id="pendingDialog" style="vertical-align: middle;">
            <p  style="color: red">
                <b>Are you sure you want to open this door?</b>
            </p>
        </div>
    </div>


    <!-- SPIEGAZIONE CLASSI
        .unlocked Indica che la porta può essere cliccata. Se questa classe non è presente, il click handler non si attiva
        .pending Indica che la porta è stata scelta all'inizio. La porta apparirà come socchiusa e verrà mostrato il messaggio se si è sicuri della scelta
        .open Indica la scelta finale. Fa partire l'animazione della porta che si apre.
    -->
    <script>
        function openRandomDoor() {
            console.log("Opening random door...");
            console.log($(".door").not(".pending"));
            ///
            //TODO: far apparire capra
            ///
            var random = Math.round(Math.random());
            console.log(random);
            var $closedDoors =$(".door").not(".pending");
            $($closedDoors[random]).addClass('open').removeClass('unlocked').off();

        }
        function setup(){
            $('#pendingDialog').hide();

            $doors=$(".door").removeClass();
            $doors.addClass('door');
            $doors.addClass('unlocked');
            $(".door").off();//Rimuove tutti gli handlers

            $(".door.unlocked").click(function(){
                if ($(".door.pending").length == 0){ //Se è la prima volta che si sceglie la porta
                    console.log("Added class 'pending'");

                    $(this).addClass('pending');// Fa sì che la porta appaia come socchiusa
                    $(this).append($('#pendingDialog'));//Fa apparire il testo sulla porta appena scelta
                    $('#pendingDialog').show();
                    openRandomDoor();
                }else{//Altrimenti vuol dire che ho deciso la porta finale
                    console.log("Chose final door");

                    $(".door").removeClass('unlocked');//Fa sì che non si possano aprire altre porte
                    $(".door").off("click");//Rimuove gli handler (in particolare del click) dalle porte

                    $(".door.pending").removeClass('pending');
                    $('#pendingDialog').hide();

                    $(this).addClass('open');
                    ////
                    //TODO: Fare Math.random() per scegliere se far uscire la capra o la macchina
                    ////
                }
            });
        }

        setup();

        $('#reset').click(function(){
            setup();
        });

        $("document").ready(function(){
            $('#pendingDialog').hide();
        })

    </script>

</body>
</html>

