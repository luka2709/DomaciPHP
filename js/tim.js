$('#formaTim').submit(function (){
    event.preventDefault();
    const $form = $(this);
    const $input = $form.find('input','textarea','select');

    const data=$form.serialize();

    console.log(data);

    $input.prop('disabled',true);
    if($('input[name="id"]').val()==""){
        req=$.ajax({
            url: 'requestHandler/timovi/add.php',
            type:'post',
            data: data
        });
    }else{
        req=$.ajax({
            url: 'requestHandler/timovi/update.php',
            type:'post',
            data: data
        });
    }

    $input.prop('disabled',false);

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno sačuvan tim");
            location.reload();
        }else{
            alert("Neuspešno sačuvan tim")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });

});

function popuniFormu(idT){
    let id=idT;

    req=$.ajax({
        url: 'requestHandler/timovi/get.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){

        let tim = $.parseJSON(res)[0];

        $('input[name="id"]').val(tim.id);
        $('input[name="korisnik_id"]').val(tim.korisnik_id);
        $('input[name="ime"]').val(tim.ime);
        $('select[name="igrac_id"]').val(tim.igrac_id);
        $('select[name="region"]').val(tim.region);
        
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
}

$('input[name="timCheck"]').click(function (){
    popuniFormu($('input[name="timCheck"]:checked').val());
});

$('#resetTim').click(function (){
    $('input[name="id"]').val("");
});



$('#obrisiTim').click(function(){
    let id = $('input[name="id"]').val();

    if(id==""){
        alert("Tim nije odabran");
        return;
    }

    req=$.ajax({
        url: 'requestHandler/timovi/delete.php',
        type:'post',
        data: {'id':id}
    });

    req.done(function(res,textStatus,jqXHR){
        if(res=="Uspesno"){
            alert("Uspešno obrisan tim");
            location.reload();
        }else{
            alert("Neuspešno obrisan tim")
            console.log(res);
        }
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Greska '+textStatus, errorThrown)
    });
});