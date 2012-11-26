<html>
    <head>
        <title><?php echo $page_title ?></title>
        <base href="<?php echo $this->config->item('base_url'); ?>" />
        <script type="text/javascript" src="assets/js/swfobject.js"></script>
        <style type="text/css"> 
            body {
                background-color: #fff;
                margin: 40px;
                font-family: Lucida, Verdana, Sans-serif;
                font-size: 16px;
                color: #4F5155;
            }

            div, h1 {
                margin: 1em 0;
            }

            iframe {
                border: 1px solid silver;
            }

            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }

            h1 {
                color: #444;
                background-color: transparent;
                font-size: 16px;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        
        <h1><?php echo $page_title; ?></h1>
        <script type="text/javascript">
            swfobject.embedSWF(
              "assets/swf/open-flash-chart.swf", "test_chart",
              "<?php echo $chart_width; ?>", "<?php echo $chart_height; ?>",
              "9.0.0", "expressInstall.swf",
              {"data-file":"<?php echo urlencode($data_url); ?>"}
            );
        </script>

        <div id="test_chart"></div>

        <div id="links">
            <?php foreach ($links as $title => $url){ ?>
                <a href="<?php echo $url; ?>"><?php echo $title; ?></a>&nbsp;
            <?php } ?>
        </div>

        <h1>JSON</h1>
        <iframe src ="<?php echo $data_url; ?>" width="80%" height="200">
            <p>No iframes for your browser</p>
        </iframe>

        <div id="info">
            More info &amp; examples: <a href="http://teethgrinder.co.uk/open-flash-chart-2">Open Flash Chart 2 Home</a>
        </div>

    </body>
</html>
