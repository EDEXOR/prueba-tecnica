 
    function buscar() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("texto_buscar");
    
      filter = input.value.toUpperCase();
      table = document.getElementById("tabla");
      tr = table.getElementsByTagName("tr");

      if(filter==""){
        Swal.fire(
            'Error',
            'La busqueda no puede estar vacia',
            'error'
          )
      }
      else{
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              document.getElementById("mostrar").style.display = "block";
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
               
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
      }
    }
    function mostrar_todos() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("texto_buscar");
      
        filter = "";
        table = document.getElementById("tabla");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
              document.getElementById("mostrar").style.display = "none";
            } else {
              tr[i].style.display = "none";
            }
          }       
        }
      }

      function borrar(id){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: '¿Esta seguro de eliminar?',
            text: "No podra recuperar el registro",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, borrar',
            cancelButtonText: 'No, cancelar',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                url = "delete.php?id="+id;
                
              swalWithBootstrapButtons.fire(
                'Eliminado',
                'El registro fue eliminado',
                'success'
              )
              window.location.href=url;
             
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'El registro no fue eliminado',
                '',
                'error'
              )
            }
          })
      }