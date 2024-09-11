<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Document</title>
    <style>
        /* Set the A4 size */
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #7e7979;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .a4-container {
            width: 210mm;
            height: 297mm;
            background-color: #fff;
            padding: 20mm;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        h1 {
            font-size: 24pt;
            text-align: center;
            margin-bottom: 20mm;
        }

        p {
            font-size: 12pt;
            line-height: 1.5;
            text-align: justify;
        }

        .footer {
            text-align: center;
            font-size: 10pt;
            margin-top: auto;
        }

        @media print {
            body {
                background-color: #fff;
            }

            .a4-container {
                box-shadow: none;
                margin: 0;
                width: 100%;
                height: 100%;
            }
        }
    </style>

</head>

<body>

    <div class="a4-container">
        <div class="content">
            @yield('body-content')

        </div>
    </div>
</body>

</html>
