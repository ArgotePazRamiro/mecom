$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: '¿ Esta Seguro ?',
                    text: "¿ Desea Eliminar los datos?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, elimínalo!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Eliminado!',
                        'Datos Eliminados Correctamente.',
                        'success'
                      )
                    }
                  }) 


    });

  });

//CONFIRM ORDER

  $(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: '¿ Esta Seguro de Confirmar ?',
                    text: "Una vez Confirmado, ya no podrá cambiar el Estado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, confírmalo!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Confirmado!',
                        'Orden Confirmada Correctamente.',
                        'success'
                      )
                    }
                  }) 


    });

  });
  //END CONFIRM ORDER

//PROCESSING ORDER

  $(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: '¿ Esta Seguro de Procesar la Orden ?',
                    text: "Una vez Procesada, ya no podrá cambiar el Estado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, procésala!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Procesándose!',
                        'Orden Procesándose Correctamente.',
                        'success'
                      )
                    }
                  }) 


    });

  });
  //END PROCESSING ORDER

//DELIVERED ORDER

  $(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: '¿ Esta Seguro de que la Orden se Entregó ?',
                    text: "Una vez Entregada, ya no podrá cambiar el Estado",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, entrégala!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Entregada!',
                        'Orden Entregada Correctamente.',
                        'success'
                      )
                    }
                  }) 


    });

  });
  //END DELIVERED ORDER