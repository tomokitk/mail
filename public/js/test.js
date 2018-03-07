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
        dialog.find ('input.position').val(rowDOM.find('.positon')[0].textContent);
        dialog.find ('input.name').val(rowDOM.find('.name')[0].textContent);
        dialog.find ('input.e_mail').val(rowDOM.find('.e_mail')[0].textContent);
        dialog.find ('input.postcode').val(rowDOM.find('.postcode')[0].textContent);
        dialog.find ('input.address').val(rowDOM.find('.address')[0].textContent);
        dialog.find ('input.TEL').val(rowDOM.find('.TEL')[0].textContent);
        dialog.find ('input.TELdepartment').val(rowDOM.find('.TELdepartment')[0].textContent);
        dialog.find ('input.TELdirect').val(rowDOM.find('.TELdirect')[0].textContent);
        dialog.find ('input.FAX').val(rowDOM.find('.FAX')[0].textContent);
        dialog.find ('input.phonenumber').val(rowDOM.find('.phonenumber')[0].textContent);
        dialog.find ('input.URL').val(rowDOM.find('.URL')[0].textContent);
        dialog.find ('input.trade_day').val(rowDOM.find('.trade_day')[0].textContent);
        dialog.find ('input.eightfriends_num').val(rowDOM.find('.eightfrinds_num')[0].textContent);
        dialog.find ('input.now_dating').val(rowDOM.find('.now_dating')[0].textContent);
        dialog.find ('input.question').val(rowDOM.find('.question')[0].textContent);
        // dialog.find ('input.deleted_at').val(rowDOM.find('.deleted_at')[0].textContent);
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
        var value_company = dialog.find('input.company').val();
        var value_department = dialog.find('input.department').val();
        var value_position = dialog.find('input.position').val();
        var value_name = dialog.find('input.name').val();
        var value_e_mail = dialog.find('input.e_mail').val();
        var value_postcode = dialog.find('input.postcode').val();
        var value_address = dialog.find('input.address').val();
        var value_TEL = dialog.find('input.TEL').val();
        var value_TELdepartment = dialog.find('input.TELdepartment').val();
        var value_TELdirect = dialog.find('input.TELdirect').val();
        var value_FAX = dialog.find('input.FAX').val();
        var value_phonenumber = dialog.find('input.phonenumber').val();
        var value_URL = dialog.find('input.URL').val();
        var value_trade_day = dialog.find('input.trade_day').val();
        var value_eightfriends_num = dialog.find('input.eightfriends_num').val();
        var value_now_dating = dialog.find('input.now_dating').val();
        var value_question = dialog.find('input.question').val();
        // var value_deleted_at = dialog.find('input.deleted_at').val();
        $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/update',
            datatType : 'json',
            type: 'POST',
            data: {
                'id': value_id,
                'company':value_company,
                'department': value_department,
                'position':value_position,
                'name':value_name,
                'e_mail':value_e_mail,
                'postcode':value_postcode,
                'address':value_address,
                'TEL':value_TEL,
                'TELdepartment':value_TELdepartment,
                'TELdirect':value_TELdirect,
                'FAX':value_FAX,
                'phonenumber':value_phonenumber,
                'URL':value_URL,
                'trade_day':value_trade_day,
                'eightfriends_num':value_eightfriends_num,
                'now_dating':value_now_dating,
                'question':value_question,
                // 'deleted_at':value_deleted_at,
                
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
