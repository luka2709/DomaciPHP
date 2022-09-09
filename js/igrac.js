$('#formaIgrac').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/igrac/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/igrac/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan igrač");
            location.reload();
        }else{
            alert("Neuspešno sačuvan igrač")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('input[name="igracCheck"]').click(function (){

    let id=$('input[name="igracCheck"]:checked').val();

    req=$.ajax({
        url: 'requestHandler/igrac/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let igrac = $.parseJSON(res)[0];

        $('input[name="id"]').val(igrac.id);
        $('input[name="ime"]').val(igrac.ime);
        $('input[name="prezime"]').val(igrac.prezime);
        $('input[name="pozicija"]').val(igrac.pozicija);



    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

$('#resetIgrac').click(function (){
    $('input[name="id"]').val("");
});

$('#obrisiIgraca').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Igrač nije odabran");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/igrac/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan igrač");
            location.reload();
        }else{
            alert("Neuspešno obrisan igrač")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});