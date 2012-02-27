<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xml:lang="fr-BE"
      lang="fr-BE">

<head>

    <meta name="Author"
          content="Annabelle Buffart"/>
    <meta name="Keywords"
          content="Blog, News"/>
    <meta name="Description"
          content="Blog"/>

    <meta http-equiv="Content-Type"
          content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Style-Type"
          content="text/css"/>
    <meta http-equiv="Content-Script-Type"
          content="text/javascript"/>
    <meta http-equiv="Content-Language"
          content="fr"/>

    <meta name="DC.Language"
          content="fr"/>
    <meta name="DC.Creator"
          content="Annabelle Buffart"/>
    <meta name="DC.Date.modified"
          scheme="W3CDTF"
          content="6/02/2012"/>
    <title>
        AnNa's blog <?php echo $view['data']['view_title']; ?>
    </title>

    <link rel="stylesheet"
          type="text/css"
          href="./screen.css"
          media="screen"
          title="Normal"/>

    <script type="text/javascript"
            src="adresse_du_fichier_js">
    </script>

    <link href='http://fonts.googleapis.com/css?family=Bad+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>

</head>


<body>
<div class="main">
    <?php include('header.php'); ?>
    <!-- FIN header -->

    <div class="content">
        <div class="colonneGauche">
            <?php include($view['html']); ?>
        </div>

        <!-- FIN colonneGauche -->
        <div class="colonneDroite">
            <?php include('apropos.php'); ?>
            <!-- FIN contenu -->


            <?php include('liens.php'); ?>

            <!-- FIN contenu -->

            <!--<div class="contenu">
                 <h1>
                         Archives
                 </h1>
                 <ol class="lien">
                         <li>
                                 <a href="./archive.html" title="Archive janvier 2012">Janvier 2012</a>
                         </li>
                         <li>
                                 <a href="./archive.html" title="Archive décembre 2011">Décembre 2011</a>
                         </li>
                         <li>
                                 <a href="./archive.html" title="Archive novembre 2011">Novembre 2011</a>
                         </li>
                 </ol>
         </div>
         <!-- FIN contenu -->

        </div>
        <!-- FIN colonneDroite -->

    </div>
    <!-- FIN content -->

    <?php include('footer.php'); ?>

    <!-- FIN footer -->

</div>
<!-- FIN main -->

</body>
</html>
