<!-- app/View/Errors/error500.ctp -->

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Internal Server Error</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .error {
            width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            font-size: 24px;
            margin: 0 0 10px;
            padding: 0;
        }

        p {
            margin: 10px 0;
            padding: 0;
        }

        pre {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 10px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="error">
        <h1>Internal Server Error</h1>
        <p>An internal server error has occurred while processing your request.</p>
        
        <?php if (Configure::read('debug') > 0): ?>
            <p>Error details:</p>
            <pre><?php echo $error ?></pre>
        <?php endif; ?>
    </div>
</body>
</html>