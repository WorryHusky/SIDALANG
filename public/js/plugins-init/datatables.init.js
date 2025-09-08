(function ($) {
    "use strict"

    function show(){
        $('#peringatan').hide();
        $('#example5').show();
    }

    function hide(){
        $('#peringatan').show();
        $('#example5').hide();
    }

    function appendData(data){
        console.log(data);
        $("#nm_faskes").html(`<b>${data.nm_faskes.toUpperCase()}</b>`);

        var content = '';
        if(data.kuota.length > 0){
            data.kuota.forEach(e => {
                content += `<span class="badge badge-xl m-1 badge-info">${e.vaksin.nm_vaksin} : ${e.kuota} Kuota</span>`;
            });
        } else {
            content = `<div class="alert alert-danger solid alert-rounded ">Tidak ada kuota vaksin apapun</div>`;
        }


        $("#content").html(content);

        $("#kuota").modal('show');
    }

    function load(kota_id){
        show();


            $.ajax({
                'url': "/api/v1/laporan",
                'method': "POST",
                headers: {
                    'Authorization': 'Bearer '+$('#token').val(),
                    'Accept': 'application/json',
                },
                dataType: "json",
                data: JSON.stringify({
                    'kota_id': kota_id,
                }),
                'contentType': 'application/json'
            }).done(function (data) {
                if ( $.fn.DataTable.isDataTable( '#example5' ) ) {
                        $('#example5').DataTable().clear().destroy();
                        $('#example5 tbody').off('click');
                }
                var table = $('#example5').DataTable({
                    aaData: data,
                    columns: [
                        { data: "id" },
                        { data: "nm_faskes" },
                        { data: "tipe" },
                        { data: "aksi" },
                    ],
                    searching: true,
                    paging: true,
                    select: false,
                    info: false,
                    lengthChange: false,
                    language: {
                        paginate: {
                            next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                            previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                        }
                    }

                });

                $('#example5 tbody').on('click', 'tr', function () {
                    var tr = this;
                    $(this).on('click','button', function(){
                        var data = $('#example5').DataTable().row(tr).data();
                        appendData(data);
                    })
                })
            });



   }

   function test (e){
    $("#kota").select2({
        ajax: {
            url: "/kota/"+$(".select2").val(),
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function(data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data,
                    pagination: {
                        more: (params.page * 30) < data.total_count
                    }
                };
            },
            cache: true
        },
        placeholder: 'Cari Kota',
        minimumInputLength: 0,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection
    })

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }


        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__title'></div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.text);
        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.full_name || repo.text;
    }


}

   $(".kota").hide();
   hide();

   $('.select2').select2().on('change', (e) => {
       $(".kota").show();
       if ($('#kota').hasClass("select2-hidden-accessible")) {

           $("#kota").val('');
           $("#kota").select2('destroy');
           hide();

       // Select2 has been initialized
   }
       setTimeout(() => {
           test(e);
       }, 200);
   });

   $(".kota").on('change', function(q){
    load(q.target.value), 300;
});





})(jQuery);
