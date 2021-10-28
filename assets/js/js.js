$(document).ready(function() {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

    $(".next").click(function() {
        var data = $('#msform').serialize();
        var poli = $('#poli').val();
        var nama = $('#nama').val();
        var norm = $('#norm').val();
        var nik = $('#nik').val();
        var tgl_lahir = $('#tgl_lahir').val();
        var rapid = $('input[name=rapid_test]:checked', '#msform').val();
        var tgl_rapid = $('#tgl_rapid').val();
        var hasil_rapid = $('#hasil_rapid').val();
        var pcr = $('input[name=pcr]:checked', '#msform').val();
        var tgl_pcr = $('#tgl_pcr').val();
        var hasil_pcr = $('#hasil_pcr').val();

        var kontak = $('input[name=kontak]:checked', '#msform').val();
        var sebutkan_kontak = $('#sebutkan_kontak').val();        

        var perjalanan = $('input[name=perjalanan]:checked', '#msform').val();
        var sebutkan_perjalanan = $('#sebutkan_perjalanan').val();  

        // var wilayah = $('#wilayah').val();  
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        if(poli===""){
            alert("Poliklinik harus diisi.!");
            $('#poli').focus();            
            return false;
        }
        if(norm===""){
            alert("Norm harus diisi.!");
            $('#norm').focus();            
            return false;
        }
        if(nama===""){
            alert("Nama harus diisi.!");
            $('#nama').focus();            
            return false;
        }
        if(nik===""){
            alert("NIK harus diisi.!");
            $('#nik').focus();            
            return false;
        }
        if(tgl_lahir===""){
            alert("Tanggal Lahir harus diisi.!");
            $('#tgl_lahir').focus();            
            return false;
        } 
        if(rapid==="Ya"){
            if(tgl_rapid===""){
                alert("Tanggal Rapid Tes harus diisi.!");
                $('#tgl_rapid').focus();            
                return false;

            }

            if(hasil_rapid===""){
                alert("Hasil Rapid Tes harus diisi.!");
                $('#hasil_rapid').focus();            
                return false;

            }
        }
        if(pcr==="Ya"){
            if(tgl_pcr===""){
                alert("Tanggal PCR harus diisi.!");
                $('#tgl_pcr').focus();            
                return false;

            }
            if(hasil_pcr===""){
                alert("Hasil PCR harus diisi.!");
                $('#hasil_pcr').focus();            
                return false;

            }

        }
        if(kontak==="Ya"){
            if(sebutkan_kontak===""){
                alert("Sebutkan Kontak harus diisi.!");
                $('#sebutkan_kontak').focus();            
                return false;

            }
        }      
        if(perjalanan==="Ya"){
            if(sebutkan_perjalanan===""){
                alert("Sebutkan Perjalanan harus diisi.!");
                $('#sebutkan_perjalanan').focus();            
                return false;

            }
        }   
        
        // if(wilayah===""){
        //     alert("Wilayah Tempat Tinggal harus diisi.!");
        //     $('#wilayah').focus();            
        //     return false;
        // }           
               

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $(".previous").click(function() {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({
                    'opacity': opacity
                });
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function() {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function() {
        return false;
    })

});