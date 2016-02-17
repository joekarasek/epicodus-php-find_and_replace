<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/FindAndReplace.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            'form' => true
        ));
    });

    $app->get("/action", function() use ($app) {
        $my_FindAndReplace = new FindAndReplace;
        if($_GET['button'] == 'whole') {
            // use the method for replacing whole words
            $message_text = $my_FindAndReplace->replaceWords($_GET['phrase'] , $_GET['word-to-replace'] , $_GET['replacement']);
        } else {
            // use the method for any letters
            $message_text = $my_FindAndReplace->replaceAnyMatch($_GET['phrase'] , $_GET['word-to-replace'] , $_GET['replacement']);
        }

        return $app['twig']->render('index.html.twig', array(
            'form' => true,
            'message' => array(
                'text' => $message_text,
                'type' => 'info'
            )
        ));
    });

    return $app;
?>
