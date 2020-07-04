$(document).ready(function () {
    let mainHead = true;

    

    $('li.singIn').click(function () { 
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('li.singOut').hide();
            $(this).text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zaloguj się, abyś mógł robić zakupy");
            $('.mainHeadQuad').append('<form method="post" class="singInForm" action="index.php"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój login:</td><<td><input class='login' type='text' name='login'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swoje hasło:</td><td><input class='loginPassword' type='password' name='loginPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zaloguj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            const singInIcon = $('<i class="fas fa-sign-in-alt"></i>');
            $(this).text("Zaloguj się ").append(singInIcon);

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singOut').show();

            mainHead = true;
        }
    });

    $('li.singOut').click(function (e) { 
        e.preventDefault();
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('li.singIn').hide();
            $(this).text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zarejestruj się, jeśli nie masz jeszcze konta");
            $('.mainHeadQuad').append('<form class="singInForm" action="singOut.php"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój email: </td><<td><input class='singOutEmail' type='text' name='singOutEmail'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swój login: </td><td><input class='singOutLogin' type='text' name='singOutLogin'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje imię: </td><td><input class='singOutName' type='text' name='singOutName'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje nazwisko: </td><td><input class='singOutSurname' type='text' name='singOutSurname'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje hasło: </td><td><input class='singOutPassword' type='password' name='singOutPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Powtórz hasło: </td><td><input class='singOutPassword' type='password'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zarejestruj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            $('li.singIn').show();

            $(this).text("Zarejestruj się");

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singIn').show();


            mainHead = true;
        }
    });

    if ($('#existTryAndFail').length){
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('li.singOut').hide();
            $('li.singIn').text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zaloguj się, abyś mógł robić zakupy");
            $('.mainHeadQuad').append('<form method="post" class="singInForm" action="index.php"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój login:</td><<td><input class='login' type='text' name='login'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swoje hasło:</td><td><input class='loginPassword' type='password' name='loginPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zaloguj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            const singInIcon = $('<i class="fas fa-sign-in-alt"></i>');
            $('li.singIn').text("Zaloguj się ").append(singInIcon);

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singOut').show();

            mainHead = true;
        }
    }
});