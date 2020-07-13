$(document).ready(function () {
    let mainHead = true;

    

    $('li.singIn').click(function () { 
        if(mainHead){

            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('div.mainHeadQuad article').hide();
            $('li.singOut').hide();
            $('div.mainFooter').hide();
            
            $(this).text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zaloguj się, abyś mógł robić zakupy");
            $('.mainHeadQuad').append('<form method="post" class="singInForm" action="singIn.php"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój login:</td><<td><input class='login' type='text' name='login'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swoje hasło:</td><td><input class='loginPassword' type='password' name='loginPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zaloguj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            $('div.mainHeadQuad article').show();
            $('div.mainFooter').show();
            const singInIcon = $('<i class="fas fa-sign-in-alt"></i>');
            $(this).text("Zaloguj się ").append(singInIcon);

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singOut').show();

            mainHead = true;
        }
    });

    $('li.singOut').click(function () { 
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('div.mainHeadQuad article').hide();
            $('li.singIn').hide();
            $('div.mainFooter').hide();

            $(this).text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zarejestruj się, jeśli nie masz jeszcze konta");
            $('.mainHeadQuad').append('<form class="singInForm" action="singout.php" method="post"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój email: </td><<td><input class='singOutEmail' type='text' name='singOutEmail'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swój login: </td><td><input class='singOutLogin' type='text' name='singOutLogin'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje imię: </td><td><input class='singOutName' type='text' name='singOutName'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje nazwisko: </td><td><input type='text' name='singOutSurname'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje hasło: </td><td><input class='singOutPassword' type='password' name='singOutPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Powtórz hasło: </td><td><input class='singOutPassword' type='password'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zarejestruj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            $('div.mainHeadQuad article').show();
            $('li.singIn').show();
            $('div.mainFooter').show();

            $(this).text("Zarejestruj się");

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singIn').show();


            mainHead = true;
        }
    });

    
    
    
    if ($('.existTryAndFailSingIn').length){
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('li.singOut').hide();
            $('div.mainHeadQuad article').hide();
            $('div.mainFooter').hide();

            $('li.singIn').text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zaloguj się, abyś mógł robić zakupy");
            $('.mainHeadQuad').append('<form method="post" class="singInForm" action="singIn.php"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój login:</td><<td><input class='login' type='text' name='login'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swoje hasło:</td><td><input class='loginPassword' type='password' name='loginPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zaloguj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            $('.singInTableError').text("Błąd logowania");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            $('div.mainHeadQuad article').show();
            $('div.mainFooter').show();
            const singInIcon = $('<i class="fas fa-sign-in-alt"></i>');
            $('li.singIn').text("Zaloguj się ").append(singInIcon);

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singOut').show();

            mainHead = true;
        }
    }

    if($('.existTryAndFailSingOut').length){
        if(mainHead){
            $('.mainHeadQuad h1').hide();
            $('.mainHeadQuad h2').hide();
            $('li.singIn').hide();
            $('div.mainHeadQuad article').hide();
            $('div.mainFooter').hide();

            $('li.singOut').text('Powrót');

            $('.mainHeadQuad').append('<h1 class="singInH1">');
            $('h1.singInH1').text("Zarejestruj się, jeśli nie masz jeszcze konta");
            $('.mainHeadQuad').append('<form class="singInForm" action="singout.php" method="post"><table class="singInTable"></form>');

            $('table.singInTable').append("<tr><td>Podaj swój email: </td><<td><input class='singOutEmail' type='text' name='singOutEmail'/></td></tr>");
            $('table.singInTable tr').after("<tr><td>Podaj swój login: </td><td><input class='singOutLogin' type='text' name='singOutLogin'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje imię: </td><td><input class='singOutName' type='text' name='singOutName'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje nazwisko: </td><td><input type='text' name='singOutSurname'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Podaj swoje hasło: </td><td><input class='singOutPassword' type='password' name='singOutPassword'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td>Powtórz hasło: </td><td><input class='singOutPassword' type='password'/></td></tr>");
            $('table.singInTable tr').last().after("<tr><td></td><td><button type='submit' class='singInSubmit'>Zarejestruj się</button></td></tr>");
            $('table.singInTable tr').last().after("<tr><td class='singInTableError' colspan='2'></td></tr>");

            $('.singInTableError').text("Błąd Rejestracji");

            mainHead = false;
        }else{
            $('.mainHeadQuad h1').show();
            $('.mainHeadQuad h2').show();
            $('li.singIn').show();
            $('div.mainHeadQuad article').show();
            $('div.mainFooter').show();

            $('li.singOut').text("Powrót");

            $('h1.singInH1').detach();
            $('form.singInForm').detach();
            
            $('li.singIn').show();


            mainHead = true;
        }
    }

    $('button.pluse').click(function (e) { 
        e.preventDefault();
        let countProduct = parseInt($(this).prev().attr('value'));
        countProduct = countProduct + 1;
        $(this).prev().attr('value', countProduct);
        
    });
    
    $('button.minuse').click(function (e) { 
        e.preventDefault();
        let countProduct = parseInt($(this).next().attr('value'));
        if(countProduct){
            countProduct = countProduct - 1;
            $(this).next().attr('value', countProduct);
            $('button.addToBasket').attr('disabled', false);
        }
    });
    
    $('button.addToBasket').click(function (e) {
        const descriptionFooter = $(this).parent();
        if(descriptionFooter.find('input').attr('value') == 0)
            e.preventDefault();
    });

    //     let amountOfProduct = descriptionFooter.find('input').attr('value');
    // $('.addToBasket').click(function (e) { 
    //     e.preventDefault();
    //     const descriptionFooter = $(this).parent();
    //     let amountOfProduct = descriptionFooter.find('input').attr('value');
    //     let numberIdProduct = $(this).attr('value');
    //     newOrderToBasket = new createBasket(numberIdProduct, amountOfProduct);
    // });
});


