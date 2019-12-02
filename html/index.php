<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.css">
        <link type="text/css" rel="stylesheet" href="../css/stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="wrapper">
            <div class="box header">
            <?php include '../includes/header.php';?>
            </div>
            <div class="box sidebar">
            <?php include '../includes/rubrics.php';?>
            </div>
            <div class="box content">
                <div class="carousel">
                    <a href="#" class="carousel-item"><img src="../images/rickAstley.jpg" alt="Rickrolled!!!"></a>
                    <a href="#" class="carousel-item"><img src="../images/martijn.jpg" alt="Der TEUFEL!!!"></a>
                    <a href="#" class="carousel-item"><img src="../images/icaButtplugg.jpg" alt="ICA ButtPlugg"></a>
                    <a href="#" class="carousel-item"><img src="../images/vaseline.jpg" alt="Vaseline voor de ButtPlugg"></a>
                </div>
            <div class="container">
                <div class="row" style="height:80% !important;">
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style="width:100%">
                            <div class="card-image">
                                <img src="../images/rickAstley.jpg">
                                <span class="card-title coconutMilk black-text">Rick Astley bodypillow</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>Will never gonna give you up</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style="width:100%; height:80%;">
                            <div class="card-image">
                                <img src="../images/icaButtplugg.jpg">
                                <span class="card-title coconutMilk black-text">StandBeeld</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>voor alle feestjes</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style=" max-width:100%; min-height: 100%;">
                            <div class="card-image">
                                <img src="../images/vaseline.jpg">
                                <span class="card-title coconutMilk black-text">Vaseline</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>voor jou en Jaqueline</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style=" max-width:100%; min-height: 100%;">
                            <div class="card-image">
                                <img src="../images/wasmachine.jpg">
                                <span class="card-title coconutMilk black-text">Wasmachine</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>kind niet inbegrepen</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style=" max-width:100%; min-height: 100%;">
                            <div class="card-image">
                                <img src="../images/martijn.jpg">
                                <span class="card-title coconutMilk black-text">Handtekening Martijn</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>Geschreven met studenten tranen</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="card coconutMilk" style=" max-width:100%; min-height: 100%;">
                            <div class="card-image">
                                <img src="../images/tonk.jpg">
                                <span class="card-title coconutMilk black-text">tonk</span>
                            </div>
                            <div class="card-content coconutMilk">
                                <p>Voor al je GTA avonturen in Real Life</p>
                            </div>
                            <div class="card-action coconutMilk">
                                <a href="#">Bieden</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box footer">
            <?php include '../includes/footer.php';?>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.js"></script>
        <script>
            $(document).ready(function(){
                $('.sidenav').sidenav();
            });
        </script>
        <script>
            $(document).ready(function(){
            $('.carousel').carousel();
            });
        </script>
    </body>
</html>