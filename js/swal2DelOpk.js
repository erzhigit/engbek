function deleteOpk(btn) {
    var Opkrec = $(btn).data('opk');
    Swal.fire({
        title: 'Сіз сенімдісіз бе?',
        text: "Жазба жойылады және баллды  қайта беруіңізге тура келеді !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Иә, жоямын!',
        cancelButtonText:'Жоқ'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../extensions/deleteopk.php',
                type: 'post',
                data: {opk: Opkrec},
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Жазба сәтті жойылды',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                          // remove row from table
                        $(btn).closest('tr').remove();
                        });
                      } else {
                        Swal.fire({
                          title: 'Қате',
                          text: response.message,
                          icon: 'error'
                        });
                      }
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Қате',
                            text: 'Деректі өшіру кезінде қате пайда болды',
                            icon: 'error'
                        });
                    }
                });
            }
        });
    }




  