(function ($) {
    $("#categorias-productos").change(function () {
        $.ajax({
            url: pg.ajaxurl,
            method: 'POST',
            data: {
                'action': 'ProductFilterAjax',
                'categoria': $(this).find(':selected').val()
            },
            beforeSend: function () {
                $('#resultado-productos').html('');
                $('#loading-spinner-productos').removeClass('hidden');
            },
            success: function (data) {
                let html = '';
                data.forEach((item) => {
                    html += `
                     <div class="col-md-4 my-3">
                            <div class="card">
                                <figure>
                                    ${item.img}
                                </figure>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="text-center my-2">
                                            <a class="text-dark" href="${item.link}">
                                                ${item.title}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#loading-spinner-productos').addClass('hidden');
                $('#resultado-productos').html(html);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            url: pg.apiUrl + 'novedades/3',
            method: 'GET',
            beforeSend: function () {
                $('#loading-spinner-novedades').removeClass('hidden');
            },
            success: function (data) {
                let html = '';
                data.forEach((item) => {
                    html += `
                     <div class="col-md-4 my-3">
                            <div class="card">
                                <figure>
                                    ${item.img}
                                </figure>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="text-center my-2">
                                            <a class="text-dark" href="${item.link}">
                                                ${item.title}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#loading-spinner-novedades').addClass('hidden');
                $('#resultado-novedades').html(html);
            },
            error: function (error) {
                console.log(error);
            }
        })
    })
})(jQuery);
