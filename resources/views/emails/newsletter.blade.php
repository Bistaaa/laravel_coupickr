<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Qui puoi aggiungere stili personalizzati per la tua e-mail, se necessario */
    </style>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #ff6726;">La tua Newsletter</h2>
        <hr style="border: none; height: 1px; background-color: #f4f4f4; margin-top: 10px; margin-bottom: 20px;">

        <!-- Contenuto dinamico della newsletter -->
        <p>{!! $content !!}</p>

        <hr style="border: none; height: 1px; background-color: #f4f4f4; margin-top: 20px; margin-bottom: 10px;">
        <p>Se desideri annullare l'iscrizione, <a href="{{ url('/unsubscribe/' . $unsubscribeToken) }}" style="color: #ff6726;">clicca qui</a>.</p>
    </div>
</body>
</html>
