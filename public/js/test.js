(function() {
    'use strict';

    var open = document.getElementById("open");
    var close = document.getElementById("close");
    var modal = document.getElementById("modal");
    var mask = document.getElementById("mask");
    const dialog = $('.dialog');
    const dialog_close = $('.dialog .dialog_close');
    const dialog_submit = $('.dialog .dialog_submit');

    $('.index').click(function() {
        dialog.show();
        var rowClass = getRowFromClassName(event.target.className);
        var rowDOM = $(rowClass);
        console.log(rowDOM);
        dialog.find ('input.id').val(rowDOM.find('.id')[0].textContent);;
        dialog.find ('input.company').val(rowDOM.find('.company')[0].textContent);;
        dialog.find ('input.department').val(rowDOM.find('.department')[0].textContent);
        dialog.find ('input.positon').val(rowDOM.find('.positon')[0].textContent);
        dialog.find ('input.name').val(rowDOM.find('.name')[0].textContent);
        dialog.find ('input.e_mail').val(rowDOM.find('.e_mail')[0].textContent);
        dialog.find ('input.postcode').val(rowDOM.find('.postcode')[0].textContent);
        dialog.find ('input.adress').val(rowDOM.find('.adress')[0].textContent);
        dialog.find ('input.TEL').val(rowDOM.find('.TEL')[0].textContent);
        dialog.find ('input.TELdepartment').val(rowDOM.find('.TELdepartment')[0].textContent);
        dialog.find ('input.TELdirect').val(rowDOM.find('.TELdirect')[0].textContent);
        dialog.find ('input.FAX').val(rowDOM.find('.FAX')[0].textContent);
        dialog.find ('input.phonenumber').val(rowDOM.find('.phonenumber')[0].textContent);
        dialog.find ('input.URL').val(rowDOM.find('.URL')[0].textContent);
        dialog.find ('input.trade_day').val(rowDOM.find('.trade_day')[0].textContent);
        dialog.find ('input.eightfrinds_num').val(rowDOM.find('.eightfrinds_num')[0].textContent);
        dialog.find ('input.now_dating').val(rowDOM.find('.now_dating')[0].textContent);
        dialog.find ('input.question').val(rowDOM.find('.question')[0].textContent);
    });

    /**
     * used for dialog's function
     * @param {String} className
     * @returns {String} class name of row
     */
    function getRowFromClassName(className) {
        const EVENT_PREFIX = "index_";
        const ROW_PREFIX = "tr.row_";
        var prefixPos = className.indexOf(EVENT_PREFIX);
        var id = className.substring(prefixPos).replace(EVENT_PREFIX, '');
        return ROW_PREFIX+id;
    }

    dialog_close.click(function() {
        dialog.hide();
    });

    dialog_submit.click(function() {
        var value_id = dialog.find('.id').val();
        var value_e_mail = dialog.find('input.e_mail').val();
        $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/update',
            datatType : 'json',
            type: 'POST',
            data: {
                'id': value_id,
                'e_mail': value_e_mail
            },
            // cache: false,
            // contentType: false,
            // processData: false,

            success:function(response) {
                console.log(response);
            }
        });
    });

    open.addEventListener("click",function(){
        modal.className='';
        mask.className='';

    });

    close.addEventListener("click",function(){
        modal.className="hidden";
        mask.className="hidden";

    });

    mask.addEventListener("click",function(){
        modal.className="hidden";
        mask.className="hidden";
       
    });

})();  
