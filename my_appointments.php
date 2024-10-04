<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #bar {
            height: 500px;
            width: 30px;
            border: 1px solid black;
            margin-left: 100px;
            display: flex;
        }

        #progress {
            height: 10%;
            width: 30px;
            background-color: green;
            align-self: flex-end;
        }
    </style>
</head>
<body>

    <div id="bar">
        <div id="progress"></div>
    </div>
    
    <script>
    
      const availableAppointments = 10
      const finishedAppointments = 3

      const percentage = (finishedAppointments / availableAppointments) * 100

      const progress = document.getElementById("progress")
      progress.style.height = percentage + "%" 

        
    
    </script>
</body>
</html>