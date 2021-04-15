var count = 0;
var cetakAll = []

// $(document).on("click",".cetak_button",function(){
//     var searchIDs = $("input:checkbox:checked").map(function(){
//         cetakAll.push({
//             no_seri: $(this).val(),
//             status: '2'
//         });
//       });

//     console.log(cetakAll);

//     $.ajax({
//         url: "/kodeQR/cetakQR/cetakAll",
//         method: "POST",
//         data: {cetakAll: cetakAll},
//         success: function(data){
//             console.log(data);
//         },
//         error: function(err){

//         }
//     })
// });

$(document).on("click",".btn-check-aset", function(){
    var data_id = $(this).data("id_master");
    var jenis_asset = $(this).data("jenis_asset");

    $.ajax({
        url: "/get_master_ti",
        method: "GET",
        data: {id_master_ti: data_id},
        success: function(data){
            console.log(data.count_asset[2].total_asset);
            console.log(jenis_asset);
            $(".input_nama_asset").val(data.detail_asset[0].nama_master_ti);
            $(".input_id_asset").val(data.detail_asset[0].id_master_ti);

            for(i = 0;i <= data.detail_asset.length; i++)
            {
                if(jenis_asset == "AS-01")
                {
                    var hitung = parseInt(data.count_asset[i].total_asset);
                    var count = ('0' + '0' + hitung).slice(-3);

                    $(".no_seri_asset").val("KP-"+count);
                }
                else if(jenis_asset == "AS-02")
                {
                    var hitung = parseInt(data.count_asset[i].total_asset);
                    var count = ('0' + '0' + hitung).slice(-3);

                    $(".no_seri_asset").val("LP-"+count);
                }
                else if(jenis_asset == "AS-03")
                {
                    var hitung = parseInt(data.count_asset[i].total_asset);
                    var count = ('0' + '0' + hitung).slice(-3);

                    $(".no_seri_asset_lain").val("SC-"+count);
                }
                else if(jenis_asset == "AS-04")
                {
                    var hitung = parseInt(data.count_asset[i].total_asset);
                    var count = ('0' + '0' + hitung).slice(-3);

                    $(".no_seri_asset_lain").val("PR-"+count);
                }
                else if(jenis_asset == "AS-05")
                {
                    var hitung = parseInt(data.count_asset[i].total_asset);
                    var count = ('0' + '0' + hitung).slice(-3);

                    $(".no_seri_asset").val("AP-"+count);
                }

            }
        },
        error: function(error){
            console.log("error");
        }
    })
    console.log(jenis_asset);
})