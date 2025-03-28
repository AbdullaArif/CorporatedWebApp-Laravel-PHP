$(function(){
  $(document).on('click','#delete',function(e){
    e.preventDefault();
    var link = $(this).attr("href");


    Swal.fire({
      title: 'Are you sure?-Emin misin?',
      text: "Will it be permanently deleted?-Kalıcı olarak silinecektir?",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'Cancel-Vazgeç',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, Delete-Evet, Sil'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!-Silindi!',
          'Permanently Deleted-Kalıcı Olarak Silindi.',
          'success'
          )
      }
    }) 


  });

});