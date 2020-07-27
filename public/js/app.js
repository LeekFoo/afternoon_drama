$(function () {
    $('#draw-btn').on('click', function () {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'http://afternoon.jack.co.jp/api/card',
        }).done(function (data, textStatus, jqXHR) {
            console.log('データ取れた');
            console.log(data);

            const fiveCard = $('#five-card .row');
            fiveCard.html('');
            $.each(data['fiveCard'], function(index, value) {
                const html = '<div class="five card col-md-2">' + value.word + '</div>';
                fiveCard.append(html);
            });

            const sevenCard = $('#seven-card .row');
            sevenCard.html('');
            $.each(data['sevenCard'], function(index, value) {
                const html = '<div class="seven card col-md-2">' + value.word + '</div>';
                sevenCard.append(html);
            });

            $('.card').draggable();
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('通信エラー：' + textStatus);
            console.log(errorThrown);
        });
    });
});
